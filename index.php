<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("head.php"); ?>    
</head>
<body>
    <?php 
    include ("top_menu.php"); ?>
    <?php include ("side_menu.php"); ?>
    <main>
        <article class="welcome">
            <div>
                
                <p>Gabinet Weterynaryjny</p>
                <p>lek. wet. <span>Jan Kowalski</span></p>
                <img src="css/images/logo_wet.png">
                <div class="welcome-in">
                    <p>Zaprasza</p>
                    <p>Pełną listę usług znajdziesz w zakładce "Usługi".<br />
                    Przyjdź, umów wizytę osobiście lub telefonicznie.</p><br />
                    <a href="kontakt">Kontakt</a>
                </div>
            </div>
            <div class="welcome-photos">
                <div class="thumbnails"></div>
                <div class="thumbnails second"></div>
                <div class="thumbnails third"></div>
                <div class="thumbnails fourth"></div>
            </div>
        </article>
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <img class="dog-bg" src="css/images/doggo.png">    
    </main>


</body>
<?php include("footer.php"); ?>
</html>