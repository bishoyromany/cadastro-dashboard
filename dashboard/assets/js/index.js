$(document).ready(() => {
  const form = $("#login form");
  form.validate({
    errorElement: "div",
    errorClass: "invalid-feedback",
    highlight: function (element, errorClass, validClass) {
      $(element).closest(".input-group input").addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest(".input-group input").removeClass("is-invalid");
    },
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      username: {
        required: "Inform the username.",
      },
      password: {
        required: "Inform the password.",
      },
    },
  });
});
