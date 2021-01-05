//create donor
$("#createDonor").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createDonorForm")[0]);
    form_data.append('name', $("#name").val());
    form_data.append('phone', $("#phone").val());
    form_data.append('email', $("#email").val());
    form_data.append('division_id', $("#division_id :selected").val());
    form_data.append('district_id', $("#district_id :selected").val());
    form_data.append('thana_id', $("#thana_id :selected").val());
    form_data.append('dob', $("#dob").val());
    form_data.append('last_donate_date', $("#last_donate_date").val());
    form_data.append('permanent_address', $("#permanent_address").val());
    form_data.append('current_address', $("#current_address").val());
    form_data.append('blood_group_id', $("#blood_group_id").val());

    $.ajax({
        type:'POST',
        url: '/admin/donor/store',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }
                if (response.errors.phone) {
                    $('.errorPhone').text(response.errors.phone);
                }
                if (response.errors.email) {
                    $('.errorEmail').text(response.errors.email);
                }
                if (response.errors.division_id) {
                    $('.errorDivisionId').text(response.errors.division_id);
                }
                if (response.errors.district_id) {
                    $('.errorDistrictId').text(response.errors.district_id);
                }
                if (response.errors.thana_id) {
                    $('.errorThanaId').text(response.errors.thana_id);
                }
                if (response.errors.dob) {
                    $('.errorDob').text(response.errors.dob);
                }
                if (response.errors.permanent_address) {
                    $('.errorPermanentAddress').text(response.errors.permanent_address);
                }
                if (response.errors.current_address) {
                    $('.errorCurrentAddress').text(response.errors.current_address);
                }
                if (response.errors.blood_group_id) {
                    $('.errorBloodGroup').text(response.errors.blood_group_id);
                }
                if (response.errors.thumbnail) {
                    $('.erroThumbnail').text(response.errors.thumbnail);
                }
            }else{
                if(response.status == 201){
                    $('#addDonorModal').modal('hide');
                    toastr.success('Donor Created Successfully.')
                    location.reload();
                }else{
                    toastr.error('Sorry, something went wrong.')
                }
            }
        }
    });
});

//open edit donar modal
$(document).on('click', '#editDonor', function () {
    var image = image_base_path + $(this).data('thumbnail');
    $('#editDonorModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_name').val($(this).data('name'));
    $('#edit_email').val($(this).data('email'));
    $('#edit_phone').val($(this).data('phone'));
    $('#edit_dob').val($(this).data('dob'));
    $('#edit_permanent_address').val($(this).data('permanent_address'));
    $('#edit_current_address').val($(this).data('current_address'));
    $('#edit_blood_group_id').val($(this).data('blood_group_id'));
    $('#edit_division_id').val($(this).data('division_id'));
    $('#edit_district_id').val($(this).data('district_id'));
    $('#edit_thana_id').val($(this).data('thana_id'));
    $('#edit_status').val($(this).data('status'));
    $('#edit_designation').val($(this).data('designation'));
    $('#edit_last_donate_date').val($(this).data('last_donate_date'));
    $("#donorPreviousThumbnail").attr("src", image);
 });

// update donar
$("#updateDonor").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#editDonorForm")[0]);
    form_data.append('id', $("#edit_id").val());
    form_data.append('name', $("#edit_name").val());
    form_data.append('phone', $("#edit_phone").val());
    form_data.append('email', $("#edit_email").val());
    form_data.append('division_id', $("#edit_division_id :selected").val());
    form_data.append('district_id', $("#edit_district_id :selected").val());
    form_data.append('thana_id', $("#edit_thana_id :selected").val());
    form_data.append('dob', $("#edit_dob").val());
    form_data.append('last_donate_date', $("#edit_last_donate_date").val());
    form_data.append('permanent_address', $("#edit_permanent_address").val());
    form_data.append('current_address', $("#edit_current_address").val());
    form_data.append('blood_group_id', $("#edit_blood_group_id").val());
    form_data.append('status', $("#edit_status").val());
    form_data.append('designation', $("#edit_designation").val());

    $.ajax({
        type:'POST',
        url: '/admin/donor/update',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: form_data,
        success:function(response){
            if((response.errors)){
                if(response.errors.name){
                    $('.errorName').text(response.errors.name);
                }
                if (response.errors.phone) {
                    $('.errorPhone').text(response.errors.phone);
                }
                if (response.errors.email) {
                    $('.errorEmail').text(response.errors.email);
                }
                if (response.errors.division_id) {
                    $('.errorDivisionId').text(response.errors.division_id);
                }
                if (response.errors.district_id) {
                    $('.errorDistrictId').text(response.errors.district_id);
                }
                if (response.errors.thana_id) {
                    $('.errorThanaId').text(response.errors.thana_id);
                }
                if (response.errors.dob) {
                    $('.errorDob').text(response.errors.dob);
                }
                if (response.errors.permanent_address) {
                    $('.errorPermanentAddress').text(response.errors.permanent_address);
                }
                if (response.errors.current_address) {
                    $('.errorCurrentAddress').text(response.errors.current_address);
                }
                if (response.errors.blood_group_id) {
                    $('.errorBloodGroup').text(response.errors.blood_group_id);
                }
                if (response.errors.thumbnail) {
                    $('.erroThumbnail').text(response.errors.thumbnail);
                }
            }else{
                if(response.status == 201){
                    $('#editDonorModal').modal('hide');
                    toastr.success('Donor Updated Successfully.')
                    location.reload();
                }else{
                    toastr.error('Sorry, something went wrong.')
                }
            }
        }
    });
});

//open delete donor modal
$(document).on('click', '#deleteDonor', function () {
    $('#deleteDonorModal').modal('show');
    $('input[name=del_id]').val($(this).data('id'));
 });

//destroy donor
$("#destroyDonar").click(function(){
    $.ajax({
        type: 'POST',
        url: '/admin/donor/destroy',
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('input[name=del_id]').val()
        },
        success: function (response) {
            $('#deleteDonorModal').modal('hide');
            $('.donor-' + $('input[name=del_id]').val()).remove();
            toastr.success(response.message)
            
        }
    });
});


//show district by division_id
$("#division_id").change(function(){
    var division_id = $(this).val();
    $.get('/admin/donor/district/'+ division_id,function(data){ 
        $("#district_id").empty();
        $("#district_id").append('<option selected disabled>Select</option>');
        for(var i=0; i < data.length; i++){
            $("#district_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
        }
    });
});

//show district by division_id
$("#district_id").change(function(){
    var district_id = $(this).val();
    $.get('/admin/donor/thana/'+ district_id,function(data){
        $("#thana_id").empty();
        $("#thana_id").append('<option selected disabled>Select</option>');
        for(var i=0; i < data.length; i++){
            $("#thana_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
        }
    });
});