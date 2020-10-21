
//create user
$("#createUser").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createUserForm")[0]);
    form_data.append('name', $("#name").val());
    form_data.append('email', $("#email").val());
    form_data.append('phone', $("#phone").val());
    form_data.append('password', $("#password").val());
    $.ajax({
        type:'POST',
        url: "/admin/user/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.en_name){
                    $('.errorEnName').text(response.errors.en_name);
                }else{
                    $('.errorEnName').text('');
                }
                if (response.errors.email) {
                    $('.errorEmail').text(response.errors.email);
                }else{
                    $('.errorEmail').text('');
                }
                if (response.errors.phone) {
                    $('.errorPhone').text(response.errors.phone);
                }else{
                    $('.errorPhone').text('');
                }
                if (response.errors.password) {
                    $('.errorPassword').text(response.errors.password);
                }else{
                    $('.errorPassword').text('');
                }
                if (response.errors.thumbnail) {
                    $('.erroThumbnail').text(response.errors.thumbnail);
                }else{
                    $('.erroThumbnail').text('');
                }
            }else{
                $('#addUserModal').modal('hide');
                $("#allUser").append('' +
                    '<tr class="user-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.email +'</td>\n' +
                        '<td>'+ response.data.phone +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.thumbnail +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editUser" data-target="#editUserModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-email="'+ response.data.email +'"  data-phone="'+ response.data.phone +'" data-thumbnail="'+ response.data.thumbnail +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteUser" data-target="#deleteUserModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#password").val('');
                $("#thumbnail").val('');
                toastr.success('User successfully created')
            }
        }
    });
});

//open edit user modal
$(document).on('click', '#editUser', function () {
    var thumbnail = image_base_path + $(this).data('image');
    $('#editUserModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_email').val($(this).data('email'));
    $('#edit_phone').val($(this).data('phone'));
    $("#previousThumbnail").attr("src", thumbnail);
 });

// update user
$("#updateUser").click(function (e) {
    e.preventDefault();
    console.log($("#edit_id").val());
    var form_data = new FormData($("#editUserForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('name', $("#edit_name").val());
    form_data.append('email', $("#edit_email").val());
    form_data.append('phone', $("#edit_phone").val());
    form_data.append('password', $("#edit_password").val());
    $.ajax({
        type:'POST',
        url: "/admin/user/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.en_name){
                    $('.errorEnName').text(response.errors.en_name);
                }else{
                    $('.errorEnName').text('');
                }
                if (response.errors.email) {
                    $('.errorEmail').text(response.errors.email);
                }else{
                    $('.errorEmail').text('');
                }
                if (response.errors.phone) {
                    $('.errorPhone').text(response.errors.phone);
                }else{
                    $('.errorPhone').text('');
                }
                if (response.errors.password) {
                    $('.errorPassword').text(response.errors.password);
                }else{
                    $('.errorPassword').text('');
                }
                if (response.errors.thumbnail) {
                    $('.erroThumbnail').text(response.errors.thumbnail);
                }else{
                    $('.erroThumbnail').text('');
                }
            }else{
                $('#editUserModal').modal('hide');
                $("tr.user-"+ response.data.id).replaceWith('' +
                    '<tr class="user-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td>'+ response.data.email +'</td>\n' +
                        '<td>'+ response.data.phone +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.thumbnail +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editUser" data-target="#editUserModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-email="'+ response.data.email +'"  data-phone="'+ response.data.phone +'" data-thumbnail="'+ response.data.thumbnail +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteUser" data-target="#deleteUserModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('User successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteUser', function () {
    $('#deleteUserModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyUser").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/user/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteUserModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.user-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});