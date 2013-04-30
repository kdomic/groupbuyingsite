<div id="akcije">
    <h1>Akcije</h1>
    <div id="allActions">
        <button id="btnNewAction">Dodaj novu akciju</button>
        <div class="clear"></div> 
        <table id="actionsTables">
            <thead><tr><th>ID</th><th>Naziv</th><th>Početak</th><th>Kraj</th><th>Istaknut</th><th>Aktivan</th></tr></thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="singleAction">
        <table>
            <tr>
                <td><label for="actionID">ID</label></td>
                <td><input type="text"      name="id"      id="actionID"    readonly /></td>
            </tr>
            <tr>
                <td><label for="actionPONUDA">Ponuda</label></td>
                <td><select name="ponuda"      id="actionPONUDA"></select></td>
            </tr>                                        
            <tr>
                <td><label for="actionPOPUST">Popust</label></td>
                <td><input type="number"      name="popust"      id="actionPOPUST" min="0" max="100"/>%</td>
            </tr>
            <tr>
                <td><label for="actionPOCETAKdate">Početak</label></td>
                <td>
                    <input type="date"      name="pocetakDate" id="actionPOCETAKdate"/>
                    <input type="time"      name="pocetakTime" id="actionPOCETAKtime"/>                    
                </td>
            </tr>
            <tr>
                <td><label for="actionZAVRSETAKdate">Završetak</label></td>
                <td>
                    <input type="date"      name="zavrsetakDate" id="actionZAVRSETAKdate"/>
                    <input type="time"      name="zavrsetakTime" id="actionZAVRSETAKtime"/>                    
                </td>
            </tr>
            <tr>
                <td><label for="actionGRANICA">Granica</label></td>
                <td><input type="number"      name="limit"      id="actionGRANICA" min="0"/></td>
            </tr>
            <tr>
                <td><label for="actionISTAKNUTO">Istaknuto</label></td>
                <td>
                    <input type="radio" name="istaknuto" value="1" id="actionISTAKNUTO">Da
                    <input type="radio" name="istaknuto" value="0" >Ne
                </td>
            </tr>
            <tr>
                <td><label for="actionAKTIVNA">Vidljivost</label></td>
                <td>
                    <input type="radio" name="vidljivost" value="1" id="actionAKTIVNA">Da
                    <input type="radio" name="vidljivost" value="0" >Ne
                </td>
            </tr>                                                        
            <tr>
            <td colspan="2"><button id="btnSaveAction">Pospremi</button></td>
            </tr>                            
        </table>
        <div id="actionUpdateStatus" class=""><span></span></div>                
    </div>
</div>