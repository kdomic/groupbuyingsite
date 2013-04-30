<div id="korisnici">    
    <div id="allUsers">
        <h1>Korisnici</h1>
        <button id="btnNewUser">Dodaj novog korisnika</button>        
        <table id="userTable">
            <thead><tr>
                <th>ID</th><th>Ime i prezime</th><th>Email</th>
                <th>Zamrznut do</th><th>D</th><th>Ovlasti</th><th>A</th>
             </tr></thead>
            <tbody></tbody>
        </table>
        <p class="legend"><br>
            <b>D</b>eaktiviran - u slučaju 3 opomena | <b>O</b>pomene - broj izrečenih opomena | <b>A</b>ktivan - (da)aktivan, (ne)blokiran
        </p>
    </div>
    <div id="singleUser">
        <div class="leftHalf">
            <h1>Uređivanje korisnika</h1>
            <table>
                <tr>
                    <td><label for="userID">ID</label></td>
                    <td><input type="text"      name="id"      id="userID"          readonly /></td>
                </tr>                            
                <tr>
                    <td><label for="userIME">Ime</label></td>
                    <td><input type="text"      name="ime"      id="userIME"        placeholder="Ime"/></td>
                </tr>
                <tr>
                    <td><label for="userPREZIME">Prezime</label></td>
                    <td><input type="text"      name="prezime"  id="userPREZIME"    placeholder="Prezime"/></td>
                </tr>                            
                <tr>
                    <td><label for="userADRESA">Adresa</label></td>
                    <td><input type="text"      name="adresa"   id="userADRESA"     placeholder="Adresa"/></td>                    
                </tr>
                <tr>
                    <td><label for="userPBR">Poštanski broj</label></td>
                    <td><input type="text"      name="pbr"      id="userPBR"        placeholder="Poštanski broj"/></td>                    
                </tr>
                <tr>
                    <td><label for="userMJESTO">Mjesto</label></td>
                    <td><input type="text"      name="mjesto"   id="userMJESTO"     placeholder="Mjesto"/></td>                    
                </tr>
                <tr>
                    <td><label for="userTELEFON">Telefon</label></td>
                    <td><input type="text"      name="telefon"  id="userTELEFON"    placeholder="Telefon"/></td>                    
                </tr>
                <tr>
                    <td><label for="userEMAIL">Email</label></td>
                    <td><input type="email"     name="email"    id="userEMAIL"      placeholder="Email" /></td>
                </tr>
                <tr>
                    <td><label for="userOIB">OIB</label></td>
                    <td><input type="text"      name="oib"      id="userOIB"        placeholder="11 znamenki"/></td>                    
                </tr>
                <tr>
                    <td><label for="userOPENID">OpenID</label></td>
                    <td>
                        <select name="openId"   id="userOPENID"     disabled>
                            <option value="0">Ne</option>
                            <option value="1">Facebook</option>
                            <option value="2">Google</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="userDEAKTIVIRAN">Deaktiviran</label></td>
                    <td>
                        <input type="radio" name="deaktiviran" value="1" id="userDEAKTIVIRAN">Da
                        <input type="radio" name="deaktiviran" value="0" >Ne
                    </td>
                </tr>
                <tr>
                    <td><label for="userZAMRZNUTdate">Zamrznut</label></td>
                    <td>
                        <input type="date"      name="zamrznutDate" id="userZAMRZNUTdate"/>
                        <input type="time"      name="zamrznutTime" id="userZAMRZNUTtime"/>                    
                    </td>
                </tr>
                <tr>
                    <td><label for="userDATUM">Datum registracije</label></td>
                    <td><input type="text"      name="datum"    id="userDATUM"      readonly placeholder="Popunjava sustav"/></td>
                </tr>
                <tr>
                    <td><label for="userPOTVRDA">Email potvrda</label></td>
                    <td>
                        <select name="potvrda"  id="userPOTVRDA">
                            <option value="0">Aktiviran</option>
                            <option>Nije aktiviran</option> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="userLOZINKA">Lozinka</label></td>
                    <td> <input type="password"  name="lozinka" id="userLOZINKA"    placeholder="Lozinka"/><br/></td>
                </tr>                          
                <tr>
                    <td><label for="userOVLASTI">Ovlasti</label></td>
                    <td>
                        <select name="ovlasti"  id="userOVLASTI">
                            <option value="1">Korisnik</option>
                            <option value="2">Moderator</option> 
                            <option value="3">Administrator</option>                                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="userAKTIVNA">Vidljivost</label></td>
                    <td>
                        <input type="radio" name="vidljivost" value="1" id="userAKTIVNA">Da
                        <input type="radio" name="vidljivost" value="0" >Ne
                    </td>
                </tr>
                <tr>
                <td colspan="2"><button id="btnSaveUser" >Pospremi</button></td>
                </tr>
            </table>
            <div id="userUpdateStatus" class=""><span></span></div> 
        </div>
        <div class="leftHalf" id="userWarnHalf">
            <h1>Opomene</h1>
            <table id="userWarn">
                <thead><tr> <th>ID</th><th>Opomena</th><th>Datum</th> </tr></thead>
                <tbody></tbody>
            </table>
            <textarea id="userWarnNew"></textarea><br>
            <button id="btnUserWarnNew">Postavi opomenu</button>
            <div id="userWarnStatus" class=""><span></span></div> 
        </div>
        <div class="clear"></div>
        <br><br>
        <div id="userPurHistory">
            <h1>Povijest kupovina</h1>
            <table id="userPurchases">
                <thead><tr>
                    <th>ID akcije</th><th>Naziv ponude</th><th>Datum</th><th>Cijena</th></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>