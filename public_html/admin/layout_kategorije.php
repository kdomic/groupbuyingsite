<div id="kategorije">
    <h1>Kategorije</h1>
    <div id="allCategories">
        <button id="btnNewCategory">Dodaj novu kategoriju</button>
        <div class="clear"></div> 
        <table id="categoriesTable">
            <thead><tr><th>ID</th><th>Naziv</th><th>Aktivna</th></tr></thead>
            <tbody></tbody>
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
                    <input type="radio" name="vidljivost" value="1" id="categoryAKTIVNA">Da
                    <input type="radio" name="vidljivost" value="0" >Ne
                </td>
            </tr>                                                        
            <tr>
            <td colspan="2"><button id="btnSaveCategory" >Pospremi</button></td>
            </tr>                            
        </table>
    </div>
</div>