

require('./bootstrap');

require('../../node_modules/bootstrap/dist/js/bootstrap.bundle.min');

$(document).ready(function() {
    
    $(".app-left-pan span.title").on("click",function() {
        var svg = $(this).find("svg");
        $(this).parent().hasClass("hidden")?(
            $(this).parent().removeClass("hidden"),
            svg.attr("class", "svg-inline--fa fa-caret-up fa-w-10 fa-lg mr-2")
        ):(
            $(this).parent().addClass("hidden"),
            svg.attr("class", "svg-inline--fa fa-caret-up fa-w-10 fa-lg mr-2 fa-rotate-180")
        )
    })

    $(".app-right-top-title .button").on("click",function() {
        $(this).parent().hasClass("hidden")?(
            $(this).parent().removeClass("hidden"),
            $(this).html("Hide help")
        ):(
            $(this).parent().addClass("hidden"),
            $(this).html("Show help")
        )
    })
});

