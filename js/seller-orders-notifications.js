$('document').ready(function() {
    $('.viewordernoti_BTN').click(function() {
        $('.ordernofierr-modal').css({
            "display" : "block"
        })
        var notifi_id = $(this).val()
        $('.notifier-content').load("php/seller-notification-send-id.php",{
            "noti_id" : notifi_id
        })
        // Viewing the notification
        // $('.viewnotifier_BTN').click(function() {
            // alert("du uinhn")
            // var notifi_id = $(this).val()
            // $('.viewnotifier_BTN').load("php/seller-notification-send-id-to-view.php")
        // })
    })
})