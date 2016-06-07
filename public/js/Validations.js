/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $("#Full_name").keyup(function () {

        var first = $("#Full_name").val();

        if (first.length == 0)
            $("#Fullname_error").html("Name should not be null");
        else if ($.isNumeric(first))
            $("#Fullname_error").html("Name should not be Characters");
        else if (first.length < 5)
            $("#Fullname_error").html("Name should not be less than 5 characters");
        else
            $("#Fullname_error").html("");

    });
    $("#LastName").keyup(function () {

        var first = $("#LastName").val();

        if (first.length == 0)
            $("#LastName_error").html("Name should not be null");
        else if ($.isNumeric(first))
            $("#LastName_error").html("Name should not be Characters");
        else if (first.length < 5)
            $("#LastName_error").html("Name should not be less than 5 characters");
        else
            $("#LastName_error").html("");

    });
    $("#Email").keyup(function () {
        var mailid = $("#Email").val();
        if (mailid == "")
        {
            $("#Email_error").html("enter email address");
        }
        var atpos = mailid.indexOf("@");
        var dotpos = mailid.lastIndexOf(".");
        if (atpos < 1 || atpos < 5 || dotpos < 1 || atpos + 3 > dotpos || atpos > dotpos || dotpos + 3 > mailid.length)
        {
            $("#Email_error").html("enter valid email eg:abcd@hjk.in");
            return false;
        } else
        {
            $("#Email_error").html("");
        }
    });
   

   
    $("#Password").keyup(function () {

        var ValidatePassword = $("#Password").val();
        if (ValidatePassword.length < 8)
        {
            $("#PasswordError").html("Password should be atleast 8 characters");
        } else {
            $("#PasswordError").html("");
        }

    });
   

    $("#next").click(function (event) {

        var fullname = ValidateFullName();
         var LastName = ValidateLastName();
         var Email = ValidateEmail();
          var password = ValidatePassword();
        var changePassword = $("#Password").val();

        var Confirm = $("#Confirm").val();


        if (fullname == false ||LastName==false|| Email == false ||password == false || changePassword != Confirm)
        {
            event.preventDefault();
              $("#confirmError").html("Confirm Password should be same as with Password");
        }

    });
});
function ValidateFullName() {
    var first = $("#Full_name").val();

    if (first.length == 0)
    {
        $("#Fullname_error").html("Name should not be null");
        return false;
    } else if ($.isNumeric(first)) {
        $("#Fullname_error").html("Name should not be Characters");
        return false;
    } else if (first.length < 5) {
        $("#Fullname_error").html("Name should not be less than 5 characters");
        return false;
    } else {
        $("#Fullname_error").html("");
        return true;
    }
}
function ValidateLastName() {
    var first = $("#LastName").val();

    if (first.length == 0)
    {
        $("#LastName_error").html("Name should not be null");
        return false;
    } else if ($.isNumeric(first)) {
        $("#LastName_error").html("Name should not be Characters");
        return false;
    } else if (first.length < 5) {
        $("#LastName_error").html("Name should not be less than 5 characters");
        return false;
    } else {
        $("#LastName_error").html("");
        return true;
    }
}
function ValidateEmail() {
    var mailid = $("#Email").val();
    if (mailid == "")
    {
        $("#Email_error").html("enter email address");
    }
    var atpos = mailid.indexOf("@");
    var dotpos = mailid.lastIndexOf(".");
    if (atpos < 1 || atpos < 5 || dotpos < 1 || atpos + 3 > dotpos || atpos > dotpos || dotpos + 3 > mailid.length)
    {
        $("#Email_error").html("enter valid email eg:abcd@hjk.in");
        return false;
    } else
    {
        $("#Email_error").html("");
        return true;
    }

}


function ValidatePassword() {
    var ValidatePassword = $("#Password").val();
    if (ValidatePassword.length < 8)
    {
        $("#PasswordError").html("Password should be atleast 8 characters");
        return false;
    } 
    else {
        $("#PasswordError").html("");
        return true;
    }
}

