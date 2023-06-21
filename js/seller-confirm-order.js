$('document').ready(function() {
    // When weclick on the confirm button
    $('.seller-order-cfn-order').click(function() {
        var orderid = $(this).val()

        // Show select courier first modal
        $('.select_courier_first_modal').css({
            "display" : "block" 
        })

        // If clicked on procced hide the select first modal and show the 
        // confirm-ordermodal
        $("#procedd_courier").click(function() {
            var couriersn = $('#courier_textbox').val()
            var amountcourier = $("#courier_amount").val()
            $('.select_courier_first_modal').css({
                "display" : "none" 
            })
            // Show the operator modal
            $('.seller-confirmorder-modal').css({
                "display": "block"
            })
            // Load contents
            $('.cofn-modal-content').load("php/seller-confirm-order.php",{
                "order": orderid,
                "courier" : couriersn,
                "courieramount" : amountcourier
            })
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