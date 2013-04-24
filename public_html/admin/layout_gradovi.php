<div id="gradovi">
    <div id="allCitys">
        <button id="btnNewCategory">Dodaj novu kategoriju</button>
        <div class="clear"></div> 
        <table id="categoriesTable">
            <thead><tr><th>ID</th><th>Naziv</th></tr></thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="singleCity">
        <table>
            <tr>
                <td><label for="cityID">ID</label></td>
                <td><input type="text"      name="id"      id="cityID"    readonly /></td>
            </tr>                            
            <tr>
                <td><label for="cityNAZIV">Naziv</label></td>
                <td><input type="text"      name="naziv"      id="cityNAZIV"      placeholder="Naziv"/></td>
            </tr>
            <tr>
                <td><label for="cityAKTIVNA">Vidljivost</label></td>
                <td>
                    <input type="radio" name="vidljivost" value="1" id="cityAKTIVNA">Da
                    <input type="radio" name="vidljivost" value="0" >Ne
                </td>
            </tr>                                                        
            <tr>
            <td colspan="2"><button id="btnSaveCity" onclick="saveCity();" >Pospremi</button></td>
            </tr>                            
        </table>
    </div>
</div>