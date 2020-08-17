
//---------------show - hide password ----------------------------
function show_password() {
    var pass = document.getElementById("password");
    if (pass.type === "password") {
      pass.type = "text";
    } else {
      pass.type = "password";
    }
  }


  $(function() {
    $("form[name='login_user_form']").validate({
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