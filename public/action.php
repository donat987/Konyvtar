<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
require('connection.php');
session_start();
$db_handle = new DBController();
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
            $felh = $_POST["username"];
            $jelszo = $_POST["password"];
            $productByid = $db_handle->runQuery("SELECT name, username, password FROM users where username = '" . $felh . "'");
            if(isset($productByid)){
                $itemArray = array('name' => $productByid[0]["name"], 'username' => $productByid[0]["username"], 'password' => $productByid[0]["password"]);
                if (MD5($jelszo) == $productByid[0]["password"] ) {
                    $_SESSION["name"] = $productByid[0]["name"];
                    echo"Sikeres bejelentkézes";
                    ?>
                    <script>
                    window.location.assign("/konyvkolcsonzes");
                    </script>
                    <?php
                }
            }
            else{
                echo"Hibás felhasználónév vagy jelszó!";
            }
        }
        break;
    case "kijelentkezes":
        session_destroy();
        header('Location: /');
        break;
}
?>
