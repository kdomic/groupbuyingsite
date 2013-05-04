<?php require_once('../includes/initialize.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administracija portala</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../stylesheet/admin.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/msgBoxLight.css" />        
        <link rel="stylesheet" type="text/css" href="../stylesheet/jquery.dataTables.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/jquery-ui-1.10.2.custom.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/jquery-te-1.3.5.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/uploadify.css" />        

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="../js/encoder.js"></script>            
        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.timer.js"></script>
        <script type="text/javascript" src="../js/jquery.msgBox.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script> 
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.2.custom.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.columnFilter.js"></script>
        <script type="text/javascript" src="../js/jquery-te-1.3.5.min.js"></script>
        <script type="text/javascript" src="../js/jquery.uploadify.min.js"></script>        
                
    </head>    
    
    <body>
        <header>
            <div class="headerLeft">Administracija portala</div>
            <div class="headerRight"><a href="../"><img src="../images/home.png" alt="Početna" /></a></div>
        </header>
        <nav>
            <ul>
                <li class="menuCurrent"><img src="../images/admin_pocetna.png" alt="Početna"/></li>
                <li><img src="../images/admin_korisnici.png" alt="Korisnici"/></li>
                <li><img src="../images/admin_moderatori.png" alt="Moderatori"/></li>
                <li><img src="../images/admin_prodavatelji.png" alt="Prodavatelji"/></li>
                <li><img src="../images/admin_kategorije.png" alt="Kategorije"/></li>
                <li><img src="../images/admin_gradovi.png" alt="Gradovi"/></li>                    
                <li><img src="../images/admin_ponude.png" alt="Ponude"/></li>
                <li><img src="../images/admin_akcije.png" alt="Akcije"/></li>
                <li><img src="../images/admin_prodaja.png" alt="Pregled prodaje"/></li>
                <li><img src="../images/admin_komentari.png" alt="Komentari"/></li>
                <li><img src="../images/admin_postavke.png" alt="Sistemsko vrijeme"/></li>                
            </ul>  
        </nav>

        <div class="clear"></div> 

        <div id="outerDiv">
            <div id="content">                
                <?php include('layout_pocetna.php'); ?>           
                <?php include('layout_korisnici.php'); ?>
                <?php include('layout_moderatori.php'); ?>                
                <?php include('layout_prodavatelji.php'); ?> 
                <?php include('layout_kategorije.php'); ?> 
                <?php include('layout_gradovi.php'); ?>                                     
                <?php include('layout_ponude.php'); ?> 
                <?php include('layout_akcije.php'); ?> 
                <?php include('layout_prodaja.php'); ?> 
                <?php include('layout_komentari.php'); ?> 
                <?php include('layout_vrijeme.php'); ?> 
            </div> 
            <div class="clear"></div>        
        </div>

    </body>            
</html>
