$('document').ready(function() {
    $('.deletepytmethodBTN').click(function() {
        var pytmethod = $(this).val()
        $('.buyerdeletepyt-modal').css({
            "display" : "block"
        })
        $('.yesdeletebuyeMethod').click(function() {
            $('.yesnobox').load("php/buyer-send-delete-method.php",{
                "methodtodelete" : pytmethod
            })
        })
    })  
    $('.closedeltepytbtn').click(function() {
        $('.buyerdeletepyt-modal').css({
            "display" : "none"
        })
        location.reload()
    })
})