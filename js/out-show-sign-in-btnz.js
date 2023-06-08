$('document').ready(function() {
    $('.deliverout').click(function() {
        $('.outdelivermodal').css({
            "display": 'block'
        })
    })
    $('.canceldeli').click(function() {
        $('.outdelivermodal').css({
            "display": 'none'
        })
        location.reload()
    })
})