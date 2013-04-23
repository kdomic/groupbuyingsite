<div id="ponude">
	<div id="allOffers">
    	<button id="btnNewOffer">Dodaj novu ponudu</button>
        <div class="clear"></div> 
    	<table id="offersTable">
            <thead><tr>
                <th>ID</th><th>Kategorija</th><th>Naslov</th><th>Prodavatelj</th></thead>
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
                <td><label for="offerPRODAVATELJ">Odgovorna osoba</label></td>
                <td><input type="text"      name="offerPRODAVATELJ"      id="offerPRODAVATELJ"      placeholder=""/></td>
            </tr>
            <tr>
                <td><label for="offerKATEGORIJA">Kategorija</label></td>
                <td><input type="text"      name="offerKATEGORIJA"      id="offerKATEGORIJA"      placeholder=""/></td>
            </tr>
            <tr>
                <td><label for="offerNASLOV">Naslov</label></td>                
                <td><textarea name="offerNASLOV" id="offerNASLOV"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerPODNASLOV"></label>Podnaslov</td>
                <td><textarea name="offerPODNASLOV"      id="offerPODNASLOV"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerCIJENA">Cijena</label></td>
                <td><input type="text"      name="offerCIJENA"      id="offerCIJENA"      placeholder=""/></td>
            </tr>
            <tr>
                <td><label for="offerOPISNASLOV">Naslov opisa</label></td>
                <td><textarea name="offerOPISNASLOV"      id="offerOPISNASLOV"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerOPISKRATKI">Kratki opis</label></td>
                <td><textarea name="offerOPISKRATKI"      id="offerOPISKRATKI"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerOPIS">Opis</label></td>
                <td><textarea name="offerOPIS"      id="offerOPIS"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerNAPOMENA">Napomena</label></td>
                <td><textarea name="offerNAPOMENA"      id="offerNAPOMENA"></textarea></td>
            </tr>
            <tr>
                <td><label for="offerKARTAX">Karta X</label></td>
                <td><input type="text"      name="offerKARTAX"      id="offerKARTAX"      placeholder=""/></td>                
            </tr>
            <tr>
                <td><label for="offerKARTAY">Karta Y</label></td>
                <td><input type="text"      name="offerKARTAY"      id="offerKARTAY"      placeholder=""/></td>                
            </tr>
            <tr>
                <td><label for="offerAKTIVNA">Vidljivost</label></td>
                <td>
                    <input type="radio" name="vidljivost" value="1" id="offerAKTIVNA">Da
                    <input type="radio" name="vidljivost" value="0" >Ne
                </td>
            </tr> 
            <tr>
            <td colspan="2"><button id="btnSaveOffer" onclick="saveOffer();" >Pospremi</button></td>
            </tr>
        </table>
    </div>
</div>