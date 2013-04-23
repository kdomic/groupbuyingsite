<?php require_once('../includes/initialize.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dobrodošli na portal za Grupnu kupovinu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../stylesheet/admin.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheet/msgBoxLight.css" />        
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
                <div id="korisnici">
                    <div id="allUsers">
                        <table id="userTable">
                            <thead><tr>
                                <th>ID</th><th>Ime i prezime</th><th>Email</th>
                                <th>Zamrznut do</th><th>B</th><th>D</th><th>O</th>
                             </tr></thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div id="singleUser">
                        <table>
                            <tr>
                                <td><label for="userID">ID</label></td>
                                <td><input type="text"      name="id"      id="userID"    readonly /></td>
                            </tr>                            
                            <tr>
                                <td><label for="userIME">Ime</label></td>
                                <td><input type="text"      name="ime"      id="userIME"      placeholder="Ime"/></td>
                            </tr>
                            <tr>
                                <td><label for="userPREZIME">Prezime</label></td>
                                <td><input type="text"      name="prezime"  id="userPREZIME"  placeholder="Prezime"/></td>
                            </tr>                            
                            <tr>
                                <td><label for="userADRESA">Adresa</label></td>
                                <td><input type="text"      name="adresa"   id="userADRESA"    placeholder="Prezime"/></td>                    
                            </tr>
                            <tr>
                                <td><label for="userPBR">Poštanski broj</label></td>
                                <td><input type="text"      name="pbr"      id="userPBR"          placeholder="Prezime"/></td>                    
                            </tr>
                            <tr>
                                <td><label for="userMJESTO">Mjesto</label></td>
                                <td><input type="text"      name="mjesto"   id="userMJESTO"    placeholder="Prezime"/></td>                    
                            </tr>
                            <tr>
                                <td><label for="userTELEFON">Telefon</label></td>
                                <td><input type="text"      name="telefon"  id="userTELEFON"  placeholder="Prezime"/></td>                    
                            </tr>
                            <tr>
                                <td><label for="userEMAIL">Email</label></td>
                                <td><input type="email"     name="email"    id="userEMAIL"     placeholder="Email" onblur="checkEmailAvailability()" /></td>
                            </tr>
                            <tr>
                                <td><label for="userOIB">OIB</label></td>
                                <td><input type="text"      name="oib"      id="userOIB"          placeholder="Prezime"/></td>                    
                            </tr>
                            <tr>
                                <td><label for="userOPENID">OpenID</label></td>
                                <td><input type="text"      name="openId"   id="userOPENID"    readonly /></td>
                            </tr>
                            <tr>
                                <td><label for="userOPOMENA">Opomena</label></td>
                                <td><input type="text"      name="opomena"  id="userOPOMENA"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userDEAKTIVIRAN">Deaktiviran</label></td>
                                <td><input type="text"      name="deaktiviran" id="userDEAKTIVIRAN"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userZAMRZNUT">Zamrznut</label></td>
                                <td><input type="text"      name="zamrznut" id="userZAMRZNUT"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userBLOKIRAN">Blokiran</label></td>
                                <td><input type="text"      name="blokiran" id="userBLOKIRAN"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userDATUM">Datum registracije</label></td>
                                <td><input type="text"      name="datum"    id="userDATUM"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userPOTVRDA">Email potvrda</label></td>
                                <td><input type="text"      name="potvrda"  id="userPOTVRDA"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userLOZINKA">Lozinka</label></td>
                                <td> <input type="password"  name="lozinka" id="userLOZINKA"     placeholder="Lozinka"/><br/></td>
                            </tr>                          
                            <tr>
                                <td><label for="userOvlasti">Ovlasti</label></td>
                                <td><input type="text"      name="ovlasti"  id="userOvlasti"    placeholder="" /></td>
                            </tr>
                            <tr>
                                <td><label for="userOBRISATI">Obrisati</label></td>
                                <td><input type="text"      name="obrisati" id="userOBRISATI"    placeholder="" /></td>
                            </tr>
                            <tr>
                            <td colspan="2"><button id="btnSaveUser" onclick="saveUser();" >Pospremi</button></td>
                            </tr>
                        </table>
                        <div id="userUpdateStatus" class=""><span></span></div>                       
                    </div>
                </div>
                <div id="kategorije">
                    <div id="allCategories">
                        <button id="btnNewCategory">Dodaj novu kategoriju</button>
                        <div class="clear"></div> 
                        <table id="categoriesTable">
                            <thead><tr><th>ID</th><th>Naziv</th><th>Aktivna</th></tr></thead>
                            <tbody id="categoriesTableContent"></tbody>
                        </table>
                    </div>
                    <div id="singleCategory">
                        <table>
                            <tr>
                                <td><label for="categoryID">ID</label></td>
                                <td><input type="text"      name="id"      id="categoryID"    readonly /></td>
                            </tr>                            
                            <tr>
                                <td><label for="categoryNAZIV">Naziv</label></td>
                                <td><input type="text"      name="naziv"      id="categoryNAZIV"      placeholder="Naziv kategortije"/></td>
                            </tr>
                            <tr>
                                <td><label for="categoryAKTIVNA">Vidljivost</label></td>
                                <td>
                                    <input type="radio" name="vidljivost" value="1" >Da
                                    <input type="radio" name="vidljivost" value="0" >Ne
                                </td>
                            </tr>                                                        
                            <tr>
                            <td colspan="2"><button id="btnSaveUser" onclick="saveCategory();" >Pospremi</button></td>
                            </tr>                            
                        </table>
                    </div>
                </div>
                <div id="proizvodi"></div>
                <div id="akcije"></div>
                <div id="vrijeme"></div>                                        
            </div> 
            <div class="clear"></div>        
        </div>
    </body>            
</html>
