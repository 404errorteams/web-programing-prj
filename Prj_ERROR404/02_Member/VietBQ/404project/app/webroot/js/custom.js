/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#datetimepicker').datepicker({
});
function checkEmailRegister() {
    var x = document.getElementById("registerEmail").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    var y1 = document.getElementById("registerPassword").value;
    var y2 = document.getElementById("verifyPassword").value;
    if (y1 != y2) {
        alert("Verify password incorrect");
        return false;
    }
}
function checkEmailLogin() {
    var x = document.forms["registerMailForm"]["registerAddForm"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}