<?php
include "dbConn.php";

if (isset($_POST["get"])) {
$id=$_POST['id'];

$sql="SELECT * FROM bestedingen WHERE bID = $id";
    $res=mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)>0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $mat=$row["Materialen"];
            $aant=$row["Aantal"];
            $prijs=$row["Prijs"];
            $fac=$row["Factuurtype"];
            }
?>


<form action="" method="POST"  style="width:60vw; margin:0 auto">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pwd">Materialen:</label>
                <textarea class="form-control" name="materialen" placeholder="Voer in..." rows="1" cols="40"
                    required><?=$mat?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="pwd">Aantal:</label>
            <input class="form-control" type="number" name='aantal' placeholder='Aantal' in="0" value="<?=$aant?>" step="0.1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="pwd">Prijs:</label>
            <input class="form-control" type="number" name='prijs' placeholder='Prijs $' in="0" value="<?=$prijs?>" step="0.1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="pwd">Facatuur:</label>
            <select name="factuur" class="form-control" id="" >
                <option value="" selected>Selecteer</option>
                <option value="Verekenbaar">Verekenbaar</option>
                <option value="Niet Verekenbaar">Niet Verekenbaar</option>
            </select>
        </div>
    </div>
    </div>
</form>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick=edit(<?=$id?>) data-dismiss="modal">Close</button>
        <button type="submit" name="submit-materialen" class="btn btn-success">Submit</button>
        </div>

<?php
}

}
?>