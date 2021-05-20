$(document).ready(($) => {
  const form = $("#login form");
  if (form.length > 0) {
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
  }

  if ($("#RecordsTable").length > 0) {
    $("#RecordsTable").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: "API/index.php?section=" + $("#RecordsTable").data("section"),
    });
  }
});
