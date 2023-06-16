$('document').ready(function() {
    // When the cancel button is clicked
    $('.cancelorderBTN').click(function() {
        // Get the order id
        var orderid = $(this).val()
        // Make the cancel form visible
        $('.cancel-order-buyer').css({
            "display": "block"
        })
        // When clicked on the cnacel btn
        $('.cancelBTNinhead').click(function() {
            // Make the modal invisible then reload
            $('.cancel-order-buyer').css({
                "display": "none"
            })
            location.reload()
        })
        $('.cancelbtn-foot').click(function() {
            // Make the modal invisible then reload
            $('.cancel-order-buyer').css({
                "display": "none"
            })
            location.reload()
        })
        $('.no-cancel').click(function() {
            // Make the modal invisible then reload
            $('.cancel-order-buyer').css({
                "display": "none"
            })
            location.reload()
        })

        // When the the ys button is clicked
        $('.yes-cancel').click(function() {
            $('.cancel-bdy').load("php/buyer-cancel-order-send-yes.php",{
                "orderid": orderid
            })
        })
    })
})