$('document').ready(function() {
    $('.verifyPYTBTN').click(function() {
        var paymentid = $(this).val()
        $('.verfiy-seller-pytmodal').css({
            "display" : "block"
        })
        $('.verifypytresults').load("php/member-verify-payment-send-id.php",{
            "payment" : paymentid
        })
    })
})