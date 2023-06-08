$('document').ready(function() {
    // COdes if the shop button is clicked
    $('.shopBTN').click(function() {
        // product id
        var product = $(this).val()
        // displaying the modal
        $('#deliver-modal').css({
            "display": "block"
        })
        // Sending the product id to the server
        $('.deliver-cont').load("php/buyer-delivery-form.php", {
            "product": product
        })

    })

     // Close the delivery form
     $('#closedelivery-btn').click(function() {
        $('#deliver-modal').css({
            "display": "none"
        })
        location.reload()
    })

    // Changing the value of the quantity with respect to the total_price
    $('#deliver-qua-field').keyup(function() {
        var quantity = $(this).val()
        var unitprice = $('#unit-price').val()
        var total_price = quantity * unitprice
        var totalprice = $('#total-price').val(total_price)
    })
    // If we click on the confirrm shop btn
    $('#confirm_shop').click(function() {
        // hiding the modal form
        $('.deliver-cont').css({
            "display": "none"
        })
        // Showing the yes no box
        $('.yesnoshop').css({
            "display": "block"
        })
    })  
      // if clicked on the NO btn
      $('.no').click(function() {
        // reloading the pade
        location.reload()
    })
    // When we click on the close btn
    $('#closeyesnoshopbtn').click(function () {
        location.reload()
    })
    // If clicked on the YES BTN
    $('.yes').click(function() {
        // Getting elements values
        var product = $('#deliproduct').val()
        var quantity = $('#deliver-qua-field').val()
        var unitprice = $('#unit-price').val()
        var totalprice = $('#total-price').val()
        yesyes = "sending"
        // Showing the modal form
        $('.deliver-cont').css({
            "display": "block"
        })
        // Hiding the yes no box
        $('.yesnoshop').css({
            "display": "none"
        })
        // Sending data to the backend
        $('#shop_Resu').load("php/buyer-shop-send-server.php", {
            "yes" : yesyes,
            "product": product,
            "quantity" : quantity,
            "unitp" : unitprice,
            "totalprice" : totalprice
        })
    })
})

