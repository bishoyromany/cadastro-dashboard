$("#cpf").mask("999.999.999-99");

$("#cpf").keypress(function (e) {
  var charCode = e.which ? e.which : event.keyCode;

  if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
});

$("#telephone").keypress(function (e) {
  var charCode = e.which ? e.which : event.keyCode;

  if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
});

$("#requestno").keypress(function (e) {
  var charCode = e.which ? e.which : event.keyCode;

  if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
});
$("#monthyear").keypress(function (e) {
  var charCode = e.which ? e.which : event.keyCode;

  if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
});
$("#luckyno").keypress(function (e) {
  var charCode = e.which ? e.which : event.keyCode;

  if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
});

var options = {
  onKeyPress: function (cep, e, field, options) {
    var clearno = cep.replace(/[_\-(). ]/g, "");
    var masks = [
      "(000) 00000-0000",
      "(000) 0000-0000",
      "(99) 99999-9999",
      "(99) 9999-9999",
    ];

    if (clearno.charAt(0) == "0") {
      if (clearno.charAt(3) == "9") {
        $("#telephone").mask(masks[0], options);
      } else {
        $("#telephone").mask(masks[1], options);
      }
    } else {
      if (clearno.charAt(2) == "9") {
        $("#telephone").mask(masks[2], options);
      } else {
        $("#telephone").mask(masks[3], options);
      }
    }

    // $('#telephone').mask(mask, options);
  },
};

$("#telephone").mask("(000) 00000-0000", options);

$("#requestno").mask("9999 9999 9999 9999");
$("#monthyear").mask("99/9999");

$(document).ready(function () {
  $(".next").click(function () {
    var form = $("#reg-form");
    form.validate({
      errorElement: "span",
      errorClass: "help-block",
      highlight: function (element, errorClass, validClass) {
        $(element).closest(".form-group").addClass("has-error");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).closest(".form-group").removeClass("has-error");
      },
      rules: {
        name: {
          required: true,
          minlength: 6,
          maxlength: 65,
        },
        cpf: {
          required: true,
          minlength: 14,
          maxlength: 14,
        },
        telephone: {
          required: true,
          minlength: 14,
          maxlength: 16,
        },
        email: {
          required: true,
          maxlength: 60,
        },
      },
      messages: {
        name: {
          required: "Porfavor, digite seu nome completo",
          minlength: "Nome completo inv??lido",
          maxlength: "Nome completo inv??lido",
        },
        cpf: {
          required: "Porfavor, digite seu CPF",
          minlength: "CPF inv??lido",
          maxlength: "CPF inv??lido",
        },
        telephone: {
          required: "Porfavor, digite seu telefone",
          minlength: "Telefone inv??lido",
          maxlength: "Telefone inv??lido",
        },
        email: {
          required: "Porfavor, digite seu endere??o de e-mail",
          maxlength: "E-mail inv??lido",
        },
      },
    });
    if (form.valid() === true) {
      if ($("#account_information").is(":visible")) {
        current_fs = $("#account_information");
        next_fs = $("#company_information");
      } else if ($("#company_information").is(":visible")) {
        current_fs = $("#company_information");
        next_fs = $("#personal_information");
      }

      next_fs.show();
      current_fs.hide();
    }
  });

  $(".submit").click(function () {
    $.validator.addMethod(
      "requestnoregex",
      function (value, element) {
        return this.optional(element) || /^[4,5,3,6]/gm.test(value);
      },
      "Request number is invalid"
    );

    var form = $("#reg-form2");
    form.validate({
      errorElement: "span",
      errorClass: "help-block",
      highlight: function (element, errorClass, validClass) {
        $(element).closest(".form-group").addClass("has-error");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).closest(".form-group").removeClass("has-error");
      },
      rules: {
        purchasetype: {
          required: true,
          minlength: 6,
          maxlength: 50,
        },
        requestno: {
          required: true,
          requestnoregex: true,
          minlength: 19,
          maxlength: 19,
        },
        monthyear: {
          required: true,
          minlength: 7,
          maxlength: 7,
        },
        luckyno: {
          required: true,
          minlength: 3,
          maxlength: 4,
        },
      },
      messages: {
        purchasetype: {
          required: "Porfavor, digite o tipo de compra e categoria",
          minlength: "Tipo de compra e categoria inv??lida",
          maxlength: "Tipo de compra e categoria inv??lida",
        },
        requestno: {
          required: "Porfavor, digite o n??mero de requisi????o",
          minlength: "N??mero de requisi????o inv??lido",
          maxlength: "N??mero de requisi????o inv??lido",
        },
        monthyear: {
          required: "Porfavor, digite o m??s e ano de compra",
          minlength: "M??s e ano de compra inv??lido",
          maxlength: "M??s e ano de compra inv??lido",
        },
        luckyno: {
          required: "Porfavor, digite o n??mero da sorte",
          minlength: "N??mero da sorte inv??lido",
          maxlength: "N??mero da sorte inv??lido",
        },
      },
      submitHandler: function (form) {
        // serialize and join data for all forms
        var data = $("#reg-form").serialize() + "&" + $(form).serialize();
        // ajax submit
        // alert(data);
        $.ajax({
          method: "POST",
          url: "../dashboard/API/index.php?" + data,
          success: (r) => {
            console.log(r);
            $("#company_information").hide();
            $("#section-topic").hide();
            $("#section-desc").hide();
            $("#topic").hide();
            $("#success_message").show();
          },
          error: (e) => {
            console.log(e);
            alert("Somthing went wrong while registering");
          },
        });

        return false;
      },
    });
  });
});
