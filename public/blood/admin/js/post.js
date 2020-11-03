//create Video
$(document).on('click', '#createPost', function (e) {
    e.preventDefault();    
    var form_data = new FormData($("#createPostForm")[0]);
    form_data.append('title', $("#title").val());
    form_data.append('description', $("#description").val());
    form_data.append('category_id', $("#category_id :selected").val());
    $.ajax({
        type:'POST',
        url: "/admin/post/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){ console.log(response.errors.category_id);
            if((response.errors)){
                if(response.errors.title){
                    $('.errorTitle').text(response.errors.title);
                }
                if(response.errors.description){
                    $('.errorDescription').text(response.errors.description);
                }
                if(response.errors.category_id) {
                    $('.errorCategory').text(response.errors.category_id);
                }
                if(response.errors.thumbnail) {
                    $('.erroImage').text(response.errors.thumbnail);
                }
            }else{
                $('#addPostModal').modal('hide');
                $("#allVideo").append('' +
                    '<tr class="post-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.link +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editVideo" data-target="#editPostModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-link="'+ response.data.link +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteVideo" data-target="#deletePostModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
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
    $('#editPostModal').modal('show');
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
        url: "/admin/post/update",
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
                $('#editPostModal').modal('hide');
                $("tr.video-"+ response.data.id).replaceWith('' +
                    '<tr class="Video-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.link +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editVideo" data-target="#editPostModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-link="'+ response.data.link +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteVideo" data-target="#deletePostModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
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
    $('#deletePostModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyVideo").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/post/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deletePostModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.video-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});