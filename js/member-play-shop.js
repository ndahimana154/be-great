$('document').ready(function() {
    $('.playshopBTN').click(function() {
        var shopid = $(this).val()
        $('.shop-unstop-modal').css({
            "display": "block"
        })
        $('.playshopresult').load("php/member-play-shop-send-shop-id.php",{
            "shop" : shopid
        })
    })
})