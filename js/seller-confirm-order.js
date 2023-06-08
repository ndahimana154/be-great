$('document').ready(function() {
    // When weclick on the confirm button
    $('.seller-order-cfn-order').click(function() {
        var orderid = $(this).val()
        $('.seller-confirmorder-modal').css({
            "display": "block"
        })
        $('.cofn-modal-content').load("php/seller-confirm-order.php",{
            "order": orderid
        })

    })
    // When clicked on the close buttton
    $('.cancelconfirmbtn').click(function() {
        $('.seller-confirmorder-modal').css({
            "display": "none"
        })
        location.reload()
    })
})