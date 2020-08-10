$(function() {
    $("form[name='edit_category_form']").validate({
      rules: {
        category_name: {
          required: true
        }
      },
      messages: {
        category_name: {
          required: "Please enter category name",
        }
      }
    });
  });




