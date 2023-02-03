$(document).ready(function () {

    $('input[name="instruments"], input[name="enclosure"], input[name="controller"]').tagsinput({
        trimValue: true,
        confirmKeys: [13, 44],
        focusClass: 'my-focus-class'
    });

    $('.bootstrap-tagsinput input').on('focus', function () {
        $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
    }).on('blur', function () {
        $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
    });

    // $(document).on("keydown", ":input:not(:input[name='instruments'])", function(event) {
    //     return event.key !== "Enter";
    // });


    $('.input-group.timeframe #timeframe').datepicker({
        maxViewMode: 'years',
        minViewMode: 'months',
        format: "MM yyyy",
        autoClose: true,
        // startView: 1,
        // maxViewMode: 1
    });

});
