$('document').ready(function() {
    $('#selling_history_print_BTN').click(function() {
        var contentToPrint = $('#selling_history_print').html()
        var newWindow = window.open(",'_blank'")
        newWindow.document.write('<html><head><title>Print document</title></head><body>'+ contentToPrint + '</body></html>')
        newWindow.document.close()
        newWindow.print()
    })
})