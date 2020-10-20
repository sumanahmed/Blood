$(document).ready(function(){
    //enable data table
    $(".data_table").DataTable();
    
    //date picker formatting
    $('.datePicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2020,
        maxYear: parseInt(moment().format('YYYY'),10),
        locale: {
          format: 'YYYY-MM-DD'
        }
    });
})