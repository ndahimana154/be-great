$('document').ready(function() {
    $('.BuyerUnverifyPYTBTN').click(function() {
        var paymentid = $(this).val()
        $('.unverify-buyer-pyt-modal').css({
            "display" : "block"
        })
        $('.Unverfy-byuer-methodresults').load("php/member-unverify-buyer-payment-send-id.php",{
            "payment" : paymentid
        })
    })
})