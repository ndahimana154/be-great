$('document').ready(function() {
    $('#fill_initial_BTN').click(function() {
        $('.missing-location').toggle()
    })
    $('#district').keyup(function() {
        $('.seconds').css({
            "display": "block"
        })
    })
    $('#sector').keyup(function() {
        $('.third').css({
            "display" : "block"
        })
    })
    $('#location').keyup(function() {
        $('.btnz').css({
            "display" : "block"
        })
    })
    $('#saveshopLocation_BTN').click(function() {
        var district = $('#district').val()
        var sector = $('#sector').val()
        var location = $('#location').val()
        $('.saveLocaresu').load("php/seller-save-location-send-data.php",{
            "district" : district,
            "sector" : sector,
            "location" : location
        })
    })
})