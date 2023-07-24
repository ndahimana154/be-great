$('document').ready(function() {
    $('#seller_print_stock_history_BTN').click(function() {
        var contentToPrint = $('#seller_print_stock_history_Content').html()
        var newWindow = window.open(",'_blank'")
        newWindow.document.write('<html><body>'+ contentToPrint + '</body></html>')
        newWindow.document.close()
        newWindow.print()
    })
})