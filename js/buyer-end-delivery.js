$('document').ready(function() {
    $('.endtheorderbtn').click(function() {
        var order = $(this).val()
        $('.end_delivery_modal').css({
            "display" : "block"
        })
        $('#procedd_end_delivery').click(function() {
            var courier = $('#courier_fieldbox').val()
            $('.ffrr').load("php/buyer-end-delivery-send-data.php",{
                "endorder": order,
                "courier" : courier
            })
        })
    })
})