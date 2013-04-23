<div id="prodavatelji">
    <div id="allSellers">
    	<button id="btnNewSeller">Dodaj novog prodavatelja</button>
        <div class="clear"></div> 
    	<table id="sellersTable">
            <thead><tr>
                <th>ID</th><th>Ime</th><th>Odgovorna osoba</th><th>OIB</th><th>Akrtivan</th></tr></thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="singleSeller">    	
    	<table>
            <tr>
                <td><label for="sellerID">ID</label></td>
                <td><input type="text"      name="id"      id="sellerID"    readonly /></td>
            </tr>                            
            <tr>
                <td><label for="sellerKORISNIK">Odgovorna osoba</label></td>
                <td><input type="text"      name="ime"      id="sellerKORISNIK"      placeholder="Odgovorna osoba"/></td>
            </tr>
            <tr>
                <td><label for="sellerNAZIV">Naziv</label></td>
                <td><input type="text"      name="prezime"  id="sellerNAZIV"  placeholder="Naziv"/></td>
            </tr>                            
            <tr>
                <td><label for="sellerADRESA">Adresa</label></td>
                <td><input type="text"      name="adresa"   id="sellerADRESA"    placeholder="Adresa"/></td>                    
            </tr>
            <tr>
                <td><label for="sellerKONTAKT">Kontakt</label></td>
                <td><input type="text"      name="pbr"      id="sellerKONTAKT"          placeholder="Kontakt"/></td>                    
            </tr>
            <tr>
                <td><label for="sellerINFO">Info</label></td>
                <td><input type="text"      name="mjesto"   id="sellerINFO"    placeholder="Info"/></td>                    
            </tr>
            <tr>
                <td><label for="sellerOIB">OIB</label></td>
                <td><input type="text"      name="telefon"  id="sellerOIB"  placeholder="OIB"/></td>                    
            </tr>
            <tr>
                <td><label for="sellerAKTIVAN">Vidljivost</label></td>
                <td>
                    <input type="radio" name="vidljivost" value="1" id="sellerAKTIVAN">Da
                    <input type="radio" name="vidljivost" value="0" >Ne
                </td>
            </tr> 
            <tr>
            <td colspan="2"><button id="btnSaveSeller" onclick="saveSeller();" >Pospremi</button></td>
            </tr>
        </table>
    </div>                    
</div>