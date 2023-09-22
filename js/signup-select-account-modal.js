$('document').ready(function () {
    $('#signupBTN').click(function () {
        $('#s-t-modal').css({
            "display": "block"
        })
        $('.signup-type').load("php/signup-type.php")
    })
    // $('#s-t-modal').click(function() {
    //     $(this).css({
    //         "display":"none"
    //     })
    // })
    $('#close-s-t-btn').click(function() {
        $('#s-t-modal').css({
            "display":"none"
        })
        // location.reload()
    })
    $('#cancel-s-t-btn').click(function() {
        $('#s-t-modal').css({
            "display":"none"
        })
    })
})