
//create Category
$("#createCategory").click(function (e) {
    e.preventDefault();
    var name = $("#name").val();
    $.ajax({
        type:'POST',
        url: "/admin/category/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {name:name},
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }else{
                    $('.errorName').text('');
                }
            }else{
                $('#addCategoryModal').modal('hide');
                $("#allCategory").append('' +
                    '<tr class="category-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editCategory" data-target="#editCategoryModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteCategory" data-target="#deleteCategoryModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#name").val('');
                toastr.success('Category successfully created')
            }
        }
    });
});

//open edit Category modal
$(document).on('click', '#editCategory', function () {
    $('#editCategoryModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
 });

// update Category
$("#updateCategory").click(function (e) {
    e.preventDefault();
    var id = $("#edit_id").val();
    var name = $("#edit_name").val();
    $.ajax({
        type:'POST',
        url: "/admin/category/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },        
        data: {id:id,name:name},
        success:function(response){
            if((response.errors)){
                if(response.errors.en_name){
                    $('.errorEnName').text(response.errors.en_name);
                }else{
                    $('.errorEnName').text('');
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }else{
                    $('.erroImage').text('');
                }
            }else{
                $('#editCategoryModal').modal('hide');
                $("tr.category-"+ response.data.id).replaceWith('' +
                    '<tr class="category-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.name +'</td>\n' +                        
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editCategory" data-target="#editCategoryModal" data-id="'+ response.data.id +'" data-name="'+ response.data.name +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteCategory" data-target="#deleteCategoryModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Category successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteCategory', function () {
    $('#deleteCategoryModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyCategory").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/category/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteCategoryModal').modal('hide');            
            $('.category-' + $('#del_id').val()).remove();
            toastr.success(response.message)
        }
    });
});