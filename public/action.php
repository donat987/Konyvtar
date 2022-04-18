<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
require('connection.php');
session_start();
$db_handle = new DBController();
switch ($_GET["action"]) {
    case "felhasznalomodositasa":
        if(!$_POST["inputname"]){
            echo"Kötelező a nevet megadni!";
            break;
        }
        if(!$_POST["inputdate"]){
            echo"Kötelező a születési dátum!";
            break;
        }
        if(!$_POST["inputstudent"]){
            echo"Kötelező a tanulmányi állapot!";
            break;
        }
        if(!$_POST["inputmobil"]){
            echo"Kötelező a mobil!";
            break;
        }
        if(!$_POST["inputemail"]){
            echo"Kötelező az email!";
            break;
        }
        if(!$_POST["inputmothername"]){
            echo"Kötelező az anyja neve!";
            break;
        }
        if(!$_POST["inputtown"]){
            echo"Kötelező a település megadása!";
            break;
        }
        if(!$_POST["inputpersonid"]){
            echo"Kötelező a személyi szám!";
            break;
        }
        if(!$_POST["inputstreet"]){
            echo"Kötelező az utca!";
            break;
        }
        if(!$_POST["inputhouseNumber"]){
            echo"Kötelező a házszám!";
            break;
        }
        if(!$_POST["inputtownid"]){
            echo"Kötelező az irányítószám!";
            break;
        }
        else{
            $inputname = $_POST["inputname"];
            $inputdate = $_POST["inputdate"];
            $inputstudent = $_POST["inputstudent"];
            $inputmobil = $_POST["inputmobil"];
            $inputemail = $_POST["inputemail"];
            $inputmothername = $_POST["inputmothername"];
            $inputpersonid = $_POST["inputpersonid"];
            $inputtown = $_POST["inputtown"];
            $inputstreet = $_POST["inputstreet"];
            $inputhouseNumber = $_POST["inputhouseNumber"];
            $inputtownid = $_POST["inputtownid"];
            $inputid = $_POST["inputid"];
            $productByid = $db_handle->addQuery("UPDATE `readers` SET `name` = '".$inputname."', `dateOfBirth` = '".$inputdate."', `mobilNumber` = '".$inputmobil."', `email` = '".$inputemail."', `townID` = '".$inputtownid."', `town` = '".$inputtown ."', `street` = '".$inputstreet."', `houseNumber` = '".$inputhouseNumber."', `motherName` = '".$inputmothername."', `student` = '".$inputstudent."', `personID` = '".$inputpersonid."', `updated_at` = NOW() WHERE `readers`.`id` = '".$inputid."';");
            echo"Sikeres módosítás!";
        }
        break;
    case "felhasznalofelvetel":
        if(!$_POST["inputname"]){
            echo"Kötelező a nevet megadni!";
            break;
        }
        if(!$_POST["inputdate"]){
            echo"Kötelező a születési dátum!";
            break;
        }
        if(!$_POST["inputstudent"]){
            echo"Kötelező a tanulmányi állapot!";
            break;
        }
        if(!$_POST["inputmobil"]){
            echo"Kötelező a mobil!";
            break;
        }
        if(!$_POST["inputemail"]){
            echo"Kötelező az email!";
            break;
        }
        if(!$_POST["inputmothername"]){
            echo"Kötelező az anyja neve!";
            break;
        }
        if(!$_POST["inputtown"]){
            echo"Kötelező a település megadása!";
            break;
        }
        if(!$_POST["inputpersonid"]){
            echo"Kötelező a személyi szám!";
            break;
        }
        if(!$_POST["inputstreet"]){
            echo"Kötelező az utca!";
            break;
        }
        if(!$_POST["inputhouseNumber"]){
            echo"Kötelező a házszám!";
            break;
        }
        if(!$_POST["inputtownid"]){
            echo"Kötelező az irányítószám!";
            break;
        }
        else{
            $inputname = $_POST["inputname"];
            $inputdate = $_POST["inputdate"];
            $inputstudent = $_POST["inputstudent"];
            $inputmobil = $_POST["inputmobil"];
            $inputemail = $_POST["inputemail"];
            $inputmothername = $_POST["inputmothername"];
            $inputpersonid = $_POST["inputpersonid"];
            $inputtown = $_POST["inputtown"];
            $inputstreet = $_POST["inputstreet"];
            $inputhouseNumber = $_POST["inputhouseNumber"];
            $inputtownid = $_POST["inputtownid"];
            $productByid = $db_handle->addQuery("INSERT INTO `readers` (`id`, `name`, `dateOfBirth`, `mobilNumber`, `email`, `townID`, `town`, `street`, `houseNumber`, `motherName`, `student`, `personID`, `created_at`, `updated_at`) VALUES (NULL, '".$inputname."', '".$inputdate."', '".$inputmobil."', '".$inputemail."', '".$inputtownid."', '".$inputtown."', '".$inputstreet."', '".$inputhouseNumber."', '".$inputmothername."', '".$inputstudent."', '".$inputpersonid."', NOW(), NOW())");
            echo "Sikeres hozzáadás";
            break;
        }
        case "konyvmodositasa":
            if(!$_POST["inputname"]){
                echo"Kötelező a címet megadni!";
                break;
            }
            if(!$_POST["inputdate"]){
                echo"Kötelező a megjelenés dátumát megadni!";
                break;
            }
            if(!$_POST["inputcategory"]){
                echo"Kötelező a kategória!";
                break;
            }
            if(!$_POST["inputlanguage"]){
                echo"Kötelező a könyv nyelvét megadni!";
                break;
            }
            if(!$_POST["inputszerzo"]){
                echo"Kötelező az szerzőt megadni!";
                break;
            }
            if(!$_POST["inputisbn"]){
                echo"Kötelező az ISBN-szám!";
                break;
            }
            if(!$_POST["inputkiado"]){
                echo"Kötelező a kiadó megadása!";
                break;
            }
            
            if(!$_POST["inputar"]){
                echo"Kötelező a könyv árát megadni!";
                break;
            }
            if(!$_POST["inputmennyiseg"]){
                echo"Kötelező a könyv mennyiségének megadása!";
                break;
            }
            
            else{
                $inputname=$_POST["inputname"];
                $inputdate=$_POST["inputdate"];
                $inputcategory=$_POST["inputcategory"];
                $inputlanguage=$_POST["inputlanguage"];
                $inputszerzo=$_POST["inputszerzo"];
                $inputisbn=$_POST["inputisbn"];
                $inputkiado=$_POST["inputkiado"];
                $inputfile=$_POST["inputcustomFile"];
                $inputar=$_POST["inputar"];
                $inputmennyiseg=$_POST["inputmennyiseg"];
                $inputid=$_POST["inputid"];
                $productByid = $db_handle->addQuery("UPDATE `books` SET `name` = '".$inputname."', `appearance` = '".$inputdate."', `ISBN` = '".$inputisbn."', `author` = '".$inputszerzo."', `stock` = '".$inputmennyiseg."', `publisher` = '".$inputkiado ."', `picture` = '".$inputfile."', `price` = '".$inputar."', `categoryID` = '".$inputcategory."', `languageID` = '".$inputlanguage."', `updated_at` = NOW() WHERE `books`.`id` = '".$inputid."';");
                echo"Sikeres módosítás!";
            }
            break;
        case "konyvfelvetel":
                if(!$_POST["inputname"]){
                    echo"Kötelező a címet megadni!";
                    break;
                }
                if(!$_POST["inputdate"]){
                    echo"Kötelező a megjelenés dátumát megadni!";
                    break;
                }
                if(!$_POST["inputcategory"]){
                    echo"Kötelező a kategória!";
                    break;
                }
                if(!$_POST["inputlanguage"]){
                    echo"Kötelező a könyv nyelvét megadni!";
                    break;
                }
                if(!$_POST["inputszerzo"]){
                    echo"Kötelező az szerzőt megadni!";
                    break;
                }
                if(!$_POST["inputisbn"]){
                    echo"Kötelező az ISBN-szám!";
                    break;
                }
                if(!$_POST["inputkiado"]){
                    echo"Kötelező a kiadó megadása!";
                    break;
                }
                
                if(!$_POST["inputar"]){
                    echo"Kötelező a könyv árát megadni!";
                    break;
                }
                if(!$_POST["inputmennyiseg"]){
                    echo"Kötelező a könyv mennyiségének megadása!";
                    break;
                }
                
                else{
                    $inputname=$_POST["inputname"];
                    $inputdate=$_POST["inputdate"];
                    $inputcategory=$_POST["inputcategory"];
                    $inputlanguage=$_POST["inputlanguage"];
                    $inputszerzo=$_POST["inputszerzo"];
                    $inputisbn=$_POST["inputisbn"];
                    $inputkiado=$_POST["inputkiado"];
                    $inputfile=$_POST["inputcustomFile"];
                    $inputar=$_POST["inputar"];
                    $inputmennyiseg=$_POST["inputmennyiseg"];
                    $inputid=$_POST["inputid"];
                    $productByid = $db_handle->addQuery("INSERT INTO `books` (`id`,`ISBN`,`name`,`author`,`stock`,`publisher`,`picture`,`price`,`categoryID`,`languageID`,`created_at`,`updated_at`) VALUES (NULL,'".$inputisbn."','".$inputname."','".$inputszerzo."','".$inputmennyiseg."','".$inputkiado."','".$inputfile."','".$inputar."','".$inputcategory."','".$inputlanguage."',NOW(),NOW())");
                    echo"Sikeres módosítás!";
                }
                break;
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
                else{
                    echo"Hibás felhasználónév vagy jelszó!";

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
