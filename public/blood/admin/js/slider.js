
//create Slider
$("#createSlider").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createSliderForm")[0]);
    form_data.append('title', $("#title").val());
    $.ajax({
        type:'POST',
        url: "/admin/slider/store",
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
            }else{
                $('#addSliderModal').modal('hide');
                $("#allSlider").append('' +
                    '<tr class="slider-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editSlider" data-target="#editSliderModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSlider" data-target="#deleteSliderModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#title").val('');
                $("#image").val('');
                toastr.success('Slider successfully created')
            }
        }
    });
});

//open edit Slider modal
$(document).on('click', '#editSlider', function () {
    var image = image_base_path + $(this).data('image');
    $('#editSliderModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $("#previousImage").attr("src", image);
 });

// update Slider
$("#updateSlider").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#editSliderForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('title', $("#edit_title").val());
    $.ajax({
        type:'POST',
        url: "/admin/slider/update",
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
            }else{
                $('#editSliderModal').modal('hide');
                $("tr.Slider-"+ response.data.id).replaceWith('' +
                    '<tr class="Slider-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editSlider" data-target="#editSliderModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSlider" data-target="#deleteSliderModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Slider successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteSlider', function () {
    $('#deleteSliderModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroySlider").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/slider/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteSliderModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.slider-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});