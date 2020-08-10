$(function() {
    $("form[name='change_pass']").validate({
      rules: {
        current_password: {
          required: true
        },
        new_password: {
            required: true
          },
        confirm_password: {
            required: true,
            equalTo : "#new_password"
        }
      },
      messages: {
        current_password: {
          required: "Please enter current password"
        },
        new_password: {
            required: "Please enter new password"
          },
          confirm_password: {
            required: "Please confrim password",
            equalTo: "Passwords do not match!"
          }
      }
    });
  });




