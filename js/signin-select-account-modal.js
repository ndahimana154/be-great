$('document').ready(function () {
    $('#LoginBTN').click(function () {
        $('#s-in-modal').css({
            "display": "block"
        })
        $('.sign-in-type').load("php/signin-type.php")
    })
    $('#close-s-in-btn').click(function() {
        $('#s-in-modal').css({
            "display":"none"
        })
        location.reload()
    })
    $('#cancel-s-in-btn').click(function() {
        $('#s-in-modal').css({
            "display":"none"
        })
        location.reload()
    })
})