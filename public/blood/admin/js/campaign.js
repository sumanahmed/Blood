
//create Campaign
$("#createCampaign").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createCampaignForm")[0]);
    form_data.append('title', $("#title").val());
    form_data.append('description', $("#description").val());
    form_data.append('date', $("#date").val());
    form_data.append('location', $("#location").val());
    form_data.append('status', $("#status :selected").val());
    $.ajax({
        type:'POST',
        url: "/admin/campaign/store",
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
                if(response.errors.date){
                    $('.errorDate').text(response.errors.date);
                }
                if(response.errors.location){
                    $('.errorLocation').text(response.errors.location);
                }
                if(response.errors.status){
                    $('.errorStatus').text(response.errors.status);
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                $('#addCampaignModal').modal('hide');
                $("#allCampaign").append('' +
                    '<tr class="campaign-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.date +'</td>\n' +
                        '<td>'+ response.data.location +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editCampaign" data-target="#editCampaignModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-description="'+ response.data.description +'" data-date="'+ response.data.date +'" data-location="'+ response.data.location +'" data-status="'+ response.data.status +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteCampaign" data-target="#deleteCampaignModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#title").val('');
                $("#image").val('');
                toastr.success('Campaign successfully created')
            }
        }
    });
});

//open edit Campaign modal
$(document).on('click', '#editCampaign', function () {
    var image = image_base_path + $(this).data('image');
    $('#editCampaignModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_title').val($(this).data('title'));
    $('#edit_description').val($(this).data('title'));
    $('#edit_date').val($(this).data('title'));
    $('#edit_location').val($(this).data('title'));
    $('#edit_status').val($(this).data('title'));
    $("#previousImage").attr("src", image);
 });

// update Campaign
$("#updateCampaign").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#editCampaignForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('title', $("#edit_title").val());
    form_data.append('description', $("#edit_description").val());
    form_data.append('date', $("#edit_date").val());
    form_data.append('location', $("#edit_location").val());
    form_data.append('status', $("#edit_status :selected").val());
    $.ajax({
        type:'POST',
        url: "/admin/campaign/update",
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
                if(response.errors.date){
                    $('.errorDate').text(response.errors.date);
                }
                if(response.errors.location){
                    $('.errorLocation').text(response.errors.location);
                }
                if(response.errors.status){
                    $('.errorStatus').text(response.errors.status);
                }
                if (response.errors.image) {
                    $('.erroImage').text(response.errors.image);
                }
            }else{
                $('#editCampaignModal').modal('hide');
                $("tr.campaign-"+ response.data.id).replaceWith('' +
                    '<tr class="campaign-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.title +'</td>\n' +
                        '<td>'+ response.data.date +'</td>\n' +
                        '<td>'+ response.data.location +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editCampaign" data-target="#editCampaignModal" data-id="'+ response.data.id +'" data-title="'+ response.data.title +'" data-description="'+ response.data.description +'" data-date="'+ response.data.date +'" data-location="'+ response.data.location +'" data-status="'+ response.data.status +'" data-image="'+ response.data.image +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteCampaign" data-target="#deleteCampaignModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Campaign successfully updated.')
            }
        }
    });
});

//open delete category modal
$(document).on('click', '#deleteCampaign', function () {
    $('#deleteCampaignModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy category
$("#destroyCampaign").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/campaign/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteCampaignModal').modal('hide');
            if(response.status == '403'){
                toastr.error(response.message)
            }else{
                $('.campaign-' + $('#del_id').val()).remove();
                toastr.success(response.message)
            }
        }
    });
});