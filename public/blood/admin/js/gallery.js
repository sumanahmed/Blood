
//create Gallery
$("#createGallery").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createGalleryForm")[0]);
    form_data.append('name', $("#name").val());
    $.ajax({
        type:'POST',
        url: "/admin/gallery/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }else{
                    $('.errorName').text('');
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }else{
                    $('.erroImage').text('');
                }
            }else{
                $('#addGalleryModal').modal('hide');
                $("#allGallery").append('' +
                    '<tr class="gallery-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editGallery" data-target="#editGalleryModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteGallery" data-target="#deleteGalleryModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                $("#image").val('');
                toastr.success('Gallery Image successfully created')
            }
        }
    });
});

//open edit Gallery modal
$(document).on('click', '#editGallery', function () {
    var image = image_base_path + $(this).data('image');
    $('#editGalleryModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $("#previousImage").attr("src", image);
 });

// update Gallery
$("#updateGallery").click(function (e) {
    e.preventDefault();
    console.log($("#edit_id").val());
    var form_data = new FormData($("#editGalleryForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('name', $("#edit_name").val());
    $.ajax({
        type:'POST',
        url: "/admin/gallery/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }else{
                    $('.errorName').text('');
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }else{
                    $('.erroImage').text('');
                }
            }else{
                $('#editGalleryModal').modal('hide');
                $("tr.gallery-"+ response.data.id).replaceWith('' +
                    '<tr class="gallery-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editGallery" data-target="#editGalleryModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteGallery" data-target="#deleteGalleryModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Gallery Image successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteGallery', function () {
    $('#deleteGalleryModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyGallery").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/gallery/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteGalleryModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.gallery-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});