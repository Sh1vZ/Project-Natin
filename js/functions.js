// DIENSTEN+BESTEDINGEN

$(document).ready(function () {
  $(".data1").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json",
    },
  });

  toastr.options = {
    closeButton: true,
  };

  if (sessionStorage.getItem("Submit")) {
    toastr.success("Succesvol Ingevoerd", "Bericht");
    toastr.options = {
      closeButton: true,
    };
    sessionStorage.removeItem("Submit");
  }

  if (sessionStorage.getItem("Update")) {
    toastr.info("Succesvol Bijgewerkt", "Bericht");
    sessionStorage.removeItem("Update");
  }

  if (localStorage.getItem("Delete")) {
    toastr.error("Succesvol Verwijderd", "Bericht");
    localStorage.clear();
  }

  if (localStorage.getItem("Update")) {
    toastr.info("Succesvol Bewerkt", "Bericht");
    localStorage.clear();
  }
});

function goBack(e) {
  window.location = `view-projecten.php?id=${e}`;
}

function goBack1(e, a) {
  window.location = `./registratie-bestedingen.php?id=${e}&idt=${a}`;
}

function EditRowBesteding(e) {
  $.ajax({
    type: "post",
    url: "../PHP/Edit-Bestedingen.php",
    data: {
      get: 1,
      id: e,
    },
    dataType: "text",
    success: function (response) {
      $("#detail").html(response);
      $("#exampleModalPreview1").modal("toggle");
    },
  });
}

function DeleteMateriaal(e) {
  bootbox.confirm({
    message: "Bent U zeker dat u deze wilt verwijderen?",
    buttons: {
      confirm: {
        label: "JA",
        className: "btn-danger",
      },
      cancel: {
        label: "NEE",
        className: "btn-success",
      },
    },
    callback: function (result) {
      if (result) {
        // AJAX Request
        $.ajax({
          url: "./Edit-Bestedingen.php",
          type: "POST",
          data: {
            "Delete-Materialen": 1,
            id: e,
          },
          success: function (response) {
            // Removing row from HTML Table
            if (response == 1) {
              localStorage.setItem("Delete", response.OperationStatus);
              location.reload();
            } else {
              bootbox.alert("Record not deleted.");
            }
          },
        });
      }
    },
  });
}

function EditRowDienst(e) {
  $.ajax({
    type: "post",
    url: "../PHP/Edit-Bestedingen.php",
    data: {
      "get-dienst": 1,
      id: e,
    },
    dataType: "text",
    success: function (response) {
      $("#detail").html(response);
      $("#exampleModalPreview1").modal("toggle");
    },
  });
}

function EditBesteding(e) {
  var mat = $("#matedit").val();
  var aant = $("#aantedit").val();
  var prijs = $("#prijsedit").val();
  var fac = $("#facedit").val();

  $.ajax({
    url: "../PHP/Edit-Bestedingen.php",
    type: "POST",
    data: {
      update: 1,
      id: e,
      mat: mat,
      prijs: prijs,
      fac: fac,
      aant: aant,
    },
    success: function (response) {
      localStorage.setItem("Update", response.OperationStatus);
      location.reload();
    },
  });
}

function EditBedrag(e) {
  var prijs = $("#prijs1").val();

  $.ajax({
    url: "../PHP/Edit-Bestedingen.php",
    type: "POST",
    data: {
      "update-bedrag": 1,
      id: e,
      prijs: prijs,
    },
    success: function (response) {
      localStorage.setItem("Update", response.OperationStatus);
      location.reload();
    },
  });
}

function GetBedrag(e) {
  $.ajax({
    type: "post",
    url: "../PHP/Edit-Bestedingen.php",
    data: {
      "get-bedrag": 1,
      id: e,
    },
    dataType: "text",
    success: function (response) {
      $("#detail").html(response);
      $("#exampleModalPreview1").modal("toggle");
    },
  });
}

function EditDienst(e) {
  var pers = $("#session_pick").val();
  var fac = $("#facdienst").val();

  $.ajax({
    url: "../PHP/Edit-Bestedingen.php",
    type: "POST",
    data: {
      "update-dienst": 1,
      id: e,
      pers: pers,
      fac: fac,
    },
    success: function (response) {
      localStorage.setItem("Update", response.OperationStatus);
      location.reload();
    },
  });
}
//EINDE BESTEDINGEN+DIENSTEN

