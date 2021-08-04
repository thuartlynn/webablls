function actual_save() {
    var n = [];
    $(".w").each(function() {
        var i = $(this).attr("id").split("-")[1], t,s;
        $(this).find(".b.se").length > 0 ? n.push(i + "-0" + ";") : (t = 0,s=0,
        $(this).find(".i").each(function() {
            t++;
            if($(this).hasClass("se"))
               s=t;
            
        }),n.push(i + "-" + s + ";"))
    });
    for (i=0;i<n.length;i++) {
        console.log(n[i]);
    }
    $.ajax({
        type: "POST",
        url: "/Assessment/TgvEditSave/",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            assessmentId: assessmentId,
            values: n
        },
        complete: function() {
            $().save.save();
            changes = !1
            //window.location.reload();
        }
    })
    //$().save.save();
    //changes = !1;
}
$(document).ready(function() {
    $(".main .tgv-category .w:not(.disabled)").on("click", function() {
        if ($(this).children().hasClass("taskpopupMarker")) return;
        var n = $(".main .tgv-category .w.selected:not(.disabled)").length;
        if ($(this).hasClass("selected"))
            $(this).removeClass("selected"),
            $("#taskSelected").html(n - 1);
        else {
            if ($("#taskLimit").html() == $("#taskSelected").html()) {
                alert("You can only select 50 tasks.");
                return
            }
            $(this).addClass("selected");
            $("#taskSelected").html(n + 1)
        }
    });
    $(".tgv-nav .left").on("click", function() {
        $(this).hasClass("ina") || ($("#tgv-page-2").hasClass("hidden") ? ($("#tgv-page-3").addClass("hidden"),
        $("#tgv-page-2").removeClass("hidden"),
        $(".tgv-nav .right").removeClass("ina")) : ($("#tgv-page-2").addClass("hidden"),
        $("#tgv-page-1").removeClass("hidden"),
        $(".tgv-nav .left").addClass("ina")))
    });
    $(".tgv-nav .right").on("click", function() {
        $(this).hasClass("ina") || ($("#tgv-page-2").hasClass("hidden") ? ($("#tgv-page-1").addClass("hidden"),
        $("#tgv-page-2").removeClass("hidden"),
        $(".tgv-nav .left").removeClass("ina")) : ($("#tgv-page-2").addClass("hidden"),
        $("#tgv-page-3").removeClass("hidden"),
        $(".tgv-nav .right").addClass("ina")))
    });
    $(".edit .tgv-category .w .i:not(.p)").on("click", function() {
        if (edit_flag == false)
            return;
        changes || (changes = !0,
        $().save.change());
        $(this).hasClass("se") ? ($(this).removeClass("se"),
        $(this).css("background-color", "inherit"),
        $(this).prevAll(".i:not(.p)").css("background-color", "inherit")) : ($(this).closest(".w").find(".b:not(.p)").removeClass("se"),
        $(this).closest(".w").find(".b:not(.p)").css("background-color", "inherit"),
        $(this).addClass("se"),
        $(this).css("background-color", color),
        $(this).nextAll(".i:not(.p)").removeClass("se"),
        $(this).nextAll(".i:not(.p)").css("background-color", "inherit"),
        $(this).prevAll(".i:not(.p)").removeClass("se"),
        $(this).prevAll(".i:not(.p)").css("background-color", color))
    });
    $(".edit .tgv-category .w .b:not(.p,.bl)").on("click", function() {
        if (edit_flag == false)
            return;
        changes || (changes = !0,
        $().save.change());
        $(this).hasClass("se") ? ($(this).removeClass("se"),
        $(this).css("background-color", "inherit")) : ($(this).addClass("se"),
        $(this).css("background-color", color),
        $(this).closest(".w").find(".i:not(.p)").removeClass("se"),
        $(this).closest(".w").find(".i:not(.p)").css("background-color", "inherit"))
    })
})
