$('document').ready(function() {
    $('.firecourierBTN').click(function() {
        var courier = $(this).val()
        $('.fire-courier-modal').css({
            "display" : "block"
        })
        $('.delete-courier-content').load("php/member-delete-courier-send-id.php",{
            "courierdele": courier
        })
    })
})