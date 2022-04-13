<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

session_start();
switch ($_GET["action"]) {
    case "bejelentkezes":
        if(!$_POST["username"]){
            echo"Kötelező a felhasználónév!";
            break;
        }
        if(!$_POST["password"]){
            echo"Kötelező a jelszó!";
            break;
        }
        else{
            echo"Sikeres bejelentkézes";
            ?>
            <script>
                window.location.assign("/konyvkolcsonzes");
            </script>
            <?php
        }
        break;
    case "kijelentkezes":
        session_destroy();
        header('Location: /');
        break;
}
?>
