
$('document').ready(function() {
    $('.sellcancelwithdrawBTN').click(function() {
        var withdrawid = $(this).val()
        $('.cancel-withdraw-seller-modal').css({
            "display" : "block"
        })
        $('.seller-cancel-withdraw-results').load("php/seller-cancel-withdraw-send-id.php",{
            "cancelid" : withdrawid
        })
    })
})