//PROJECTEN

function UpdateProject(e) {
  var naam = $("#naam1").val();
  var begind = $("#datum-begin1").val();
  var eindd = $("#datum-eind1").val();
  var leider = $("#leider1").val();
  var omschr = $("#omschr1").val();
  $.ajax({
    url: "./PHP/Edit-Project.php",
    type: "POST",
    data: {
      "update-project": 1,
      id: e,
      naam: naam,
      begind: begind,
      eindd: eindd,
      leider: leider,
      omschr: omschr,
    },
    success: function (response) {
      localStorage.setItem("Update", response.OperationStatus);
      location.reload();
    },
  });
}

function EditRowProjecten(e) {
  $.ajax({
    type: "POST",
    url: "./PHP/Edit-Project.php",
    data: {
      "get-project": 1,
      id: e,
    },
    dataType: "text",
    success: function (response) {
      $("#detail").html(response);
      $(".selectpicker").selectpicker({});
      $("#exampleModalPreview1").modal("toggle");
    },
  });
}

$(".delete").click(function () {
  // Delete id
  var deleteid = $(this).data("id");

  // Confirm box
  bootbox.confirm({
    message: "Bent U zeker dat u deze wilt verwijderen?",
    buttons: {
      confirm: {
        label: "JA",
        className: "btn-danger",
      },
      cancel: {
        label: "NEE",
        className: "btn-success",
      },
    },
    callback: function (result) {
      if (result) {
        // AJAX Request
        $.ajax({
          url: "./PHP/Edit-Project.php",
          type: "POST",
          data: {
            a: 1,
            id: deleteid,
          },
          success: function (response) {
            // Removing row from HTML Table
            if (response == 1) {
              localStorage.setItem("Delete", response.OperationStatus);
              location.reload();
            } else {
              bootbox.alert("Record not deleted.");
            }
          },
        });
      }
    },
  });
});

//TAAAAAAAK

function EditTaak(e) {
  // alert(e);
  var id = e;
  // alert(e);

  $.ajax({
    type: "post",
    url: "Edit-Taak.php",
    data: {
      x: 1,
      id: id,
    },
    dataType: "text",
    success: function (response) {
      $("#form-container").html(response);
      $(".selectpicker").selectpicker({});
      $("#exampleModal").modal("toggle");
    },
  });
}

function edit(e) {
  var name = $("#naam1").val();
  var bdatum = $("#bdatum1").val();
  var edatum = $("#edatum1").val();
  var kosten = $("#kosten1").val();
  var omschrijving = $("#omschrijving1").val();
  var richting = $("#richting1").val();

  $.ajax({
    url: "Edit-Taak.php",
    type: "POST",
    data: {
      update: 1,
      id: e,
      name: name,
      bdatum: bdatum,
      edatum: edatum,
      kosten: kosten,
      omschrijving: omschrijving,
      richting: richting,
    },
    success: function (response) {
      localStorage.setItem("Update", response.OperationStatus);
      location.reload();
    },
  });
}

function DeleteTaak(e) {
  bootbox.confirm({
    message: "Bent U zeker dat u deze wilt verwijderen?",
    buttons: {
      confirm: {
        label: "JA",
        className: "btn-danger",
      },
      cancel: {
        label: "NEE",
        className: "btn-success",
      },
    },
    callback: function (result) {
      if (result) {
        // AJAX Request
        $.ajax({
          url: "./Edit-Taak.php",
          type: "POST",
          data: {
            "Delete-Taak": 1,
            id: e,
          },
          success: function (response) {
            // Removing row from HTML Table
            if (response == 1) {
              localStorage.setItem("Delete", response.OperationStatus);
              location.reload();
            } else {
              bootbox.alert("Record not deleted.");
            }
          },
        });
      }
    },
  });
}

//ADMINISTRATIE-PERSONEN

function foo() {
  $("#an").removeClass("disabled");
  $("#ag").removeClass("disabled");
  $("#stud")[0].reset();
  $("#stud1")[0].reset();
  $("#organisatie2").html(" ");
  $("#richting").html(" ");
}

