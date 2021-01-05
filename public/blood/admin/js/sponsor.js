
//create Sponsor
$("#createSponsor").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createSponsorForm")[0]);
    form_data.append('title', $("#title").val());
    $.ajax({
        type:'POST',
        url: "/admin/sponsor/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.errorTitle').text(response.errors.title);
                }else{
                    $('.errorTitle').text('');
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }else{
                    $('.erroImage').text('');
                }
                if (response.errors.link) {
                    $('.erroLink').text(response.errors.link);
                }else{
                    $('.erroLink').text('');
                }
            }else{
                $('#addSponsorModal').modal('hide');
                $("#allSponsor").append('' +
                    '<tr class="sponsor-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editSponsor" data-target="#editSponsorModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-link="'+ response.data.link +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSponsor" data-target="#deleteSponsorModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#title").val('');
                $("#image").val('');
                toastr.success('Sponsor successfully created')
            }
        }
    });
});

//open edit Sponsor modal
$(document).on('click', '#editSponsor', function () {
    var image = image_base_path + $(this).data('image');
    $('#editSponsorModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $("#previousImage").attr("src", image);
 });

// update Sponsor
$("#updateSponsor").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#editSponsorForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('title', $("#edit_title").val());
    form_data.append('link', $("#edit_link").val());
    $.ajax({
        type:'POST',
        url: "/admin/sponsor/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.errorTitle').text(response.errors.title);
                }else{
                    $('.errorTitle').text('');
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }else{
                    $('.erroImage').text('');
                }
                if (response.errors.link) {
                    $('.erroLink').text(response.errors.link);
                }else{
                    $('.erroLink').text('');
                }
            }else{
                $('#editSponsorModal').modal('hide');
                $("tr.sponsor-"+ response.data.id).replaceWith('' +
                    '<tr class="sponsor-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editSponsor" data-target="#editSponsorModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-link="'+ response.data.link +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSponsor" data-target="#deleteSponsorModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Sponsor successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteSponsor', function () {
    $('#deleteSponsorModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroySponsor").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/sponsor/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteSponsorModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.sponsor-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});