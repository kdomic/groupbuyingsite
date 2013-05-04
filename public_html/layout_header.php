<header>
    <div class="headerContent">                
        <div class="divHeaderLeft">
            <img src="images/logo.png" alt="Logo" />
            <nav>
                <select id="dropFilterCitys"> </select>
                <select id="dropFilterCategories"> </select>
                <select id="dropFilterNum">
                    <option class="selectDrop" value="1" selected>1</option>                    
                    <option class="selectDrop" value="3">3</option>
                    <option class="selectDrop" value="5">5</option>
                    <option class="selectDrop" value="10">10</option>                    
                </select>
            </nav>      
        </div>
        <div class="divHeaderRight"> 
            <a onclick="showDropbox('Login');" id="btnShowDropboxLogin" class="">Prijava</a>
            <a onclick="showDropbox('Purchases');" id="btnShowDropboxPurchases" class="hide">Moje kupovine</a>
            <a onclick="showDropbox('Account');" id="btnShowDropboxAccount" class="hide">Moj račun</a>            
        </div>
    </div>
</header> 