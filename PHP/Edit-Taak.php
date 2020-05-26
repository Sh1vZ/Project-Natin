<?php
include "dbConn.php";

if (isset($_POST["x"])) {
    $id  = $_POST['id'];
    $sql = "SELECT taak.Naam, taak.Omschrijving, taak.BeginDatum, taak.EindDatum, richting.Richting,richting.ID as IDR, taak.GeschatteKosten,taak.ID
from taak
left join richting on taak.RichtingID = richting.ID WHERE taak.ID=$id";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $naam         = $row["Naam"];
            $omschrijving = $row["Omschrijving"];
            $begind       = $row["BeginDatum"];
            $eindd        = $row["EindDatum"];
            $idt          = $row["ID"];
            $idr          = $row["IDR"];
            $kosten       = $row["GeschatteKosten"];
            $richt        = $row["Richting"];
?>

            <div class="modal-body">
                <form action="" method="POST" style="width:60vw; margin:0 auto">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pwd">Taak Naam:</label>
                                <input type="text" id="naam1" class="form-control" name="taak-naam" placeholder="" value='<?php echo $naam; ?>' required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pwd">Begin Datum:</label>
                                <input type="date" id="bdatum1" class="form-control" name="datum-begin" value='<?php echo $begind; ?>' placeholder="Begin Datum" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="pwd">Eind Datum:</label>
                                <input type="date" id="edatum1" class="form-control" name="datum-eind" value='<?php echo $eindd; ?>' placeholder="Begin Datum" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pwd">Richting:</label>
                                <select class="form-control selectpicker" title="Kies Leider" data-live-search="true" id="richting1" name="richting">
                                    <option value="<?php echo $idr; ?>" selected><?php echo $richt; ?></option>
                                    <?php
                                    $sql    = "SELECT * FROM richting where Richting != 'Other' AND Richting !='$richt'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['ID'] . "'>" . $row['Richting'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pwd">Geschatte Kosten:</label>
                                <input type="number" class="form-control" id="kosten1" value='<?php echo $kosten; ?>' name="geschatte-kosten" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="pwd">Taak Omschrijving:</label>
                                <textarea class="form-control" id="omschrijving1" value='' name="omschrijving" placeholder="Voer in..." rows="3"><?php echo $omschrijving; ?></textarea>
                            </div>

                        </div>

                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                    <button type="button" name="Edit-Taak" onclick=edit(<?php echo "$id"; ?>) class="btn btn-success">Opslaan</button>
                </div>

            </div>
            </div>
            </div>
            </div>
            </div>
<?php

        }
    }
}

?>

<?php

if (isset($_POST["update"])) {
    $idt          = $_POST['id'];
    $naam         = $_POST['name'];
    $begind       = $_POST['bdatum'];
    $eindd        = $_POST['edatum'];
    $kosten       = $_POST['kosten'];
    $omschrijving = $_POST['omschrijving'];
    $richt        = $_POST['richting'];

    if (empty($naam)) {
        header("Location:./view-projecten.php?error=emptyfields");
        exit();
    } else {
        $sql  = "UPDATE taak SET RichtingID=?,Naam=?,Omschrijving=?,BeginDatum=?,EindDatum=?,GeschatteKosten=? WHERE ID=?";
        $sql1 = mysqli_query($conn, "SELECT * FROM richting WHERE (Richting)='Other'");
        $row  = mysqli_fetch_assoc($sql1);
        $idr  = $row['ID'];
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:./view-projecten.php?error=sqlerror");
            exit();
        } else {
            if (empty($richt)) {
                mysqli_stmt_bind_param($stmt, "issssii", $idr, $naam, $omschrijving, $begind, $eindd, $kosten, $idt);
                mysqli_stmt_execute($stmt);
            } else {
                mysqli_stmt_bind_param($stmt, "issssii", $richt, $naam, $omschrijving, $begind, $eindd, $kosten, $idt);
                mysqli_stmt_execute($stmt);
            }
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_POST["Delete-Taak"])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM taak WHERE ID=$id";
    mysqli_query($conn, $sql);
    echo 1;
    exit;
}
echo 0;
exit;

?>