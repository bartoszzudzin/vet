<?php

session_start();

include("../scripts/connection.php");
include("../scripts/functions.php");

$user_data = check_login($con);
$pdata = pageData($con, 'week');

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
                <h1>Tutaj zaktualizujesz godziny dyżurów przychodni.</h1>
                <p>Od poniedziałku do niedzieli. (<span style="color:red">Jeśli któryś dzień chcesz określić jako "zamknięty" - wstaw same zera</span>)</p>
                <div class="column">
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=monday_open&cd=monday_close">
                        <label>Poniedziałek:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['monday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['monday_close']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=tuesday_open&cd=tuesday_close">
                        <label>Wtorek:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['tuesday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['tuesday_close']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=wednesday_open&cd=wednesday_close">
                        <label>Środa:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['wednesday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['wednesday_close']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=thursday_open&cd=thursday_close">
                        <label>Czwartek:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['thursday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['thursday_close']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=friday_open&cd=friday_close">
                        <label>Piątek:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['friday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['friday_close']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=saturday_open&cd=saturday_close">
                        <label>Sobota:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['saturday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['saturday_close']; ?>">
                        <input class="submit2" type="submit" value="Zapisz">
                    </form>
                    <form class="update-data" method="post" action="../scripts/hours_edit.php?od=sunday_open&cd=sunday_close">
                        <label>Niedziela:</label>
                        <p> od </p>
                        <input class="data hour" type="time" name="open-time" value="<?php echo $pdata['sunday_open']; ?>">
                        <p> do </p>
                        <input class="data hour" type="time" name="close-time" value="<?php echo $pdata['sunday_close']; ?>">
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
