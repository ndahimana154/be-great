$('document').ready(function() {
    $('#print_product_orders_content_btn').click(function() {
        $('.to_be_hidden').css({
            "display": "none"
        })
        var contentToPrint = $('#print_product_orders_content').html()
        var newWindow = window.open(",'_blank'")
        newWindow.document.write('<html><body>'+ contentToPrint + '</body></html>')
        newWindow.document.close()
        newWindow.print()
    })
})