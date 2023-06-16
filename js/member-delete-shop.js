$('document').ready(function() {
    $('.deleteshopBTN').click(function() {
        var shopid = $(this).val()
        $('.shop-stop-modal').css({
            "display": "block"
        })
        $('.deleteresultshop').load("php/member-delete-shop-send-shop-id.php",{
            "shop" : shopid
        })
    })
})