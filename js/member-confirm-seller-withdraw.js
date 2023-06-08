$('document').ready(function() {
    $('.widrw-confirmBTN').click(function() {
        withdrawid = $(this).val()
        $('.mbr-confirmsellerwithdra-modal').css({
            "display" : "block"
        })
        $('.yesconfirmwithdraw').click(function() {
            // alert("duh uhu")
            $('.yesnobox').load("php/member-send-withdraw-confirm.php",{
                "withdraw" : withdrawid
            })
        })
    })
    $('.closeconfribtn').click(function() {
        $('.mbr-confirmsellerwithdra-modal').css({
            "display" : "none"
        })
        location.reload()
    })
    $('.nodontconfirm').click(function() {
        $('.mbr-confirmsellerwithdra-modal').css({
            "display" : "none"
        })
        location.reload()
    })
})