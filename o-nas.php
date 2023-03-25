
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("head.php"); ?>    
</head>
<body>
    <?php include ("top_menu.php"); ?>
    <?php include ("side_menu.php"); ?>
    <?php $pageData = pageData($con, 'about'); ?>
    <main class="main2">
        <section class="about">
            <p class="title">Nasza <span>przychodnia</span></p>
            <div>
                <img src="css/images/vet4.jpg">
                <img src="css/images/vet5.jpg">
                <img src="css/images/vet6.jpg">
                <img src="css/images/vet7.jpg">
            </div>
            <p class="title">Kila słów <span>o nas</span></p>
            <p class="about-info"><?php echo $pageData['content'];?></p>
        </section>
    </main>

    <?php include("footer.php"); ?>
    
</body>

<script src="scripts/jquery-3.6.0.min.js"></script>

</html>