$('document').ready(function() {
    $('.order_remind_seller').click(function() {
        var orderid = $(this).val()
        $('.notifier1-modal').css({
            "display" : "block"
        })
        $('.notifier-content').load("php/member-notify-seller-order.php",{
            "order" : orderid
        })
    })
    $('#notifier1-close').click(function() {
        $('.notifier1-modal').css({
            "display" : "none"
        })
        location.reload()
    })
})