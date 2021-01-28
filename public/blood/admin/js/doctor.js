
//create Doctor
$("#createDoctor").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createDoctorForm")[0]);
    form_data.append('name', $("#name").val());
    form_data.append('designation', $("#designation").val());
    form_data.append('specialist', $("#specialist").val());
    form_data.append('siting_place', $("#siting_place").val());
    $.ajax({
        type:'POST',
        url: "/admin/doctor/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }
                if(response.errors.designation){
                    $('.errorDesignation').text(response.errors.designation);
                }
                if(response.errors.specialist){
                    $('.errorSpecialist').text(response.errors.specialist);
                }
                if(response.errors.siting_place){
                    $('.errorSitingPlace').text(response.errors.siting_place);
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                $('#addDoctorModal').modal('hide');
                $("#allDoctor").append('' +
                    '<tr class="doctor-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.designation +'</td>\n' +
                        '<td>'+ response.data.specialist +'</td>\n' +
                        '<td>'+ response.data.siting_place +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editDoctor" data-target="#editDoctorModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-designation="'+ response.data.designation +'" data-specialist="'+ response.data.specialist +'" data-siting_place="'+ response.data.siting_place +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteDoctor" data-target="#deleteDoctorModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#image").val('');
                toastr.success('Doctor successfully created')
            }
        }
    });
});

//open edit Gallery modal
$(document).on('click', '#editDoctor', function () {
    var image = image_base_path + $(this).data('image');
    $('#editDoctorModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_designation').val($(this).data('designation'));
    $('#edit_specialist').val($(this).data('specialist'));
    $('#edit_siting_place').val($(this).data('siting_place'));
    $("#previousImage").attr("src", image);
 });

// update Gallery
$("#updateDoctor").click(function (e) {
    e.preventDefault();
    console.log($("#edit_id").val());
    var form_data = new FormData($("#editDoctorForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('name', $("#edit_name").val());
    form_data.append('designation', $("#edit_designation").val());
    form_data.append('specialist', $("#edit_specialist").val());
    form_data.append('siting_place', $("#edit_siting_place").val());
    $.ajax({
        type:'POST',
        url: "/admin/doctor/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }
                if(response.errors.designation){
                    $('.errorDesignation').text(response.errors.designation);
                }
                if(response.errors.specialist){
                    $('.errorSpecialist').text(response.errors.specialist);
                }
                if(response.errors.siting_place){
                    $('.errorSitingPlace').text(response.errors.siting_place);
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                $('#editDoctorModal').modal('hide');
                $("tr.doctor-"+ response.data.id).replaceWith('' +
                    '<tr class="doctor-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.designation +'</td>\n' +
                        '<td>'+ response.data.specialist +'</td>\n' +
                        '<td>'+ response.data.siting_place +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editDoctor" data-target="#editDoctorModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-designation="'+ response.data.designation +'" data-specialist="'+ response.data.specialist +'" data-siting_place="'+ response.data.siting_place +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteDoctor" data-target="#deleteDoctorModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Doctor successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteDoctor', function () {
    $('#deleteDoctorModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyGallery").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/doctor/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteDoctorModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.doctor-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});