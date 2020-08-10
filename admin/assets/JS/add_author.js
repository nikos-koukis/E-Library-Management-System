$(function() {
    $("form[name='author_form']").validate({
      rules: {
        author_name: {
          required: true
        }
      },
      messages: {
        author_name: {
          required: "Please enter author name",
        }
      }
    });
  });




