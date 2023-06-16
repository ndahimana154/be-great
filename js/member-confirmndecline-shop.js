$('document').ready(function() {
    var postvar = "aa";
    // When the confirm button is clicked
    $('.Confirmshop').click(function() {
        var waitingid = $(this).val()
        $('.confirmordecline').css({
            "display": "block"
        })
        postvar = "confirm"
        $('.confirm-content').load("php/member-shops-confirmordecline.php",{
            "confirm" : postvar,
            "waitingid" : waitingid 
        })
    })
    // When the decline button is clicked
    $('.declineshop').click(function() {
        var waitingid = $(this).val()
        $('.confirmordecline').css({
            "display": "block"
        })
        var postvar = "Decline"
        alert(waitingid)
        // alert("dsuinu")
        $('.confirm-content').load("php/member-shops-confirmordecline.php",{
            "decline" : postvar,
            "waitingid" : waitingid 
        })
    })
    // When the close button is cliked
    $('.closeconordeclbtn').click(function() {
        $('.confirmordecline').css({
            "display": "none"
        })
        location.reload()
    })
})