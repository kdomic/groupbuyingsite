<div id="moderatori">    
    <br><br><hr><br> 
    <h1>Moderatori</h1>   
    <select id="modSelectUser" onchange="showCatDropSelectOptions();">            
    </select>
    <select id="modeSelectCat"> 
        <option>Prvo odaberi korisnika</option>       
    </select>        
    <button id="btnNewMod" onclick="saveMod();" disabled >Dodaj ovlasti</button>        
    <table id="modTables">
        <thead><tr>
            <th>ID</th><th>Ime i prezime</th><th>Kategorija</th><th>Ukloni</th></thead>
        <tbody></tbody>
    </table> 
    <div class="clear"></div>
    <div id="modUpdateStatus" class=""><span></span></div>  
</div>

