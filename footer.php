<?php

$data = pageData($con, 'contact');

?>

<footer>
        <div>
            <div class="foot1">
                <img src="css/images/logo_wet2_light.png">
                <p><i class="fa-regular fa-map"></i><?php echo $data['postcode']." ".$data['city'];?>,</p>
                <p><i class="fa-regular fa-map invisible"></i> <?php echo $data['street'];?></p>
                <p><i class="fa-solid fa-phone"></i> <a class="hyperlink2" href="tel:<?php echo $data['phone']; ?>">
                <?php echo substr($data['phone'],0,3)." ".substr($data['phone'],3,3)." ".substr($data['phone'],6,3)." ".substr($data['phone'],9,3); ?></a></p>
                <p><i class="fa-regular fa-clock"></i> Pon - Pt 16:00-18:00</p>
            </div>
            <div class="foot2">
                <p>Menu</p>
                <a href="index">Strona główna</a>
                <a href="o-nas">O nas</a>
                <a href="nasza-oferta">Usługi</a>
                <a href="aktualnosci">Aktualności</a>
                <a href="kontakt">Kontakt</a>
            </div>
            <div class="foot3">
                <div>
                <p>Oferta</p>
                    <a href="nasza-oferta">Leczenie internistyczne</a>
                    <a href="nasza-oferta">Chirurgia miękka</a>
                    <a href="nasza-oferta">Biochemia laboratoryjna</a>
                    <a href="nasza-oferta">Wystawianie paszportów</a>
                    <a href="nasza-oferta">USG</a>
                </div>
                <div>
                    <a href="nasza-oferta">Tlenoterapia</a>
                    <a href="nasza-oferta">Stomatologia</a>
                    <a href="nasza-oferta">Profilaktyka</a>
                </div>
            </div>
        </div>
</footer>
<script type="text/javascript" src="scripts/main.js"></script>