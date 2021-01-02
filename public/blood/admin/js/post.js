//create Post
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
        success:function(response){ 
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
            }else{ console.log(response);
                if(response.status === 201) {
                    $('#addPostModal').modal('hide');
                    toastr.success('Post successfully created')
                    var status = response.data.status == 1 ? 'Show' : 'Hide';
                    $("#allPost").append('' +
                        '<tr class="post-'+ response.data.id +'">\n' +
                            '<td>'+ response.data.title +'</td>\n' +
                            '<td>'+ response.data.category_name +'</td>\n' +
                            '<td><img src="'+ image_base_path + response.data.thumbnail +'" style="width:50px;"/></td>\n' +
                            '<td>'+ status +'</td>\n' +
                            '<td style="vertical-align:middle;text-align:center;">\n' +
                                '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editPost" data-target="#editPostModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-description="'+ response.data.description +'" data-category_id="'+ response.data.category_id +'" data-status="'+ response.data.status +'" data-thumbnail="'+ response.data.thumbnail +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                                '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deletePost" data-target="#deletePostModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                            '</td>\n' +
                        '</tr>'+
                    '');
                } else {
                    $("#title").val('');
                    $("#category_id").val('');
                    $("#description").val('');
                }               
            }
        }
    });
});

//open edit Post modal
$(document).on('click', '#editPost', function () {
    var thumbnail = image_base_path + $(this).data('thumbnail');
    $('#editPostModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $('#edit_description').val($(this).data('description'));
    $('#edit_category_id').val($(this).data('category_id'));
    $('#edit_status').val($(this).data('status'));
    $("#previousImage").attr("src", thumbnail);
 });

// update Post
$("#updatePost").click(function (e) {
    e.preventDefault();
    console.log($("#edit_id").val());
    var form_data = new FormData($("#editPostForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('title', $("#edit_title").val());
    form_data.append('description', $("#edit_description").val());
    form_data.append('category_id', $("#edit_category_id :selected").val());
    form_data.append('status', $("#edit_status :selected").val());
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
                if(response.errors.category_id){
                    $('.errorLink').text(response.errors.category_id);
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                var status = response.data.status == 1 ? 'Show' : 'Hide';
                $('#editPostModal').modal('hide');
                $("tr.post-"+ response.data.id).replaceWith('' +
                    '<tr class="post-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.category_name +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.thumbnail +'" style="width:50px;"/></td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editPost" data-target="#editPostModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-description="'+ response.data.description +'" data-category_id="'+ response.data.category_id +'" data-status="'+ response.data.status +'" data-thumbnail="'+ response.data.thumbnail +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deletePost" data-target="#deletePostModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Post successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deletePost', function () {
    $('#deletePostModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyPost").click(function(){
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
                $('.post-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});