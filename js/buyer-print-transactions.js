$('document').ready(function() {
    $('#print_transactions_BTN').click(function() {
        $('.to_be_hidden').css({
            "display": "none"
        })
        var contentToPrint = $('#print_transactions_contents').html()
        var newWindow = window.open(",'_blank'")
        newWindow.document.write('<html><head><title>Print document</title></head><body>'+ contentToPrint + '</body></html>')
        newWindow.document.close()
        newWindow.print()
    })
})