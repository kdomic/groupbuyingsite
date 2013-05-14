<header>
    <div class="headerContent">                
        <div class="divHeaderLeft">
            <img src="images/logo.png" alt="Logo" />
            <nav>
                <select id="dropFilterCitys"> </select>
                <select id="dropFilterCategories"> </select>
                <select id="dropFilterNum">
                    <option class="selectDrop" value="10" selected>10</option>                    
                    <option class="selectDrop" value="15">15</option>
                    <option class="selectDrop" value="20">20</option>
                    <option class="selectDrop" value="50">50</option>                    
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