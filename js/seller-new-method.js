$('document').ready(function() {
    $('#new-methodBTN').click(function() {
        $('.seler-newpyt-method').css({
            "display": "block"
        })
    })
    $('.cancelnewMTDbtn').click(function() {
        $('.seler-newpyt-method').css({
            "display": "none"
        })
        location.reload()
    })
    $('#sendnewmethodBTN').click(function() {
        var methodtype = $('.payment_method_type').val()
        var pyt_digits = $('.pyt_digits').val()
        // alert(pyt_digits);
        $('.rrr').load("php/seller-send-new-method.php",{
            "methodtype": methodtype,
            "pytdigits": pyt_digits
        });
    })
})