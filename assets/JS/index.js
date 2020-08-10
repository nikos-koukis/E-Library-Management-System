
//---------------show - hide password ----------------------------
function show_password() {
  var pass = document.getElementById("password");
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}

//---------------validate admin-form ----------------------------

$(function() {
  $("form[name='admin_form']").validate({
    rules: {
      username: {
        required: true
      },
      password: {
        required: true
      }
    },
    messages: {
      username: {
        required: "Please enter your username",
      },
      password: {
        required: "Please enter your password",
      }
    }
  });
});