$('document').ready(function() {
    $('.deliverout').click(function() {
        $('.outdelivermodal').css({
            "display": 'block'
        })
    })
    $('#canceldeli').click(function() {
        $('.outdelivermodal').css({
            "display": 'none'
        })
    })
    $('#cancel-deliveroutBTN').click(function() {
        $('.outdelivermodal').css({
            "display": 'none'
        })
    })
}) 
