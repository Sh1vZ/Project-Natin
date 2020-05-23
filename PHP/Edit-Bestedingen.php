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


<form action="" method="" style="width:60vw; margin:0 auto">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pwd">Materialen:</label>
                <textarea class="form-control" name="materialen" id='matedit' placeholder="Voer in..." rows="1"
                    cols="40" required><?=$mat?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="pwd">Aantal:</label>
            <input class="form-control" type="number" name='aantal' id='aantedit' placeholder='Aantal' in="0"
                value="<?=$aant?>" step="0.1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="pwd">Prijs:</label>
            <input class="form-control" type="number" name='prijs' id='prijsedit' placeholder='Prijs $' in="0"
                value="<?=$prijs?>" step="0.1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="pwd">Facatuur:</label>
            <select  class="form-control" id="facedit">
                <?php 
if($fac=='Verekenbaar'){
echo '<option value="Verekenbaar" selected>Verekenbaar</option>';
echo '<option value="Niet Verekenbaar">Niet Verekenbaar</option>';
} if($fac!=='Verekenbaar'){
    echo '<option value="Niet Verekenbaar" selected>Niet Verekenbaar</option>';
    echo '<option value="Verekenbaar">Verekenbaar</option>';
}

                ?>
            </select>
        </div>
    </div>
    </div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="" onclick=EditBesteding(<?=$id?>) class="btn btn-success">Submit</button>
</div>

<?php
}

}


if (isset($_POST["update"])) {
    $mat=$_POST["mat"];
    $fac=$_POST["fac"];
    $aant=$_POST["aant"];
    $prijs=$_POST["prijs"];
    $ide=$_POST["id"];
  
  
    if (empty($mat) || empty($fac)) {
        header("Location:registratie-bestedingen.php?error=emptyfields");
        exit();
    } else {
        $sql  = "UPDATE bestedingen SET Materialen=?,Aantal=?,Prijs=?,Factuurtype=? WHERE bID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:registratie-bestedingen.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sddsi", $mat, $aant, $prijs,$fac,$ide);
            mysqli_stmt_execute($stmt);
        }
        
        mysqli_stmt_close($stmt);
        
    }
  }

?>


<?php

if (isset($_POST["get-dienst"])) {
    $id=$_POST['id'];

    $sql="SELECT bestedingen.DienstenID, personen.Achternaam, personen.Voornaam, bestedingen.Factuurtype
    From bestedingen
    left join personen on bestedingen.DienstenID = personen.ID where bestedingen.DienstenID IS not null AND bID=$id";
    $res=mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)>0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $idd=$row["DienstenID"];
            $anaam=$row["Achternaam"];
            $vnaam=$row["Voornaam"];
            $fac=$row["Factuurtype"];
        } ?>
<form action="" method="" style="width:60vw; margin:0 auto">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pwd">Diensten:</label>
                <select class="selectpicker form-control" data-live-search="true" title="Kies uit diensten" id='session_pick'>
                    <?php
                             $sql = "SELECT * FROM personen ";
                             $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<option value='".$row['ID'] ."'>" . $row['Voornaam']." ". $row['Achternaam']."</option>";   
                            }
                     ?>
                </select>
                <script>$('#session_pick').selectpicker('val', '<?=$idd?>');</script>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pwd">Facatuur:</label>
                <select  class="form-control" id="facdienst">
                    <?php 
if($fac=='Verekenbaar'){
echo '<option value="Verekenbaar" selected>Verekenbaar</option>';
echo '<option value="Niet Verekenbaar">Niet Verekenbaar</option>';
} if($fac!=='Verekenbaar'){
    echo '<option value="Niet Verekenbaar" selected>Niet Verekenbaar</option>';
    echo '<option value="Verekenbaar">Verekenbaar</option>';
}

                ?>
                </select>
            </div>
        </div>

    </div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="" onclick=EditDienst(<?=$id?>) class="btn btn-success">Submit</button>
    </form>
</div>

<?php
    }
}
?>
<?php
 if (isset($_POST["get-bedrag"])) {
     $id=$_POST['id'];
    
     $sql="SELECT * FROM bestedingen WHERE bID = $id";
     $res=mysqli_query($conn, $sql);
     if (mysqli_num_rows($res)>0) {
         while ($row = mysqli_fetch_assoc($res)) {
             $prijs=$row["Prijs"];
         } 
         ?>
<form action="" method="" style="width:60vw; margin:0 auto">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            <label for="pwd">Prijs:</label>
            <input class="form-control" type="number" name='prijs' id='prijs1' placeholder='Prijs $' in="0"
                value="<?=$prijs?>" step="0.1">
            </div>
        </div>
    </div>
        </form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="" onclick=EditBedrag(<?=$id?>) class="btn btn-success">Submit</button>
</div>
<?php
     }
 }
 ?>



<?php

if (isset($_POST["update-dienst"])) {
    
    $fac=$_POST["fac"];
    $id=$_POST["id"];
    $pers=$_POST["pers"];
    

    $stmt= "UPDATE bestedingen SET DienstenID=$pers, Factuurtype='$fac' WHERE bID=$id";
     $query=mysqli_query($conn, $stmt);

  }
if (isset($_POST["update-bedrag"])) {
    
    $prijs=$_POST["prijs"];
    $id=$_POST["id"];
   
    

    $stmt= "UPDATE bestedingen SET Prijs=$prijs  WHERE bID=$id";
     $query=mysqli_query($conn, $stmt);

  }

  if(isset($_POST['Delete-Materialen'])){
    $id=  $_POST['id'];
 
    $sql = "DELETE FROM bestedingen WHERE bID=$id";
    mysqli_query($conn,$sql);
    echo 1;
    exit;
 }
 
  if(isset($_POST['Update-Bedrag'])){
    $id=  $_POST['id'];
    $nummer=$_POST['nummer'];
    $sql = "UPDATE bestedingen SET Prijs=$nummer  WHERE bID=$id";
    mysqli_query($conn,$sql);
    echo 1;
    exit;
 }
 

 ?>
 

