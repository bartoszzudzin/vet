
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("head.php"); ?>    
</head>
<body>
    <?php include ("top_menu.php"); ?>
    <?php include ("side_menu.php"); ?>
    <?php

    $week = pageData($con, 'week');
    $data = pageData($con, 'contact');

    ?>
    <main class="main3">
        <section class="contact-page">
            <p class="title">Kontakt z naszym <span>gabinetem</span></p>
            <div class="contact">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=83-262 Czarna Woda, ul Polna 30/B&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
                <div class="hours">
                    <p class="h-title"><i class="fa-regular fa-clock"></i><span> Godziny otwarcia:</span></p>
                    <p class="day">
                    Poniedziałek: 
                    <span>
                    <?php 
                        if($week['monday_open'] == '00:00:00' && $week['monday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['monday_open'],0,5)."-".substr($week['monday_close'],0,5);
                        }?>
                    </span></p>
                    <p class="day">
                    Wtorek: 
                    <span>
                    <?php 
                        if($week['tuesday_open'] == '00:00:00' && $week['tuesday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['tuesday_open'],0,5)."-".substr($week['tuesday_close'],0,5);
                        }?>
                    </span></p>
                    <p class="day">
                    Środa: 
                    <span>
                    <?php 
                        if($week['wednesday_open'] == '00:00:00' && $week['wednesday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['wednesday_open'],0,5)."-".substr($week['wednesday_close'],0,5);
                        }?>
                    </span></p>
                    <p class="day">
                    Czwartek: 
                    <span>
                    <?php 
                        if($week['thursday_open'] == '00:00:00' && $week['thursday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['thursday_open'],0,5)."-".substr($week['thursday_close'],0,5);
                        }?>
                    </span></p>
                    <p class="day">
                    Piątek: 
                    <span>
                    <?php 
                        if($week['friday_open'] == '00:00:00' && $week['friday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['friday_open'],0,5)."-".substr($week['friday_close'],0,5);
                        }?>
                    </span></p>
                    <p class="day">
                    Sobota: 
                    <span>
                    <?php 
                        if($week['saturday_open'] == '00:00:00' && $week['saturday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['saturday_open'],0,5)."-".substr($week['saturday_close'],0,5);
                        }?>
                    </span></p>
                    <p class="day">
                    Niedziela: 
                    <span>
                    <?php 
                        if($week['sunday_open'] == '00:00:00' && $week['sunday_close'] == '00:00:00'){
                            echo "<span style='color:red'>Zamknięte</span>";
                        }else{
                            echo substr($week['sunday_open'],0,5)."-".substr($week['sunday_close'],0,5);
                        }?>
                    </span></p>
                </div>
                <div class="adress">
                    <p><i class="fa-solid fa-circle-info"></i><span>Nasz adres:</span></p>
                    <p class="cntct"><span> <?php echo $data['postcode']." ".$data['city'];?>,</p>
                    <p class="cntct"><span> <?php echo $data['street']; ?></p>
                    <p class="cntct"><span>tel.: <a class="hyperlink" href="tel:<?php echo $data['phone'];?>">
                    <?php echo substr($data['phone'],0,3)." ".substr($data['phone'],3,3)." ".substr($data['phone'],6,3)." ".substr($data['phone'],9,3); ?></span></p><br />
                    <a class="hyperlink1" href="https://www.google.pl/maps/dir//Polna+30b,+83-262+Czarna+Woda/@53.4901106,17.5073314,9z/data=!4m9!4m8!1m0!1m5!1m1!1s0x470261fb2ef5ce27:0xf3ce552804de12ca!2m2!1d18.1081433!2d53.8399836!3e0">Pokaż trasę</a>
                </div>
            </div>
        <section>
        <img class="dog-bg second" src="css/images/doggo.png">

        <!-- DODAĆ GODZINY OTWARCIA -->
    </main>

    <?php include("footer.php"); ?>
    
</body>

<script src="scripts/jquery-3.6.0.min.js"></script>

</html>