<?php
    $errors=[];
    $vorname="";
    $nachname="";
    $username="";
    $email="";
    $passwort="";
    $confirmpasswort="";
    // wenn registieren Button ist geklickt, checkt ob alle inputs sind eingegben falls nicht gibt eine Fehlermeldung aus.
    if (isset($_POST["signup"])){
        $vorname = isset($_POST["vorname"])? $_POST["vorname"]:"";
        $nachname = isset($_POST["nachname"])? $_POST["nachname"]:"";
        $username = isset($_POST["username"])? $_POST["username"]:"";
        $email = isset($_POST["email"])? $_POST["email"]:"";
        $passwort = isset($_POST["passwort"])? $_POST["passwort"]:"";
        $confirmpasswort = isset($_POST["confirmpasswort"])? $_POST["confirmpasswort"]:"";
        if(empty($vorname)){
            $errors["vorname"]="Vorname wurde nicht eingegeben";
        }

        if(empty($nachname)){
            $errors["nachname"]="Nachname wurde nicht eingegeben";
        }

        if(empty($username)){
            $errors["username"]="Benutzername wurde nicht eingegeben";
        }

        if(empty($email)){
            $errors["email"]="Email wurde nicht eingegeben";
        }

        if(empty($passwort)){
            $errors["passwort"]="Passwort wurde nicht eingegeben";
        }
        if(empty($confirmpasswort)){
            $errors["confirmpasswort"]="Bestätigungpasswort wurde nicht eingegeben";
        }
        // checkt ob das bestätigungspasswort mit dem passwort übereinstimmt
        if($confirmpasswort != $passwort){
            $errors["identischkeit"]="passworten sind nicht identisch";
        }
    }
?>
<div class="sign-body">
<form method="post">
    <div class="sign-outter">
        <div class="sign-logo">
            <a href="?hotel">
                <img src="styles/fotos/Else/upper-belvedere-vienna.png"  alt="Logo" width="65px">
            </a>
            <p class="sign-logo-p" style="font-size: 30px;">Vienna Stars Hotel</p>
        </div>
        <div class="signup-and-home">
            <p>Registrieren</p>
        </div>
        <div class="sign-bar">
            <div>
                <?php
                    // gibt diese Fehlermeldung aus nur wenn die Email adresse in Datenbank vorhanden ist.
                    if($emailexist){
                        echo "<p class='error' style='text-align:center;'>Email ist ungültig oder existiert schon</p>";
                    }
                    else if ($emailexist == false && isset($_POST["signup"]) && empty($errors)){
                        echo "<p style='text-align:center; color:green;'>Sie haben erfolgreich regstiert</p>";
                    }
                ?>
            </div>
            <select class="sign-buttons" id="anrede" name="anrede" width="">
                <option value="M" selected >Herr.</option>
                <option value="F">Frau.</option>
            </select>
                <input type="text" id="vorname" name="vorname" placeholder="Vorname" value="">
                <?php
                    if(isset($errors['vorname'])){
                        echo "<p class='error' style='text-align:center;'>".$errors['vorname']."</p>";
                    }
                ?>
                <input type="text" id="nachname" name="nachname" placeholder="Nachname" value="">
                <?php
                    if(isset($errors['nachname'])){
                        echo "<p class='error' style='text-align:center;'>".$errors['nachname']."</p>";
                    }
                ?>
                <input type="text" id="username" name="username" value=""  placeholder="Benutzername">
                <?php
                    if(isset($errors['username'])){
                        echo "<p class='error' style='text-align:center;'>".$errors['username']."</p>";
                    }
                ?>
                <input type="email" id="email" name="email" value=""  placeholder="Email">
                <?php
                    if(isset($errors['email'])){
                        echo "<p class='error' style='text-align:center;'>".$errors['email']."</p>";
                    }
                ?>
                <input type="password" id="passwort" name="passwort" title="Muss mindestens eine Zahl und einen Groß- und Kleinbuchstaben sowie mindestens 8 oder mehr Zeichen enthalten" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="" placeholder="Passwort">
                <?php
                    if(isset($errors['passwort'])){
                        echo "<p class='error' style='text-align:center;'>".$errors['passwort']."</p>";
                    }
                ?>
                <input type="password" id="confirmpasswort"  title="Muss mindestens eine Zahl und einen Groß- und Kleinbuchstaben sowie mindestens 8 oder mehr Zeichen enthalten" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="confirmpasswort" value=""  placeholder="Passwort wiederholen">
                <?php
                    if(isset($errors['confirmpasswort'])){
                        echo "<p class='error' style='text-align:center;'>".$errors['confirmpasswort']."</p>";
                    }
                    if($passwort !== $confirmpasswort){
                        echo "<p class='error' style='font-weight:bold; text-align:center;'>".$errors['identischkeit']."</p>";
                    }
                ?>
            <div class="sign-buttons">
                <p>Haben Sie sich schon regestiert? <a href="?signin">Zur Anmeldung</a></p> 
                <div class="d-flex justify-content-between">
                    <button class="btn bg-dark text-white" type="submit" name="signup" id="Submit">Registrieren</button>
                    <a href="?hotel"><img src="styles/fotos/Else/house-solid.svg" alt="home" width="30px" title="Back to Home"></a> 
                </div>
            </div>  
        </div>
    </div>
</form>
</div>