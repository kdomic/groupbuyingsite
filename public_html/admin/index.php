<?php require_once('../includes/initialize.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dobrodošli na portal za Grupnu kupovinu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../stylesheet/admin.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/jquery.dataTables.css" />
        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.timer.js"></script>
        <script type="text/javascript" src="../js/jquery.msgBox.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script> 
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    </head>    
    
    <body>

        <div id="outerDiv" class="outerWrapper">
            <div id="header"><h1>Administracija portala</h1></div>
            <div id="sidebar">
                <ul>
                    <li class="menuCurrent">Početna</li>
                    <li>Korisnici</li>
                    <li>Moderatori</li>
                    <li>Kategorije</li>
                    <li>Proizvodi</li>
                    <li>Akcije</li>
                    <li>Sistemsko vrijeme</li>
                </ul>                                            
            </div>
            <div id="content">
                
                <div id="pocetna"></div>
                <div id="korisnici"></div>
                <div id="moderatori"></div>
                <div id="kategorije"></div>
                <div id="proizvodi"></div>
                <div id="akcije"></div>
                <div id="vrijeme"></div>
                                            
            </div> 
            <div class="clear"></div>        
        </div>
    </body>            
</html>
