<div class="dropboxLogin">
<div class="headerContent">
    <div class="dropboxLeft">
        Registracija
            <table>
                <tr>
                    <td><label for="inputIme">Ime</label></td>
                    <td><input type="text"      name="ime"      id="inputIme"       placeholder="Ime"/></td>
                </tr>
                <tr>
                    <td><label for="inputPrezime">Prezime</label></td>
                    <td><input type="text"      name="prezime"  id="inputPrezime"   placeholder="Prezime"/></td>
                </tr>
                <tr>
                    <td><label for="inputEmail">Email</label></td>
                    <td><input type="email"     name="email"    id="inputEmail"     placeholder="Email" onblur="checkEmailAvailability()"/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinka">Lozinka</label></td>
                    <td><input type="password"  name="lozinka"  id="inputLozinka"   placeholder="Lozinka"/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinka2">Potvrdi lozinku</label></td>
                    <td><input type="password"  name="lozinka2" id="inputLozinka2"  placeholder="Potvrdi lozinku"/></td>
                </tr>
                <tr>
                    <td><label for="uvjeti">Prihvati uvijete</label></td>
                    <td><input type="checkbox"  name="uvijeti"  id="uvjeti"/></td>
                </tr>
                <tr>
                    <td colspan="2"><button id="btnRegister" onclick="registerUser();" >Registriraj me</button></td>
                </tr>
            </table>        
        <div id="regStatus" class="warning hide"><span></span></div>
    </div>
    <div class="dropboxLeft">
        Prijava
            <table>
                <tr>
                    <td><label for="inputEmailP">Email</label></td>
                    <td><input type="email"     name="email"    id="inputEmailP"     placeholder="Email" value="kdomic@foi.hr"/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinkaP">Lozinka</label></td>
                    <td> <input type="password"  name="lozinka"  id="inputLozinkaP"   placeholder="Lozinka" value="admin"/></td>
                </tr>
                <tr>
                    <td colspan="2"><button id="btnLogin" onclick="loginUser();" >Prijava</button></td>
                </tr>
            </table>
            <div id="loginStatus" class="warning hide"><span></span></div>
    </div>
    <div class="dropboxLeft">
        Facebook & Google
    </div>
    <div class="clear"></div>
</div>
</div>

<div class="dropboxPurchases">
<div class="headerContent">
    <div class="dropboxTiles">
        <a href=""><img src="offers/ponuda_00002/01.jpg" alt="Ponuda"></a>
        <h1>14.08.2013. <i>za</i> 250,00 kn</h1>
    </div>
    <div class="dropboxTiles">
        <a href=""><img src="offers/ponuda_00002/01.jpg" alt="Ponuda"></a>
        <h1>14.08.2013. <i>za</i> 250,00 kn</h1>
    </div>
    <div class="dropboxTiles">
        <a href=""><img src="offers/ponuda_00002/01.jpg" alt="Ponuda"></a>
        <h1>14.08.2013. <i>za</i> 250,00 kn</h1>
    </div>
    <div class="dropboxTiles">
        <a href=""><img src="offers/ponuda_00002/01.jpg" alt="Ponuda"></a>
        <h1>14.08.2013. <i>za</i> 250,00 kn</h1>
    </div>
    <div class="dropboxTiles">
        <a href=""><img src="offers/ponuda_00002/01.jpg" alt="Ponuda"></a>
        <h1>14.08.2013. <i>za</i> 250,00 kn</h1>
    </div>
    <div class="clear"></div>
</div>
</div>

<div class="dropboxAccount">
<div class="headerContent">
    <div class="dropboxLeft">
            Osovne informacije   
            <table>
                <tr>
                    <td><label for="inputUserIdA">ID</label></td>
                    <td><input type="text"      name="id"      id="inputUserIdA"    readonly/></td>
                </tr>
                <tr>
                    <td><label for="inputImeA">Ime</label></td>
                    <td><input type="text"      name="ime"      id="inputImeA"      placeholder="Ime"/></td>
                </tr>
                <tr>
                    <td><label for="inputPrezimeA">Prezime</label></td>
                    <td><input type="text"      name="prezime"  id="inputPrezimeA"  placeholder="Prezime"/></td>
                </tr>
                <tr>
                    <td><label for="inputAdresaA">Adresa</label></td>
                    <td><input type="text"      name="adresa"  id="inputAdresaA"    placeholder="Prezime"/></td>                    
                </tr>
                <tr>
                    <td><label for="inputPbrA">Poštanski broj</label></td>
                    <td><input type="text"      name="pbr"  id="inputPbrA"          placeholder="Prezime"/></td>                    
                </tr>
                <tr>
                    <td><label for="inputMjestoA">Mjesto</label></td>
                    <td><input type="text"      name="mjesto"  id="inputMjestoA"    placeholder="Prezime"/></td>                    
                </tr>
                <tr>
                    <td><label for="inputTelefonA">Telefon</label></td>
                    <td><input type="text"      name="telefon"  id="inputTelefonA"  placeholder="Prezime"/></td>                    
                </tr>
                <tr>
                    <td><label for="inputOibA">OIB</label></td>
                    <td><input type="text"      name="oib"  id="inputOibA"          placeholder="Prezime"/></td>                    
                </tr>
                <tr>
                    <td colspan="2"><button id="btnUserInformation" onclick="userInformationChange();" >Pospremi</button></td>
                </tr>
            </table>        
        <div id="dropboxCol1Status" class="hide"><span></span></div>
    </div>
    <div class="dropboxLeft">
        Podaci za prijavu
            <table>
                <tr>
                    <td><label for="inputEmailA">Email</label></td>
                    <td><input type="email"     name="email"    id="inputEmailA" disabled/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinkaA">Lozinka</label></td>
                    <td> <input type="password"  name="lozinka"  id="inputLozinkaA"     placeholder="Lozinka"/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinkaA">Potvrdi lozinku</label></td>
                    <td> <input type="password"  name="lozinka2"  id="inputLozinka2A"   placeholder="Potvrdi lozinku"/><br/></td>
                </tr>
                <tr>
                    <td colspan="2"><button id="btnUserCredential" onclick="userCredentialChange();" >Pospremi</button></td>
                </tr>
            </table>
            <div id="dropboxCol2Status" class="hide"><span></span></div>
    </div>
    <div class="dropboxLeft">
        Obavjesti<br/><br/>
        <span id="infoCol">Nema obavjesti</span>
    </div>
    <div class="clear"></div>
</div>
</div>