function Org() {
  $("#details").removeClass("active");
  $("#an").addClass("disabled");
  $("#ag").addClass("active");
  $("#an").removeClass("active");
  $("#access-security").addClass("active");
  $("#access-security").removeClass("fade");
  $("#edit-org").attr("name", "edit-org");
  $("#exampleModalPreview").modal("toggle");
}

function Nat() {
  $("#access-security").removeClass("active");
  $("#ag").addClass("disabled");
  $("#an").addClass("active");
  $("#ag").removeClass("active");
  $("#details").addClass("active");
  $("#details").removeClass("fade");
  $("#edit-stud").attr("name", "edit-stud");
  $("#exampleModalPreview").modal("toggle");
}

function EditRow(e) {
  var naam = $("#" + e)
    .children("td[data-target=naam]")
    .text();
  var vnaam = $("#" + e)
    .children("td[data-target=vnaam]")
    .text();
  var org = $("#" + e)
    .children("td[data-target=org]")
    .text();
  var richting = $("#" + e)
    .children("td[data-target=richting]")
    .text();
  var functie = $("#" + e)
    .children("td[data-target=functie]")
    .text();
  var telnum = $("#" + e)
    .children("td[data-target=telnum]")
    .text();

  if (org == "Natin") {
    Nat();
    $("#vnaam").val(vnaam);
    $("#anaam").val(naam);
    $("#telnumm").val(telnum);
    $("#func").val(functie);
    $("#richting2").html(`Huidige richting is ${richting}`);
    $("#sid").val(e);
  } else {
    Org();
    $("#vnaamo").val(vnaam);
    $("#anaamo").val(naam);
    $("#telnummo").val(telnum);
    $("#funco").val(functie);
    $("#organisatie2").html(`Huidige richting is ${org}`);
    $("#oid").val(e);
  }
}

function DeletePersoon(e) {
  bootbox.confirm({
    message: "Bent U zeker dat u deze wilt verwijderen?",
    buttons: {
      confirm: {
        label: "JA",
        className: "btn-danger",
      },
      cancel: {
        label: "NEE",
        className: "btn-success",
      },
    },
    callback: function (result) {
      if (result) {
        // AJAX Request
        $.ajax({
          url: "./PHP/Edit-Persoon.php",
          type: "POST",
          data: {
            "Delete-Persoon": 1,
            id: e,
          },
          success: function (response) {
            // Removing row from HTML Table
            if (response == 1) {
              localStorage.setItem("Delete", response.OperationStatus);
              location.reload();
            } else {
              bootbox.alert("Record not deleted.");
            }
          },
        });
      }
    },
  });
}
////Gebruikers

function EditGebruikers(e) {
  $.ajax({
    type: "post",
    url: "./PHP/Edit-Gebruikers.php",
    data: {
      "get-gebruikers": 1,
      id: e,
    },
    dataType: "text",
    success: function (response) {
      $("#detail").html(response);
      $(".selectpicker").selectpicker({});
      $("#exampleModalPreview1").modal("toggle");
    },
  });
}

function updateGebruikers(e) {
  var user = $("#user-usernaam1").val();
  var rollen = $("#rollen").val();
  var telnummer = $("#user-telnummer1").val();
  var email = $("#user-email1").val();
  var password = $("#user-password1").val();

  $.ajax({
    url: "./PHP/Edit-Gebruikers.php",
    type: "POST",
    data: {
      "update-gebruikers": 1,
      id: e,
      user: user,
      telnummer: telnummer,
      email: email,
      rollen: rollen,
      password: password,
    },
    success: function (response) {
      localStorage.setItem("Update", response.OperationStatus);
      location.reload();
    },
  });
}

function DeleteGebruiker(e) {
  bootbox.confirm({
    message: "Bent U zeker dat u deze wilt verwijderen?",
    buttons: {
      confirm: {
        label: "JA",
        className: "btn-danger",
      },
      cancel: {
        label: "NEE",
        className: "btn-success",
      },
    },
    callback: function (result) {
      if (result) {
        // AJAX Request
        $.ajax({
          url: "./PHP/Edit-Gebruikers.php",
          type: "POST",
          data: {
            "Delete-Gebruiker": 1,
            id: e,
          },
          success: function (response) {
            // Removing row from HTML Table
            if (response == 1) {
              localStorage.setItem("Delete", response.OperationStatus);
              location.reload();
            } else {
              bootbox.alert("Record not deleted.");
            }
          },
        });
      }
    },
  });
}
