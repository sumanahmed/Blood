
//create Faq
$("#createFaq").click(function (e) {
    e.preventDefault();
    var question = $("#question").val();
    var answer = $("#answer").val();
    $.ajax({
        type:'POST',
        url: "/admin/faq/store",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {question:question,answer:answer},
        success:function(response){
            if((response.errors)){
                if(response.errors.question){
                    $('.errorQuestion').text(response.errors.question);
                }
                if(response.errors.answer){
                    $('.errorAnswer').text(response.errors.answer);
                }
            }else{
                $('#addFaqModal').modal('hide');
                $("#allFaq").append('' +
                    '<tr class="faq-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.question +'</td>\n' +
                        '<td>'+ response.data.answer +'</td>\n' +
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editFaq" data-target="#editFaqModal" data-id="'+ response.data.id +'" data-question="'+ response.data.question +'" data-answer="'+ response.data.answer +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteFaq" data-target="#deleteFaqModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                $("#question").val('');
                $("#answer").val('');
                toastr.success('Faq successfully created')
            }
        }
    });
});

//open edit Faq modal
$(document).on('click', '#editFaq', function () {
    $('#editFaqModal').modal('show');
    $('#edit_id').val($(this).data('id'));
    $('#edit_question').val($(this).data('question'));
    $('#edit_answer').val($(this).data('answer'));
 });

// update Faq
$("#updateFaq").click(function (e) {
    e.preventDefault();
    var id       = $("#edit_id").val();
    var question = $("#edit_question").val();
    var answer   = $("#edit_answer").val();
    $.ajax({
        type:'POST',
        url: "/admin/faq/update",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },        
        data: {id:id,question:question,answer:answer},
        success:function(response){
            if((response.errors)){
                if(response.errors.question){
                    $('.errorQuestion').text(response.errors.question);
                }
                if(response.errors.answer){
                    $('.errorAnswer').text(response.errors.answer);
                }
            }else{
                $('#editFaqModal').modal('hide');
                $("tr.faq-"+ response.data.id).replaceWith('' +
                    '<tr class="faq-'+ response.data.id +'">\n' +
                        '<td>'+ response.data.question +'</td>\n' +                        
                        '<td>'+ response.data.answer +'</td>\n' +                        
                        '<td style="vertical-align:middle;text-align:center;">\n' +
                            '<button class="btn btn-warning btn-sm" data-toggle="modal" id="editFaq" data-target="#editFaqModal" data-id="'+ response.data.id +'" data-question="'+ response.data.question +'" data-answer="'+ response.data.answer +'" title="Edit"><i class="fas fa-pencil-alt"></i></button>\n' +
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteFaq" data-target="#deleteFaqModal" data-id="'+ response.data.id +'" title="Delete"><i class="fas fa-trash"></i></button>\n' +
                        '</td>\n' +
                    '</tr>'+
                '');
                toastr.success('Faq successfully updated.')
            }
        }
    });
});

//open delete Faq modal
$(document).on('click', '#deleteFaq', function () {
    $('#deleteFaqModal').modal('show');
    $('#del_id').val($(this).data('id'));
 });

//destroy Faq
$("#destroyFaq").click(function(){
    $.ajax({
        type: 'POST',
        url: "/admin/faq/destroy",
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        data: {
            id: $('#del_id').val()
        },
        success: function (response) {
            $('#deleteFaqModal').modal('hide');            
            $('.faq-' + $('#del_id').val()).remove();
            toastr.success(response.message)
        }
    });
});