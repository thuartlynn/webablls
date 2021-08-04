(function(n) {
    n.fn.checkIfLogged = function(t) {
        var i = n.extend({
            expectedResult: "OK",
            requestUrl: "",
            requestMethod: "GET",
            isLogged: "",
            isNotLogged: ""
        }, t);
        n.ajax({
            url: i.requestUrl,
            type: i.requestMethod,
            cache: !1,
            asynch: !1,
            success: function(n) {
                n.toString() === i.expectedResult.toString() ? i.isLogged() : i.isNotLogged()
            },
            error: function() {
                i.isNotLogged()
            },
            timeout: 5e3
        })
    }
    ;
    n.fn.popupLogin = function(t) {
        var i = n.extend({
            expectedResult: "OK",
            loginUrl: "",
            afterSuccess: function() {},
            forceLogin: ""
        }, t);
        n("body").off("click", "#popup-login button");
        n("body").on("click", "#popup-login button", function() {
            n("#popup-login button").html("Processing...");
            n("#popup-login button").attr("disabled", "disabled");
            n("#popup-login input#UserName").removeAttr("disabled");
            n.ajax({
                type: "POST",
                cache: !1,
                url: i.loginUrl,
                data: n("#popup-login form").serialize(),
                success: function(t) {
                    t.toString() === i.expectedResult.toString() ? (i.afterSuccess(),
                    n("#popup-login-wrapper").dialog("close")) : n("#popup-login").replaceWith(t)
                }
            })
        });
        n.ajax({
            type: "GET",
            cache: !1,
            url: i.loginUrl,
            success: function(t) {
                n("body").append(t);
                n("#popup-login").wrap('<div id="popup-login-wrapper"><\/div>');
                n("#popup-login-wrapper").dialog({
                    width: 600,
                    height: 500,
                    maxHeight: 1e3,
                    modal: !0,
                    close: function() {
                        n("#popup-login-wrapper").remove()
                    },
                    overlay: {
                        opacity: .5,
                        background: "black"
                    },
                    draggable: !1,
                    resizable: !1,
                    title: "Session Expired",
                    dialogClass: "fixed-dialog"
                });
                n(".fixed-dialog").css("position", "fixed");
                n(".fixed-dialog").css("top", "50px");
                var r = n("#popup-login input#UserName");
                i.forceLogin ? (r.val(i.forceLogin),
                r.attr("disabled", "disabled")) : r.removeAttr("disabled")
            }
        })
    }
    ;
    n.fn.ifLogged = function(t) {
        n().checkIfLogged({
            requestUrl: t.requestUrl,
            isLogged: t.afterSuccess,
            isNotLogged: function() {
                n().popupLogin({
                    loginUrl: t.loginUrl,
                    afterSuccess: t.afterSuccess,
                    forceLogin: t.forceLogin
                })
            }
        })
    }
}
)(jQuery),
function(n) {
    n.fn.setTabs = function() {
        var t, i, r = n(this).find("a");
        t = n(r.filter('[href="' + location.hash + '"]')[0] || r[0]);
        t.addClass("active");
        i = n(t[0].hash);
        r.not(t).each(function() {
            n(this.hash).hide()
        });
        n(this).on("click", "a", function(r) {
            t.removeClass("active");
            i.hide();
            t = n(this);
            i = n(this.hash);
            t.addClass("active");
            i.show();
            r.preventDefault()
        });
        return this
    }
}(jQuery),
function(n) {
    n.fn.tablepainter = function() {
        return n.fn.tablepainter.table = this,
        n(this).bind("sortEnd", function() {
            n(this).find("tbody tr:visible:odd").addClass("odd").removeClass("even");
            n(this).find("tbody tr:visible:even").addClass("even").removeClass("odd")
        }),
        n(this).find("tbody tr:visible:odd").addClass("odd").removeClass("even"),
        n(this).find("tbody tr:visible:even").addClass("even").removeClass("odd"),
        this
    }
    ;
    n.fn.tablepainter.table = {};
    n.fn.tablepainter.paint = function() {
        n.fn.tablepainter.table.find("tbody tr:visible:odd").addClass("odd").removeClass("even");
        n.fn.tablepainter.table.find("tbody tr:visible:even").addClass("even").removeClass("odd")
    }
}(jQuery),
function(n) {
    n.fn.saveTip = function(t) {
        n.fn.saveTip.settings = n.extend(n.fn.saveTip.settings, t)
    }
    ;
    n.fn.saveTip.settings = {
        textWarnign: "",
        textSave: "",
        textCancel: "",
        textConfirm: "",
        saveCallback: function() {},
        cancelCallback: function() {}
    };
    n.fn.saveTip.save = function() {
        var t = '<div id="ablls-savetip" class="s"><div><div class="ico">!<\/div><div class="tipi">' + n.fn.saveTip.settings.textConfirm + "<\/div><\/div><\/div>";
        n("#ablls-savetip").remove();
        n("body").append(t);
        n("#ablls-savetip").css("right", 0);
        n("#ablls-savetip").on("click", function() {
            n(this).hasClass("h") ? (n("#ablls-savetip").animate({
                right: "+=186"
            }),
            n("#ablls-savetip").removeClass("h")) : (n("#ablls-savetip").animate({
                right: "-=242"
            }),
            n("#ablls-savetip").addClass("h"))
        })
    }
    ;
    n.fn.saveTip.change = function() {
        var t = '<div id="ablls-savetip" class="h"><div><div class="ico">!<\/div><div class="tipi">' + n.fn.saveTip.settings.textWarnign + '<br/><br/><span id="save">' + n.fn.saveTip.settings.textSave + '<\/span><span id="cancel">' + n.fn.saveTip.settings.textCancel + "<\/span><\/div><\/div><\/div>";
        n("#ablls-savetip").remove();
        n("body").append(t);
        n("#ablls-savetip").on("click", function() {
            n(this).hasClass("h") ? (n("#ablls-savetip").animate({
                right: "+=186"
            }),
            n("#ablls-savetip").removeClass("h")) : (n("#ablls-savetip").animate({
                right: "-=186"
            }),
            n("#ablls-savetip").addClass("h"))
        });
        n("#ablls-savetip #save").on("click", n.fn.saveTip.settings.saveCallback);
        n("#ablls-savetip #cancel").on("click", n.fn.saveTip.settings.cancelCallback)
    }
}(jQuery)
