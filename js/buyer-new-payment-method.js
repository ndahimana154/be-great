$('document').ready(function() {
    $('.buyer-new-method').click(function() {
        $('.buyer-newpyt-method').css({
            "display": "block"
        })
    })
    $('#buyersendnewmethodBTN').click(function() {
        var methodtype =  $('.byr-payment_method_type').val()
        var pytdigits = $('.buyer-pyt_digits').val()
        $('.rrrr').load("php/buyer-send-new-method.php",{
            "method" : methodtype,
            "pytdigits" : pytdigits
        })
    })
})