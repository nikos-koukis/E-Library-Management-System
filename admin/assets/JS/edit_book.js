$(function() {
    $("form[name='edit_book_form']").validate({
      rules: {
        book_name: {
          required: true
        }
      },
      messages: {
        book_name: {
          required: "Please enter book name",
        }
      }
    });
  });




