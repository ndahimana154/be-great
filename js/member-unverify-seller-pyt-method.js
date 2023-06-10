$('document').ready(function() {
    $('.UnverifyPYTBTN').click(function() {
        var paymentid = $(this).val()
        $('.unverfiy-seller-pytmodal').css({
            "display" : "block"
        })
        $('.unverifypytresults').load("php/member-unverify-payment-send-id.php",{
            "payment" : paymentid
        })
    })
})