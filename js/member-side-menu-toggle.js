$('document').ready(function() {
    $('#member_sidemenu').click(function() {
        $('.backend-sidemenumodal').toggle()
        $('.menu-controls').load("php/member-side-menu-links.php")
    })
    $('.close-sidebarmenu').click(function() {
        $('.backend-sidemenumodal').toggle()
        location.reload()
    })
})