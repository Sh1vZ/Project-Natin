<?php
include "dbConn.php";

if (isset($_POST["get-gebruikers"])) {
    $id   = $_POST['id'];
    $stmt = "SELECT user.ID, user.Usernaam, user.Rollen, user.Telnummer, user.Email, user.Password
From user WHERE user.ID=$id";
    $res = mysqli_query($conn, $stmt);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $usernaam  = $row['Usernaam'];
            $rollen    = $row["Rollen"];
            $telnummer = $row["Telnummer"];
            $email     = $row["Email"];
            $password  = $row["Password"];
        }
        ?>

<div class="modal-body">
    <form action="./PHP/registratie-user.php" method="POST" id="form-admin" style="width:60vw; margin:0 auto">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Usernaam:</label>
                    <input type="text"  class="form-control" id="user-usernaam1" required
                        value="<?=$usernaam;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Rollen:</label>
                    <select class="selectpicker form-control" title="Kies Rollen" data-live-search="true"
                        name="user-rollen" id="rollen">
                        <option value="Beheerder">Beheerder</option>
                        <option value="Financieel">Financieel</option>
                        <option value="Administratie">Administratie</option>
                    </select>
                    <script>
                    $('#rollen').selectpicker('val', '<?=$rollen;?>');
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Tel.nummer:</label>
                    <input type="text"  class="form-control" id="user-telnummer1" required
                        value="<?=$telnummer;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="text"  class="form-control" id="user-email1" required
                        value="<?=$email;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="text"  class="form-control" id="user-password1" required
                        value="<?=$password;?>">
                </div>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" onclick=updateGebruikers(<?=$id;?>) name="submit" class="btn btn-success">Submit</button>
    </form>
</div>


<?php
}
}

if (isset($_POST["update-gebruikers"])) {
    $user      = $_POST["user"];
    $telnummer = $_POST["telnummer"];
    $email     = $_POST["email"];
    $rollen    = $_POST["rollen"];
    $password  = $_POST["password"];
    $id        = $_POST["id"];

    if (empty($user) || empty($telnummer) || empty($email) || empty($rollen)) {
        header("Location:../Gebruikers.php?error=emptyfields");
        exit();
    } else {
        $sql  = "UPDATE user SET Usernaam=?,Rollen=?,Telnummer=?,Email=?,`Password`=? WHERE ID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../Gebruikersnistratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssssi", $user, $rollen, $telnummer, $email, $password, $id);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

}

if(isset($_POST['Delete-Gebruiker'])){
    $id=  $_POST['id'];
    $sql = "DELETE FROM user WHERE ID=$id";
    mysqli_query($conn,$sql);
    echo 1;
    exit;
    echo 0;
    exit;
 }


?>