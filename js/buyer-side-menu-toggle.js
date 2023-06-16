$('document').ready(function() {
    $('.buyermenuBTN').click(function() {
        $('.buyer-backend-sidemenumodal').css({
            "display": "block"
        })
        $('.buyer-menu-controls').load("php/buyer-side-menu-links.php")
    })
})