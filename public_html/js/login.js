$(document).ready(function() {
  $(".sidenav").sidenav();
  $("#loginForm").submit(function() {
    $.ajax({
      type: "POST",
      url: "../funcs/login.php",
      data: "email=" + $("#email").val() + "&pass=" + $("#pass").val(),
      success: function(json) {
        var obj = jQuery.parseJSON(json);
        if (obj.success == 1) {
          if (obj.admin == 1) window.location.href = "/admin/";
          else if (obj.admin == 0) window.location.href = "/main/conto.php";
        } else if (obj.success == 0) {
          M.toast({ html: obj.message, classes: "red" });
        }
      }
    });
    return false;
  });
});
