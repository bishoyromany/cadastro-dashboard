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
    const columns = [1, 2, 3, 4];
    if($("#RecordsTable").data("section") === "registrations"){
      columns.push(6);
      columns.push(7);
      columns.push(8);
      columns.push(9);
      columns.push(10);
    }

    $("#RecordsTable").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      searching: false,
      ajax: "API/index.php?section=" + $("#RecordsTable").data("section"),
      lengthMenu: [[25, 50, 100], [25, 50, 100]],
      "order": [[ 0, "desc" ]],
      "columnDefs": [{
        "targets": columns,
        "orderable": false
      }],
      "drawCallback": function( settings ) {
        $(".dataTables_info").prepend($(".delete-all")[0]);
        $(".dataTables_info .delete-all").removeClass("d-none");
      }
    });
  }
});
