$('document').ready(function() {
    $('#print_withdraw_history_btn').click(function() {
        $('.to_be_hidden').css({
            "display": "none"
        })
        var contentToPrint = $('#print_withdraw_history_content').html()
        var newWindow = window.open(",'_blank'")
        newWindow.document.write('<html><body>'+ contentToPrint + '</body></html>')
        newWindow.document.close()
        newWindow.print()
    })
})