$('document').ready(function() {
    $('.new-courpytmethodBTN').click(function() {
        var courierid = $(this).val()
        $('.newcourier-pytmodal').css({
            "display": "block"
        })
        $('#new-courier-pytm-BTN').click(function() {
            var methodtype = $('#method-co-id').val()
            var paymentdigits = $('#pyt-co-digits').val()
            $('.new-cou-pyt-resu').load("php/member-new-courier-payment-send-data.php",{
                "method": methodtype,
                "digits" : paymentdigits,
                "courier" : courierid
            })
        })
    })
})