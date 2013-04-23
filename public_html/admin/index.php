<?php require_once('../includes/initialize.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dobrodošli na portal za Grupnu kupovinu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../stylesheet/admin.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/msgBoxLight.css" />        
        <link rel="stylesheet" type="text/css" href="../stylesheet/jquery.dataTables.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/jquery-ui-1.10.2.custom.css" />        
        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.timer.js"></script>
        <script type="text/javascript" src="../js/jquery.msgBox.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script> 
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.2.custom.js"></script>

    </head>    
    
    <body>

        <div id="outerDiv" class="outerWrapper">
            <div id="header"><h1>Administracija portala</h1></div>
            <div id="sidebar">
                <ul>
                    <li class="menuCurrent">Početna</li>
                    <li>Korisnici</li>
                    <li>Moderatori</li>
                    <li>Prodavatelji</li>
                    <li>Kategorije</li>
                    <li>Ponude</li>
                    <li>Akcije</li>
                    <li>Sistemsko vrijeme</li>
                </ul>                                                                           
            </div>

            <div id="content">                
                <?php include('layout_pocetna.php'); ?>           
                <?php include('layout_korisnici.php'); ?>
                <?php include('layout_prodavatelji.php'); ?> 
                <?php include('layout_kategorije.php'); ?>           
                <?php include('layout_ponude.php'); ?> 

            </div> 
            <div class="clear"></div>        
        </div>
    </body>            
</html>
