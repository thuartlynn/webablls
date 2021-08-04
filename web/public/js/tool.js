(function(n) {
    n.fn.save = function(t) {
        n.fn.save.settings = n.extend(n.fn.save.settings, t)
    }
    ;
    n.fn.save.settings = {
        Warnign: "",
        Save: "",
        Cancel: "",
        Confirm: "",
        saveCallback: function() {},
        cancelCallback: function() {}
    }
    ;
    n.fn.save.save = function() {
        var t = '<div id="app-save" class="s"><div><div class="ico">!<\/div><div class="i">' + n.fn.save.settings.Confirm + "<\/div><\/div><\/div>";
        n("#app-save").remove();
        n("body").append(t);
        n("#app-save").css("right", 0);
        n("#app-save").on("click", function() {
            n(this).hasClass("disappear") ? (n("#app-save").animate({
                right: "+=185"
            }),
            n("#app-save").removeClass("disappear")) : (n("#app-save").animate({
                right: "-=243"
            }),
            n("#app-save").addClass("disappear"))
        })
        // time = setTimeout(function(){n("#app-save").remove()},5000);
    }
    ;
    n.fn.save.change = function() {
        /*if (time != "") {
            clearTimeout(time);
            time = "";
        }*/
        var t = '<div id="app-save" class="disappear"><div><div class="ico">!<\/div><div class="i">' + n.fn.save.settings.Warnign + '<br/><br/><span id="save">' + n.fn.save.settings.Save + '<\/span><span id="cancel">' + n.fn.save.settings.Cancel + "<\/span><\/div><\/div><\/div>";
        n("#app-save").remove();
        n("body").append(t);
        n("#app-save").on("click", function() {
            n(this).hasClass("disappear") ? (n("#app-save").animate({
                right: "+=185"
            }),
            n("#app-save").removeClass("disappear")) : (n("#app-save").animate({
                right: "-=185"
            }),
            n("#app-save").addClass("disappear"))
        });
        n("#app-save #save").on("click", n.fn.save.settings.saveCallback);
        n("#app-save #cancel").on("click", n.fn.save.settings.cancelCallback)
    }
}
)(jQuery);

function isEmail(str) {
    var regu = "^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|com|gov|mil|org|edu|int|name|asia)$";
    var re = new RegExp( regu );
    if( str.search( re ) == -1 ) {
        return false;
    } else {
        return true;
    }
}

function hasCapital(str) {
    var result = str.match(/^.*[A-Z]+.*$/);
    if(result==null) return false;
    return true;
}

function hasLowercase(str) {
    var result = str.match(/^.*[a-z]+.*$/);
    if(result==null) return false;
    return true;
}

function hasNumber(str) {
    var result = str.match(/^.*[0-9]+.*$/);
    if(result==null) return false;
    return true;
}

function hasOther(str) {
    var result = str.match(/^.*[^0-9A-Za-z]+.*$/);
    if(result==null) return false;
    return true;
}

function BlockUserAccount(UserID, Block) {
    if (!Block) {
        if (!confirm("This action will block users ability to log into WebABLLS system. His data will not be removed. You will be able to undo this action. Are you sure you want to continue?")) return;
        var Url = "/Organization/Manage/Block/" + UserID;
        $.ajax({
            url: Url,
            cache: false
        }).done(function(data) {
            $("#Blocked").html("Unblock User Account");
            window.location.reload();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $("#Blocked").html("error");
        });
    } else {
        if (!confirm("This action will bring back users ability to log into WebABLLS system. Are you sure you want to continue?")) return;
        var Url = "/Organization/Manage/Unblock/" + UserID;
        $.ajax({
            url: Url,
            cache: false
        }).done(function(data) {
            $("#Blocked").html("Block User Account");
            window.location.reload();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $("#Blocked").html("error");
        });
    }
}

function DeleteUserAccount(UserID, CanDelete) {
    if (CanDelete) {
        if (!confirm("This action will delete users account from system permanently. This action cannot be undone. Are you sure you want to continue?")) return;
        var Url = "/Organization/Manage/Delete/" + UserID;
        $.ajax({
            url: Url,
            cache: false
        }).done(function(data) {
            location.href = "/Organization/Users";
        }).fail(function (jqXHR, textStatus, errorThrown) {
        });
    } else {
        if (!confirm("This user is set as Profile Coordinator for at least one Student Profile. User cannot be deleted.")) return;
    }
}

function ResetUserPassword(UserID) {
    if (!confirm("This action will change user password for new one, automatically generated and send it to user via email. Are you sure you want to continue?")) return;
    var Url = "/Organization/Manage/ResetUserPassword/" + UserID;
    $.ajax({
        url: Url,
        cache: false
    }).done(function(data) {
        location.href = "/Organization/Users";
    }).fail(function (jqXHR, textStatus, errorThrown) {
    });
}

