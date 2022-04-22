<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

require('connection.php');
session_start();
$db_handle = new DBController();
switch ($_GET["action"]) {
    case "kivesz":
            print_r($_POST);
        break;
    case "kolcsonkonyv":
        $idk = explode("/",$_POST["konyvvalaszt"]);
        $konyv = $db_handle->runQuery("SELECT picture, isbn, publisher, author, languages.language as nyelv, books.name as konyvnev, appearance, categories.category as kateg  from books inner join languages on books.languageID = languages.id inner join categories on books.categoryID = categories.id where books.id = '" . $idk[0] . "'");
        ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="inputname">Cím</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Cím" value='<?php echo $konyv[0]['konyvnev']; ?>'  readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputdate">Megjelenés</label>
                        <input type="date" class="form-control" id="inputdate"
                            value='<?php echo $konyv[0]['appearance']; ?>' readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputcategory">Kategoria</label>
                        <input type="text" class="form-control" id="inputdate"
                            value='<?php echo $konyv[0]['kateg']; ?>' readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputlanguage">Nyelv</label>
                        <input type="text" class="form-control" id="inputdate"
                            value='<?php echo $konyv[0]['nyelv']; ?>' readonly>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputszerzo">Szerő</label>
                        <input type="text" class="form-control" id="inputszerzo" placeholder="Szerző"
                        value='<?php echo $konyv[0]['author']; ?>' readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputkiado">Kiadó</label>
                        <input type="text" class="form-control" id="inputkiado" placeholder="Kiadó neve"
                        value='<?php echo $konyv[0]['publisher']; ?>' readonly>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="inputisbn">ISBN</label>
                        <input type="text" class="form-control" id="inputisbn" placeholder="ISBN"
                        value='<?php echo $konyv[0]['isbn']; ?>' readonly>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-2">
                <img src='/images/<?php echo $konyv[0]['picture']; ?>'>
            </div>
        </div>
        <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=kivesz">
            <input type="hidden" name="olvasoid" id="olvasoid" value="<?php echo $idk[0] ?>">
            <input type="hidden"  id="konyvid" value="<?php echo $idk[1] ?>">
            <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Kivesz</button>
        </form>
        <?php
        break;
    case "kolcsonnev":
        $olvaso = $db_handle->runQuery("SELECT * from readers where id = '" . $_POST["nevvalaszt"] . "'");
?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputname">Név</label>
                <input type="name" class="form-control" id="inputname" placeholder="Név" value='<?php echo $olvaso[0]['name']; ?>' readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputdate">Születési dátum</label>
                <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum" value='<?php echo $olvaso[0]['dateOfBirth']; ?>' readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputemail">Diák</label>
                <?php
                if ($olvaso[0]['student'] == 0) {
                    echo "<input type='text' class='form-control' id='inputdate' placeholder='Diak' value='igen' readonly>";
                } else {
                    echo "<input type='text' class='form-control' id='inputdate' placeholder='Diak' value='nem' readonly>";
                }
                ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputmobil">Telefonszám</label>
                <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum" value='<?php echo $olvaso[0]['mobilNumber']; ?>' readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="inputemail">Email</label>
                <input type="email" class="form-control" id="inputemail" placeholder="Emailcím" value="<?php echo $olvaso[0]['email']; ?>" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputmothername">Anyja neve</label>
                <input type="text" class="form-control" id="inputmothername" placeholder="Anyja neve" value="<?php echo $olvaso[0]['motherName']; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputpersonid">Személyigazolvány szám</label>
                <input type="text" class="form-control" id="inputpersonid" placeholder="Személyigazolvány szám" value="<?php echo $olvaso[0]['personID']; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputtown">Település</label>
                <input type="text" class="form-control" id="inputtown" placeholder="Település" value="<?php echo $olvaso[0]['townID']; ?>" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputstreet">Utca</label>
                <input type="text" class="form-control" id="inputstreet" placeholder="Utca" value="<?php echo $olvaso[0]['street']; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputhouseNumber">Házszám / emelet / ajtó</label>
                <input type="text" class="form-control" id="inputhouseNumber" placeholder="Házszám / emelet / ajtó" value="<?php echo $olvaso[0]['houseNumber']; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputtownid">Irányítószám</label>
                <input type="text" class="form-control" id="inputtownid" placeholder="Irányítószám" value="<?php echo $olvaso[0]['townID']; ?>" readonly>
            </div>
        </div>
        <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=kolcsonkonyv">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputregistration">Kölcsönző neve:</label>
                    <select id="konyvvalaszt" class="form-select" aria-label="Default select example" name='redersid' onchange='fun()'>
                        <option selected>Open this select menu</option>
                        <?php
                        $konyv = $db_handle->runQuery('select * from books');
                        $temp = 0;
                        foreach ($konyv as $o) {
                            $temp++;
                            echo "<option value='" . $o["id"] . "/".$olvaso[0]['id']."'>" . $o["name"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>
        <div id="konyvdat"></div>
        <script>
            function fun() {
                event.preventDefault();
                var a = {
                    konyvvalaszt: $('#konyvvalaszt').val()
                };
                $.ajax({
                    url: "/action.php?action=kolcsonkonyv",
                    data: {
                        konyvvalaszt: a.konyvvalaszt
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data != "") {
                            $('#konyvdat').html(data);
                        }
                    }
                });
            }
        </script>
        <?php

        break;
    case "bejelentkezes":
        if (!$_POST["username"]) {
            echo "Kötelező a felhasználónév!";
            break;
        }
        if (!$_POST["password"]) {
            echo "Kötelező a jelszó!";
            break;
        } else {
            $felh = $_POST["username"];
            $jelszo = $_POST["password"];
            $productByid = $db_handle->runQuery("SELECT name, username, password FROM users where username = '" . $felh . "'");
            if (isset($productByid)) {
                $itemArray = array('name' => $productByid[0]["name"], 'username' => $productByid[0]["username"], 'password' => $productByid[0]["password"]);
                if (MD5($jelszo) == $productByid[0]["password"]) {
                    $_SESSION["name"] = $productByid[0]["name"];
                    echo "Sikeres bejelentkézes";
        ?>
                    <script>
                        window.location.assign("/konyvkolcsonzes");
                    </script>
<?php
                } else {
                    echo "Hibás felhasználónév vagy jelszó!";
                }
            } else {
                echo "Hibás felhasználónév vagy jelszó!";
            }
        }
        break;
    case "kijelentkezes":
        session_destroy();
        header('Location: /');
        break;
}
?>
