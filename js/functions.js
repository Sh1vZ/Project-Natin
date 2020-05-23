// DIENSTEN+BESTEDINGEN

$(document).ready(function () {
    $('.data1').DataTable({});

    if (sessionStorage.getItem('Submit')) {
        toastr.success('Succesvol Ingevoerd', 'Bericht')
        sessionStorage.removeItem('Submit');
    }
    if (localStorage.getItem("Delete")) {
        toastr.error('Succesvol Verwijderd', 'Bericht');
        localStorage.clear();
    }

    if (localStorage.getItem("Update")) {
        toastr.success('Succesvol Bewerkt', 'Bericht');
        localStorage.clear();
    }

});

function Submit() {
    sessionStorage.setItem('Submit', true);
}

function goBack(e) {
    window.location = `view-projecten.php?id=${e}`;
}

function EditRowBesteding(e) {
    $.ajax({
        type: 'post',
        url: '../PHP/Edit-Bestedingen.php',
        data: {
            "get": 1,
            "id": e,
        },
        dataType: "text",
        success: function (response) {
            $('#detail').html(response);
            $('#exampleModalPreview1').modal('toggle');
        }
    });

}

function EditRowDienst(e) {
    $.ajax({
        type: 'post',
        url: '../PHP/Edit-Bestedingen.php',
        data: {
            "get-dienst": 1,
            "id": e,
        },
        dataType: "text",
        success: function (response) {
            $('#detail').html(response);
            $('#exampleModalPreview1').modal('toggle');
        }
    });

}

function EditBesteding(e) {

    var mat = $('#matedit').val();
    var aant = $('#aantedit').val();
    var prijs = $('#prijsedit').val();
    var fac = $('#facedit').val();


    $.ajax({
        url: '../PHP/Edit-Bestedingen.php',
        type: 'POST',
        data: {
            'update': 1,
            'id': e,
            'mat': mat,
            'prijs': prijs,
            'fac': fac,
            'aant': aant,

        },
        success: function (response) {
            location.reload();

        }
    });
}

function EditDienst(e) {

    var pers = $('#session_pick').val();
    var fac = $('#facdienst').val();

    $.ajax({
        url: '../PHP/Edit-Bestedingen.php',
        type: 'POST',
        data: {
            'update-dienst': 1,
            'id': e,
            'pers': pers,
            'fac': fac,
        },
        success: function (response) {
            location.reload();


        }
    });
}
//EINDE BESTEDINGEN+DIENSTEN


//PROJECTEN

function UpdateProject(e) {

    var naam = $('#naam1').val();
    var begind = $('#datum-begin1').val();
    var eindd = $('#datum-eind1').val();
    var leider = $('#leider1').val();
    var omschr = $('#omschr1').val();
    $.ajax({
        url: './PHP/Edit-Project.php',
        type: 'POST',
        data: {
            'update-project': 1,
            'id': e,
            'naam': naam,
            'begind': begind,
            'eindd': eindd,
            'leider': leider,
            'omschr': omschr,
        },
        success: function (response) {
            localStorage.setItem("Update", response.OperationStatus)
            location.reload();
        }
    });
}

function EditRowProjecten(e) {
    $.ajax({
        type: 'POST',
        url: './PHP/Edit-Project.php',
        data: {
            "get-project": 1,
            "id": e,
        },
        dataType: "text",
        success: function (response) {
            $('#detail').html(response);
            $('.selectpicker').selectpicker({});
            $('#exampleModalPreview1').modal('toggle');
        }
    });

}

$('.delete').click(function () {
    // Delete id
    var deleteid = $(this).data('id');

    // Confirm box
    bootbox.confirm({
        message: "Bent U zeker dat u deze wilt verwijderen?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: 'No',
                className: 'btn-success'
            }
        },
        callback: function (result) {
            if (result) {
                // AJAX Request
                $.ajax({
                    url: './PHP/Edit-Project.php',
                    type: 'POST',
                    data: {
                        "a": 1,
                        "id": deleteid,
                    },
                    success: function (response) {
                        // Removing row from HTML Table
                        if (response == 1) {
                            localStorage.setItem("Delete", response.OperationStatus)
                            location.reload();
    
                        } else {
                            bootbox.alert('Record not deleted.');
                        }
    
                    }
                });
            }
        }
    });

       

    });


//TAAAAAAAK

function EditTaak(e) {
    // alert(e);
    var id = e;
    // alert(e);

    $.ajax({
        type: 'post',
        url: 'Edit-Taak.php',
        data: {
            "x": 1,
            "id": id,
        },
        dataType: "text",
        success: function(response) {
            $('#form-container').html(response);
            $('.selectpicker').selectpicker({});
            $('#exampleModal').modal('toggle');
        }
    });

    // $('#exampleModalPreview').modal('toggle');
}

function edit(e) {

    var name = $('#naam1').val();
    var bdatum = $('#bdatum1').val();
    var edatum = $('#edatum1').val();
    var kosten = $('#kosten1').val();
    var omschrijving = $('#omschrijving1').val();
    var richting = $('#richting1').val();

    $.ajax({
        url: 'Edit-Taak.php',
        type: 'POST',
        data: {
            'update': 1,
            'id': e,
            'name': name,
            'bdatum': bdatum,
            'edatum': edatum,
            'kosten': kosten,
            'omschrijving': omschrijving,
            'richting': richting,

        },
        success: function(response) {
            localStorage.setItem("Update", response.OperationStatus)
            location.reload();
        }
    });
}

function DeleteTaak(e){

    bootbox.confirm({
        message: "Bent U zeker dat u deze wilt verwijderen?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: 'No',
                className: 'btn-success'
            }
        },
        callback: function (result) {
            if (result) {
                // AJAX Request
                $.ajax({
                    url: './Edit-Taak.php',
                    type: 'POST',
                    data: {
                        "Delete-Taak": 1,
                        "id": e,
                    },
                    success: function (response) {
                        // Removing row from HTML Table
                        if (response == 1) {
                            localStorage.setItem("Delete", response.OperationStatus)
                            location.reload();
    
                        } else {
                            bootbox.alert('Record not deleted.');
                        }
    
                    }
                });
            }
        }
    });
}