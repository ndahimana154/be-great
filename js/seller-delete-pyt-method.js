$('document').ready(function() {
    $('.deletepytmtdBTN').click(function() {
        var methodid = $(this).val()
        $('.deletepyt-modal').css({
            "display": "block"
        })
        $('.yesdelete').click(function() {
            $('.yesnobox').load("php/seller-send-method-todelte.php",{
                "methodtodelete" : methodid
            })
        })
    })
    $('#closedeltepytbtn').click(function() {
        $('.deletepyt-modal').css({
            "display": "none"
        })
        location.reload()
    })
    $('.nodontdelete').click(function() {
        $('.deletepyt-modal').css({
            "display": "none"
        })
        location.reload()
    })
})