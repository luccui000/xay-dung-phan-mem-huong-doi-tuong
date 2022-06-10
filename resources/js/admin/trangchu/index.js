$("#toggle-menu").click(function() {
    if($("#sidebar").width() < 200) {
        $("#toggle-menu").css({
            "left": "280px"
        })
    } else {
        $("#toggle-menu").css({
            "left": "95px"
        })
    }
})
