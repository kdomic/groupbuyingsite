<div id="korisnici">
    <div id="allUsers">
        <button id="btnNewUser">Dodaj novog korisnika</button>        
        <table id="userTable">
            <thead><tr>
                <th>ID</th><th>Ime i prezime</th><th>Email</th>
                <th>Zamrznut do</th><th>B</th><th>D</th><th>O</th><th>Ovlasti</th><th>A</th>
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
        <br><br>
        <div id="userPurHistory">
            <p>Povijest kupovina</p>
            <table id="userPurchases">
                <thead><tr>
                    <th>ID akcije</th><th>Naziv ponude</th><th>Datum</th><th>Cijena</th></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>