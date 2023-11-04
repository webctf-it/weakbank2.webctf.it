$(".delete_user").click(function() {
  var id_e = $(this)
    .parent()
    .parent()[0].id;
  $.ajax({
    type: "POST",
    url: "../funcs/deleteUser.php",
    data: "id=" + id_e,
    success: function(data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 1) {
        M.toast({
          html: "Users deleted"
        });
        window.location.reload();
      } else {
        M.toast({
          html: obj.message
        });
      }
    }
  });
});
