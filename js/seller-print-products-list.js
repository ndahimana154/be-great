$('document').ready(function() {
    $('#print_product_list_BTN').click(function() {
        $('.to_be_hidden').css({
            "display": "none"
        })
        var contentToPrint = $('#print_product_list_Content').html()
        var newWindow = window.open(",'_blank'")
        newWindow.document.write('<html><head><title>Print document</title></head><body>'+ contentToPrint + '</body></html>')
        newWindow.document.close()
        newWindow.print()
    })
})