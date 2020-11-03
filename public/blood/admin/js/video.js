//create Video
$(document).on('click', '#createVideo', function (e) {
    e.preventDefault();    
    var form_data = new FormData($("#createVideoForm")[0]);
    form_data.append('title', $("#title").val());
    form_data.append('link', $("#link").val());
    console.log(form_data);
    $.ajax({
        type:'POST',
        url: "/admin/video/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.errorTitle').text(response.errors.title);
                }
                if(response.errors.link){
                    $('.errorLink').text(response.errors.link);
                }
                if(response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                $('#addVideoModal').modal('hide');
                $("#allVideo").append('' +
                    '<tr class="Video-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.link +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editVideo" data-target="#editVideoModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-link="'+ response.data.link +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteVideo" data-target="#deleteVideoModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#image").val('');
                toastr.success('Video successfully created')
            }
        }
    });
});

//open edit Video modal
$(document).on('click', '#editVideo', function () {
    var image = image_base_path + $(this).data('image');
    $('#editVideoModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $('#edit_link').val($(this).data('link'));
    $("#previousImage").attr("src", image);
 });

// update Video
$("#updateVideo").click(function (e) {
    e.preventDefault();
    console.log($("#edit_id").val());
    var form_data = new FormData($("#editVideoForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('title', $("#edit_title").val());
    form_data.append('link', $("#edit_link").val());
    $.ajax({
        type:'POST',
        url: "/admin/video/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.title){
                    $('.errorTitle').text(response.errors.title);
                }
                if(response.errors.link){
                    $('.errorLink').text(response.errors.link);
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                $('#editVideoModal').modal('hide');
                $("tr.video-"+ response.data.id).replaceWith('' +
                    '<tr class="Video-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.link +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editVideo" data-target="#editVideoModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-link="'+ response.data.link +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteVideo" data-target="#deleteVideoModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Video successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteVideo', function () {
    $('#deleteVideoModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyVideo").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/video/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteVideoModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.video-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});