function Check_Permission(Index, Auth) {
    var flag = false;
    var temp = 0;
    var Auth_Table = new Array();
    Auth_Table = { 'View Summary' :       {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'View Profile' :       {'FA': 1, 'FAs': 1, 'Im': 1, 'Iv': 1, 'Am': 0, 'Av': 0, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Total Grid View' :    {'FA': 1, 'FAs': 1, 'Im': 1, 'Iv': 1, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Student Assessment' : {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Share Student' :      {'FA': 0, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 0, 'Av': 0, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Student History' :    {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 0, 'Av': 0, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Student Files' :      {'FA': 1, 'FAs': 1, 'Im': 1, 'Iv': 1, 'Am': 1, 'Av': 1, 'Fm': 1, 'Fv': 1, 'O': 1, 'CO': 1, length: 10},
                   'Student Notes' :      {'FA': 1, 'FAs': 1, 'Im': 1, 'Iv': 1, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Add Assessment' :     {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 0, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Assessment Details' : {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Grid Edit' :          {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Text Edit' :          {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Cat Edit' :           {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   'Student Summary' :    {'FA': 1, 'FAs': 1, 'Im': 1, 'Iv': 1, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10},
                   length: 14
                 };

    console.log("Check_Permission Index " + Index);
    console.log("Check_Permission Auth " + Auth);

    if (!jQuery.isEmptyObject(Auth)) {
        if (typeof Auth == "string") {
            Auth.split(',').forEach(function(key) {
                if (typeof Auth_Table[Index][key] != "undefined") {
                    temp = temp | Auth_Table[Index][key];
                }
            });
        } else {
            Auth.forEach(function(key) {
                if (typeof Auth_Table[Index][key] != "undefined") {
                    temp = temp | Auth_Table[Index][key];
                }
            });
        }
    }
            
    if (temp == 1) {
        flag = true;
    }

    console.log("Check_Permission flag " + flag);
    return flag;
}

function Can_Edit(Index, Auth) {
    var flag = false;
    var temp = 0;
    var Student_Edit_Auth_Table = new Array();
    var Assessment_Edit_Auth_Table = new Array();
    var File_Edit_Auth_Table = new Array();
    var Auth_Table = "";
    Student_Edit_Auth_Table =    {'FA': 1, 'FAs': 1, 'Im': 1, 'Iv': 0, 'Am': 0, 'Av': 0, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10};
    Assessment_Edit_Auth_Table = {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 0, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10};
    File_Edit_Auth_Table =       {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 0, 'Av': 0, 'Fm': 1, 'Fv': 0, 'O': 1, 'CO': 1, length: 10};

    console.log("Can_Edit Index " + Index);
    console.log("Can_Edit Auth " + Auth);

    switch (Index) {
        case "Student":
            Auth_Table = Student_Edit_Auth_Table;
            break;
        case "Assessment":
            Auth_Table = Assessment_Edit_Auth_Table;
            break;
        case "File":
            Auth_Table = File_Edit_Auth_Table;
            break;
        default:
            console.log("Unknow Index !!");
            break;
    }

    if (!jQuery.isEmptyObject(Auth) && Auth_Table != "") {
        if (typeof Auth == "string") {
            Auth.split(',').forEach(function(key) {
                if (typeof Auth_Table[key] != "undefined") {
                    temp = temp | Auth_Table[key];
                }
            });
        } else {
            Auth.forEach(function(key) {
                if (typeof Auth_Table[key] != "undefined") {
                    temp = temp | Auth_Table[key];
                }
            });
        }
    }

    if (temp == 1) {
        flag = true;
    }

    console.log("Can_Edit flag " + flag);
    return flag;
}

function Can_See_Private_Note(Auth) {
    var flag = false;
    var temp = 0;
    var Can_See_Private_Table = new Array();
    Can_See_Private_Table =    {'FA': 1, 'FAs': 1, 'Im': 0, 'Iv': 0, 'Am': 1, 'Av': 1, 'Fm': 0, 'Fv': 0, 'O': 1, 'CO': 1, length: 10};

    console.log("Can_See_Private_Note Auth " + Auth);

    if (!jQuery.isEmptyObject(Auth) && Can_See_Private_Table != "") {
        if (typeof Auth == "string") {
            Auth.split(',').forEach(function(key) {
                if (typeof Can_See_Private_Table[key] != "undefined") {
                    temp = temp | Can_See_Private_Table[key];
                }
            });
        } else {
            Auth.forEach(function(key) {
                if (typeof Can_See_Private_Table[key] != "undefined") {
                    temp = temp | Can_See_Private_Table[key];
                }
            });
        }
    }

    if (temp == 1) {
        flag = true;
    }

    console.log("Can_See_Private_Note flag " + flag);
    return flag;
}

function dateValidationCheck(str, format) {
    var re = new RegExp("^([0-9]{1,2})[./]{1}([0-9]{1,2})[./]{1}([0-9]{4})$");
    var strDataValue;
    var infoValidation = true;
    if ((strDataValue = re.exec(str)) != null) {
      var i;
      if (format == 0) {
        i = parseFloat(strDataValue[1]);
        if (i <= 0 || i > 12) {
          infoValidation = false;
        }
        i = parseFloat(strDataValue[2]);
        if (i <= 0 || i > 31) {
          infoValidation = false;
        }
      } else {
        i = parseFloat(strDataValue[1]);
        if (i <= 0 || i > 31) {
          infoValidation = false;
        }
        i = parseFloat(strDataValue[2]);
        if (i <= 0 || i > 12) {
          infoValidation = false;
        }
      }
      i = parseFloat(strDataValue[3]);
      if (i < 1000 || i > 9999) {
        infoValidation = false;
      }
    } else {
      infoValidation = false;
    }
    return infoValidation;
  }