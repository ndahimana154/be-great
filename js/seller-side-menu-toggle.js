$('document').ready(function() {
    $('#seller_sidemenu').click(function() {
        $('.seller-backend-sidemenumodal').toggle()
        $('.seller-menu-controls').load("php/seller-side-menu-links.php")
    })
})