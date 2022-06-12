$("#toggle-menu").click(function() {
    if($("#sidebar").width() < 200) {
        $("#toggle-menu").css({
            "left": "280px"
        })
        $(".content-wrapper .page-header .page-title").css({
            "left": "310px"
        })
    } else {
        $("#toggle-menu").css({
            "left": "95px"
        })
        $(".content-wrapper .page-header .page-title").css({
            "left": "125px"
        })
    }
})
