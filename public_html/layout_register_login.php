<div class="dropbox">
<div class="headerContent">
    <div class="dropboxLeft">
        Registracija
            <table>
                <tr>
                    <td><label for="inputIme">Ime</label></td>
                    <td><input type="text"      name="ime"      id="inputIme"       placeholder="Ime"/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputPrezime">Prezime</label></td>
                    <td><input type="text"      name="prezime"  id="inputPrezime"   placeholder="Prezime"/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputEmail">Email</label></td>
                    <td><input type="email"     name="email"    id="inputEmail"     placeholder="Email" onblur="checkEmailAvailability()"/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinka">Lozinka</label></td>
                    <td><input type="password"  name="lozinka"  id="inputLozinka"   placeholder="Lozinka"/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinka2">Potvrdi lozinku</label></td>
                    <td><input type="password"  name="lozinka2" id="inputLozinka2"  placeholder="Lozinka 2"/><br/></td>
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
                    <td><input type="email"     name="email"    id="inputEmailP"     placeholder="Email"/><br/></td>
                </tr>
                <tr>
                    <td><label for="inputLozinkaP">Lozinka</label></td>
                    <td> <input type="password"  name="lozinka"  id="inputLozinkaP"   placeholder="Lozinka"/><br/></td>
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