$('document').ready(function() {
    $('.BuyerverifyPYTBTN').click(function() {
        var paymentid = $(this).val()
        $('.vrify-buyer-pyt-methodmodal').css({
            "display" : "block"
        })
        $('.verifybuyerpYTresults').load("php/member-verify-buyer-payment-send-id.php",{
            "payment" : paymentid
        })
    })
})