<?php
include "dbConn.php";

if (isset($_POST["get-project"])) {
    $id  = $_POST['id'];
    $sql = "SELECT project.Naam, project.Omschrijving, project.BeginDatum, project.EindDatum, project.ProjectleiderID,
    personen.Achternaam, personen.Voornaam
    from project
    left join personen on project.ProjectleiderID = personen.ID where project.ID=$id";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $naam   = $row['Naam'];
            $omschr = $row["Omschrijving"];
            $begind = $row["BeginDatum"];
            $eindd  = $row["EindDatum"];
            $vnaam  = $row["Voornaam"];
            $anaam  = $row["Achternaam"];
            $idp    = $row["ProjectleiderID"];

            ?>
<div class="modal-body">
    <form action="" method="POST" id="" style="width:60vw; margin:0 auto">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Project Naam:</label>
                    <input type="text" id='naam1' class="form-control" name="project-naam" placeholder="Naam"
                        value='<?=$naam;?>' required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pwd">Begin Datum:</label>
                    <input type="date" id='datum-begin1' class="form-control" name="datum-begin"
                        placeholder="Begin Datum" value='<?=$begind;?>' required>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label for="pwd">Eind Datum:</label>
                    <input type="date" id='datum-eind1' class="form-control" name="datum-eind" placeholder="Begin Datum"
                        value='<?=$eindd;?>' required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Project Leider:</label>
                    <select class="selectpicker form-control" title="Kies Richting" id='leider1' data-live-search="true"
                        name="project-leider">
                        <?php
$sql    = "SELECT * FROM personen";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['ID'] . "'>" . $row['Voornaam'] . " " . $row['Achternaam'] . "</option>";
            }?>
                    </select>
                    <script>
                    $('#leider1').selectpicker('val', '<?=$idp;?>');
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <label for="pwd">Project Omschrijving:</label>
                    <textarea class="form-control" id="omschr1" name="omschrijving" placeholder="Voer in..." rows="3"
                        required><?=$omschr;?></textarea>
                </div>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
    <button type="submit" id="" onclick=UpdateProject(<?=$id;?>) name="submit" class="btn btn-success">Opslaan</button>
    </form>
</div>
<?php
}
    }
}

?>


<?php

if (isset($_POST["update-project"])) {
    $projectnaam  = $_POST["naam"];
    $begind       = $_POST["begind"];
    $eindd        = $_POST["eindd"];
    $omschrijving = $_POST["omschr"];
    $leider       = $_POST["leider"];
    $id           = $_POST["id"];

    if (empty($projectnaam) || empty($begind) || empty($eindd) || empty($omschrijving)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "UPDATE project SET Naam=?,Omschrijving=?,BeginDatum=?,EindDatum=?,ProjectleiderID=? WHERE ID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssii", $projectnaam, $omschrijving, $begind, $eindd, $leider, $id);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    
}

if(isset($_POST['a'])){
   $id=  $_POST['id'];

   $sql = "DELETE FROM project WHERE ID=$id";
   mysqli_query($conn,$sql);
   echo 1;
   exit;
}
echo 0;
exit;
?>