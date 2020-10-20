//create donor
$("#createDonor").click(function (e) {
    e.preventDefault();
    var form_data = new FormData($("#createDonorForm")[0]);
    form_data.append('name', $("#name").val());
    form_data.append('phone', $("#phone").val());
    form_data.append('email', $("#email").val());
    form_data.append('division_id', $("#division_id :selected").val());
    form_data.append('district_id', $("#district_id :selected").val());
    form_data.append('thana_id', $("thana_id :selected").val());
    form_data.append('dob', $("#dob").val());
    form_data.append('permanent_address', $("#permanent_address").val());
    form_data.append('current_address', $("#current_address").val());
    form_data.append('blood_group_id', $("#blood_group_id").val());

    $.ajax({
        type:'POST',
        url: '{{ route("backend.donor.store") }}',
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
                if (response.errors.phone) {
                    $('.errorPhone').text(response.errors.phone);
                }else{
                    $('.errorPhone').text('');
                }
                if (response.errors.email) {
                    $('.errorEmail').text(response.errors.email);
                }else{
                    $('.errorEmail').text('');
                }
                if (response.errors.division_id) {
                    $('.errorDivisionId').text(response.errors.division_id);
                }else{
                    $('.errorDivisionId').text('');
                }
                if (response.errors.district_id) {
                    $('.errorDistrictId').text(response.errors.district_id);
                }else{
                    $('.errorDistrictId').text('');
                }
                if (response.errors.thana_id) {
                    $('.errorThanaId').text(response.errors.thana_id);
                }else{
                    $('.errorThanaId').text('');
                }
                if (response.errors.dob) {
                    $('.errorDob').text(response.errors.dob);
                }else{
                    $('.errorDob').text('');
                }
                if (response.errors.permanent_address) {
                    $('.errorPermanentAddress').text(response.errors.permanent_address);
                }else{
                    $('.errorPermanentAddress').text('');
                }
                if (response.errors.current_address) {
                    $('.errorCurrentAddress').text(response.errors.current_address);
                }else{
                    $('.errorCurrentAddress').text('');
                }
                if (response.errors.blood_group_id) {
                    $('.errorBloodGroup').text(response.errors.blood_group_id);
                }else{
                    $('.errorBloodGroup').text('');
                }
                if (response.errors.thumbnail) {
                    $('.erroThumbnail').text(response.errors.thumbnail);
                }else{
                    $('.erroThumbnail').text('');
                }
            }else{
                $('#createDonor').modal('hide');
                $("#allMasterCategory").append('' +
                    '<tr class="master-category-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.en_name +'</td>\n' +
                        '<td>'+ response.data.bn_name +'</td>\n' +
                        '<td><img src="'+ image_base_path + response.data.image +'" style="width:50px;"/></td>\n' +
                        '<td>'+ status +'</td>\n' +
                        '<td>\n' +
                            '<button class="btn btn-warning" data-toggle="modal" id="editMasterCategory" data-target="#editMasterCategoryModal" data-id="'+ response.data.id +'" data-en_name="'+ response.data.en_name +'"  data-bn_name="'+ response.data.bn_name +'" data-en_description="'+ response.data.en_description +'" data-bn_description="'+ response.data.bn_description +'" data-status="'+ response.data.status +'" data-image="'+ response.data.image +'"  title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger" data-toggle="modal" id="deleteMasterCategory" data-target="#deleteMasterCategoryModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#en_name").val('');
                $("#bn_name").val('');
                $("#en_description").val('');
                $("#bn_description").val('');
                $("#image").val('');
                toastr.success('Master Category Created.')
            }
        }
    });
});