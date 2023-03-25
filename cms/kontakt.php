<?php

session_start();

include("../scripts/connection.php");
include("../scripts/functions.php");

$user_data = check_login($con);
$pdata = pageData($con, 'contact');

if(!isset($_SESSION['id']) || $user_data['acces'] != '1'){
    echo "Błąd uprawnień";
    header("Location: ../index");
    die;
}else if(isset($_SESSION['id']) && $user_data['acces'] === '1'){

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("cms-head.php"); ?>    
</head>
<body>
    <main class="login-page">
        <p class="cms-title">Panel <span>administracyjny</span></p>
        <p class="cms-date"><?php echo date("d.m.Y"); ?><span><?php echo date("H:i"); ?></span></p>
        <section class="cms-front-page">
            <?php include ("cms-menu.php"); ?>
            <div class="display">
                <h1>Tutaj zmienisz dane kontaktowe swojego gabinetu.</h1>
                <p>Między innymi numer telefonu i adres.</p>
                <div class="column">
                    <form class="update-data" method="post" action="../scripts/data_edit.php?table=contact&post=phone&url=kontakt">
                        <label>Numer telefonu:</label>
                        <input class="data" type="tel" name="phone" value="<?php echo $pdata['phone']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/data_edit.php?table=contact&post=city&url=kontakt">
                        <label>Miejscowość:</label>
                        <input class="data" type="text" name="city" value="<?php echo $pdata['city']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/data_edit.php?table=contact&post=postcode&url=kontakt">
                        <label>Kod pocztowy:</label>
                        <input class="data" type="text" name="postcode" value="<?php echo $pdata['postcode']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/data_edit.php?table=contact&post=street&url=kontakt">
                        <label>Ulica</label>
                        <input class="data" type="text" name="street" value="<?php echo $pdata['street']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script type="text/javascript" src="../scripts/dashboard.js"></script>
</body>
</html>

<?php

}