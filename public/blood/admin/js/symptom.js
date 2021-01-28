
//create Faq
$("#createSymptom").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var days = $("#days").val();
    $.ajax({
        type:'POST',
        url: "/admin/symptom/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {name:name,days:days},
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }
                if(response.errors.days){
                    $('.errorDays').text(response.errors.days);
                }
            }else{
                $('#addSymptomModal').modal('hide');
                $("#allSymptom").append('' +
                    '<tr class="symptom-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.days +'</td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editSymptom" data-target="#editSymptomModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-days="'+ response.data.days +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSymptom" data-target="#deleteSymptomModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#days").val('');
                toastr.success('Symptom successfully created')
            }
        }
    });
});

//open edit Faq modal
$(document).on('click', '#editSymptom', function () {
    $('#editSymtomModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_days').val($(this).data('days'));
 });

// update Symptom
$("#updateSymptom").click(function (e) {
    e.preventDefault();
    var id       = $("#edit_id").val();
    var name     = $("#edit_name").val();
    var days     = $("#edit_days").val();
    $.ajax({
        type:'POST',
        url: "/admin/symptom/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },        
        data: {id:id,name:name,days:days},
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }
                if(response.errors.days){
                    $('.errorDays').text(response.errors.days);
                }
            }else{
                $('#editSymptomModal').modal('hide');
                $("tr.symptom-"+ response.data.id).replaceWith('' +
                    '<tr class="symptom-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +                        
                        '<td>'+ response.data.days +'</td>\n' +                        
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editSymptom" data-target="#editSymptomModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-days="'+ response.data.days +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSymptom" data-target="#deleteSymptomModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Symptom successfully updated.')
            }
        }
    });
});

//open delete Symptom modal
$(document).on('click', '#deleteSymptom', function () {
    $('#deleteSymptomModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy Symptom
$("#destroySymptom").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/symptom/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteSymptomModal').modal('hide');            
            $('.symptom-' + $('#del_id').val()).remove();
            toastr.success(response.message)
        }
    });
});