<?php

include("scripts/connection.php");
include("scripts/functions.php");

$data = pageData($con, 'contact');

?>
<header>
    <a href="cms/login"><img class="logo" src="css/images/logo_wet2.png"></a>
    <menu class="top-menu">
        <a href="index">Strona główna</a>
        <a href="o-nas">O nas</a>
        <a href="nasza-oferta">Usługi</a>
        <a href="blog">Blog</a>
        <a href="kontakt">Kontakt</a>
    </menu>
    <section class="phone-number">
        <div><i class="fa-solid fa-square-phone"></i><a href="tel:<?php echo $data['phone']; ?>">
            <?php echo substr($data['phone'],0,3)." ".substr($data['phone'],3,3)." ".substr($data['phone'],6,3)." ".substr($data['phone'],9,3); ?></a></div>
        <i id="menuBtn" class="fa-solid fa-bars"></i>
    </section>
</header>