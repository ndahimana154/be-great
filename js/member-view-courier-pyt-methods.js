$('document').ready(function() {
    $('.viewpytmethodsBTN').click(function() {
        var courier = $(this).val()
        $('.view-courier-pyts').css({
            "display" : "block"
        })
        $('.view-content').load("php/member-view-courier-payment-methods-send-id.php",{
            "courier" : courier
        })
    })
})