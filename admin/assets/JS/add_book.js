$(function() {
    $("form[name='book_form']").validate({
      rules: {
        book_name: {
          required: true
        },
        category_name: {
            required: true
          },
          author_name: {
            required: true
          },
          isbn: {
            required: true
          },
          price: {
            required: true
          }
      },
      messages: {
        book_name: {
          required: "Please enter book name"
        },
        category_name: {
            required: "Please select category"
          },
          author_name: {
            required: "Please select author"
          },
          isbn: {
            required: "Please enter isbn"
          },
          price: {
            required: "Please enter price"
          }
      }
    });
  });




