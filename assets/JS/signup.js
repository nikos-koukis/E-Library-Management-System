
//---------------show - hide password ----------------------------
function show_password() {
    var pass = document.getElementById("password");
    var confirm_pass = document.getElementById("confirm_password");
    if (pass.type === "password" || (confirm_pass.type === "confirm_password")) {
        pass.type = "text";
        confirm_pass.type = "text";
    } else {
        pass.type = "password";
        confirm_pass.type = "password";
    }
  }
  

  $(function() {
    $("form[name='signup_form']").validate({
      rules: {
        username: {
          required: true
        },
        email: {
          required: true
        },
        phone: {
          maxlength: 10
        },
        password: {
          required: true
        },
        confirm_password: {
          required: true,
          equalTo : "#password"
        }
      },
      messages: {
        username: {
          required: "Please enter your username"
        },
        email: {
          required: "Please enter your email"
        },
        phone: {
          maxlength: "Please enter no more than 10 digits"
        },
        password: {
          required: "Please enter your password"
        },
        confirm_password: {
          required: "Please confrim your password",
          equalTo: "Passwords do not match!"
        }
      }
    });
  });

