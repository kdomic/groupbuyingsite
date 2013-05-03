<div id="ponude">
    <h1>Ponude</h1>
	<div id="allOffers">
    	<button id="btnNewOffer">Dodaj novu ponudu</button>
        <div class="clear"></div> 
    	<table id="offersTable">
            <thead><tr>
                <th>ID</th><th>Kategorija</th><th>Naslov</th><th>Prodavatelj</th><th>Vidljivo</th></thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="singleOffer">
         	
    	<table>
            <tr>
                <td><label for="offerID">ID</label></td>
                <td><input type="text"      name="id"      id="offerID"    readonly /></td>
            </tr>                            
            <tr>
                <td><label for="offerPRODAVATELJ">Prodavatelj</label></td>
                <td><select name="offerPRODAVATELJ"      id="offerPRODAVATELJ" ></select></td>
            </tr>
            <tr>
                <td><label for="offerKATEGORIJA">Kategorija</label></td>
                <td><select name="offerKATEGORIJA"      id="offerKATEGORIJA"></select></td>
            </tr>
            <tr>
                <td><label for="offerNASLOV">Naslov</label></td>                
                <td>                    
                    <textarea name="offerNASLOV"        id="offerNASLOV" class="jqte-test"></textarea>                    
                </td>
            </tr>
            <tr>
                <td><label for="offerPODNASLOV"></label>Podnaslov</td>
                <td><textarea name="offerPODNASLOV"      id="offerPODNASLOV" class="jqte-test"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerCIJENA">Cijena</label></td>
                <td><input type="text"      name="offerCIJENA"      id="offerCIJENA"      placeholder=""/></td>
            </tr>
            <tr>
                <td><label for="offerOPISNASLOV">Naslov opisa</label></td>
                <td><textarea name="offerOPISNASLOV"      id="offerOPISNASLOV" class="jqte-test"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerOPISKRATKI">Kratki opis</label></td>
                <td><textarea name="offerOPISKRATKI"      id="offerOPISKRATKI" class="jqte-test"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerOPIS">Opis</label></td>
                <td><textarea name="offerOPIS"      id="offerOPIS" class="jqte-test"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerNAPOMENA">Napomena</label></td>
                <td><textarea name="offerNAPOMENA"      id="offerNAPOMENA" class="jqte-test"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerKARTAX">Karta X</label></td>
                <td><input type="text"      name="offerKARTAX"      id="offerKARTAX"      disabled/></td>                
            </tr>
            <tr>
                <td><label for="offerKARTAY">Karta Y</label></td>
                <td><input type="text"      name="offerKARTAY"      id="offerKARTAY"      disabled/></td>                
            </tr>
            <tr>
                <td><label for="offerAKTIVNA">Vidljivost</label></td>
                <td>
                    <input type="radio" name="vidljivost" value="1" id="offerAKTIVNA">Da
                    <input type="radio" name="vidljivost" value="0" >Ne
                </td>
            </tr> 
            <tr>
            <td colspan="2"><button id="btnSaveOffer" >Pospremi</button></td>
            </tr>
        </table>
        <div class="clear"></div>          
        <div id="offerUpdateStatus" class=""><span></span></div>
        <div class="clear"></div>
        <div id="map"></div>                
    </div>
</div>
