var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
var originalEmail;
var userSelectType;

/* === LAYOUTS === */

function hideAll(){
    $('#pocetna').hide();
    $('#korisnici').hide();
    $('#prodavatelji').hide();    
    $('#kategorije').hide();
    $('#ponude').hide();
    $('#akcije').hide();
    $('#vrijeme').hide();
}

function layout_showKorisnici(){
    hideAll();    
    userSelectType = 1;
    initUserTable(1);    
    $('#singleUser').hide();
    $('#allUsers').show();
    $('#korisnici').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[1]).addClass('menuCurrent');
}

function layout_showModeratori(){
    hideAll();    
    userSelectType = 2;    
    initUserTable(2);
    $('#singleUser').hide();
    $('#allUsers').show();
    $('#korisnici').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[2]).addClass('menuCurrent');    
}

function layout_showProdavatelji(){
    hideAll();
    $('#prodavatelji').show();
    $('#singleSeller').hide();
    $('#allSellers').show();
    initSellersTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[3]).addClass('menuCurrent');
}

function layout_showKategorije(){
    hideAll();
    $('#kategorije').show();
    $('#allCategories').show();
    $('#singleCategory').hide();    
    initCategoriesTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[4]).addClass('menuCurrent');
}

function layout_showPonude(){
    hideAll();
    $('#ponude').show();
    $('#allOffers').show();
    $('#singleOffer').hide();    
    initOffersTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[5]).addClass('menuCurrent');    
}

/* === ONLOAD === */
$(document).ready(function(){
    //!!!! PROVJERA OVLASTI - get_allusers.php
	hideAll();

    //EVENTS
    $($('#sidebar li')[0]).click(function(){});
    $($('#sidebar li')[1]).click(function(){layout_showKorisnici();});
    $($('#sidebar li')[2]).click(function(){layout_showModeratori();});
    $($('#sidebar li')[3]).click(function(){layout_showProdavatelji();});
    $($('#sidebar li')[4]).click(function(){layout_showKategorije();});    
    $($('#sidebar li')[5]).click(function(){layout_showPonude();});
    $($('#sidebar li')[6]).click(function(){});

    $('#btnNewCategory').click(function(){newCategory();});
    $('#btnNewSeller').click(function(){newSeller();});
    $('#btnNewOffer').click(function(){newOffer();});

    //ONCLICK na gumbovima za snimanje fome treba prebaciti ovdje!

});

/* === USER EDIT === */

function initUserTable(protocol) { 
    var dataTable = $('#userTable').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(protocol);
    var xml = sendToPhp(protocolData,'../get_allusers.php');
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            dataTable.fnAddData([user[0],user[1],user[2],user[3],user[4],user[5],user[6]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editUser(dataTable.fnGetData(this)[0])});
}

function editUser(num){    
    $('#userUpdateStatus').slideUp("fast");    
    $('#allUsers').hide();
    $('#singleUser').show();
    var userData = getUserData(num);
    var userInput = $('#singleUser td input');
    for(var i=0; i<userData.length; i++)
        $($(userInput)[i]).val(userData[i]);
    originalEmail = $('#userEMAIL').val();
}

function saveUser(){
    var userInput = $('#singleUser td input');
    var userData = getUserData($($(userInput)[0]).val());
    for(var i=1; i<userData.length; i++)
        userData[i] = $($(userInput)[i]).val();
    var xml = setUserData(userData);
    var status = $(xml).find('status').text();
    if(status==='1'){
        $('#userUpdateStatus').html("Zapis pohranjen").addClass("success").removeClass("error").slideDown("slow");
        setTimeout(function(){
            $('#singleUser').hide();
            $('#allUsers').show();
            initUserTable(userSelectType);
        }, 1000);
    } else {
        $('#userUpdateStatus').html("Greška prilikom pohrane").addClass("error").removeClass("success").slideDown("slow");
    }
}

function checkEmailAvailability() {
    if(originalEmail == $('#userEMAIL').val())return;
    var dataString = new Array('','',$('#userEMAIL').val(),'','','');
    var xml = sendToPhp(dataString,"../includes/register.php");
    var status = $(xml).find('status').text();
    if(status==='1')
        $('#userUpdateStatus').html("Email zauzet!").addClass("error").removeClass("success").slideDown("slow");
    else
        $('#userUpdateStatus').html("").removeClass("error").slideUp("slow");
}

/* === CATEGORIES === */

function initCategoriesTable() { 
    var dataTable = $('#categoriesTable').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_kategorije.php');
    var cats = $(xml).find('kategorije');
    var cat = new Array();
    $(cats).each(function(){    
        $(this).children().each(function(){
            cat = []; 
            $(this).children().each(function(){
                cat.push($(this).text());
            });
            dataTable.fnAddData([cat[0],cat[1],cat[2]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editCategory(dataTable.fnGetData(this)[0])});
}

function newCategory(){
    $('#allCategories').hide();
    $('#singleCategory').show();
    $('#singleCategory input:text').val('');
    $($('#singleCategory input')[0]).val('Nova kategorija');
    $('#singleCategory input:radio[name=vidljivost]').prop('checked', false);
    $('#singleCategory input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editCategory(num){
    var data = new Array('2',num);
    var xml = sendToPhp(data,'../getSet_kategorije.php');
    var catData = new Array();
    var user = $(xml).find('kategorija');
    $(user).children().each(function(){catData.push($(this).text())});
    $('#categoryID').val(catData[0]);
    $('#categoryNAZIV').val(catData[1]);
    if(catData[2]=="Da")
        $('#singleCategory input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleCategory input:radio[name=vidljivost][value="0"]').prop('checked', true);

    $('#allCategories').hide();
    $('#singleCategory').show();
}

function saveCategory(){
    var data = new Array();
    if($($('#singleCategory input')[0]).val()=="Nova kategorija"){
        data.push(3);        
        data.push(-1);
    } else {
        data.push(4);        
        data.push($($('#singleCategory input')[0]).val());
    }
    data.push($($('#singleCategory input')[1]).val());
    data.push($('input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_kategorije.php');
    layout_showKategorije();
}

/* === SELLERS === */

function initSellersTable(){
    var dataTable = $('#sellersTable').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_prodavatelji.php');
    var dataSet = $(xml).find('prodavatelji');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([data[0],data[2],data[1],data[6],data[7]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editSeller(dataTable.fnGetData(this)[0])}); 
}

function newSeller(){
    userDropSelectForSeller();
    $('#allSellers').hide();
    $('#singleSeller').show();
    $('#singleSeller input:text').val('');
    $($('#singleSeller input')[0]).val('Novi unos');
    $('#singleSeller input:radio[name=vidljivost]').prop('checked', false);
    $('#singleSeller input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editSeller(num){
    userDropSelect("sellerKORISNIK");
    var protocolData = new Array('2',num);
    var xml = sendToPhp(protocolData,'../getSet_prodavatelji.php');
    var data = new Array();
    var parsedXML = $(xml).find('prodavatelj');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    for(var i =0; i<data.length; i++){
        $($('#singleSeller input:text')[i]).val(data[i]);
    }
    if(data[data.length-1]=="Da")
        $('#singleSeller input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleSeller input:radio[name=vidljivost][value="0"]').prop('checked', true);

    var user = getUserData($("#sellerKORISNIK").val());
    $("#sellerKORISNIK").val(user[1]+' '+user[2]);
    $('#singleSeller').show();
    $('#allSellers').hide();
}

function saveSeller(){
    var data = new Array();
    if($($('#singleSeller input')[0]).val()=="Novi unos"){
        data.push(3);
        data.push(-1);
    } else {
        data.push(4);        
        data.push($($('#singleSeller input')[0]).val());
    }
    $('#singleSeller input:text').each(function(){
        data.push($(this).val())
    });
    data.push($('#singleSeller input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_prodavatelji.php');
    layout_showProdavatelji();
}

/* === OFFERS === */

function initOffersTable(){
    var dataTable = $('#offersTable').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_ponude.php');
    var dataSet = $(xml).find('ponude');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([data[0],data[2],data[3],data[1],data[data.length-1]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editOffer(dataTable.fnGetData(this)[0])}); 
}

function newOffer(){
    prodavateljiDropSelectOptions('offerPRODAVATELJ');
    categoryDropSelectOptions('offerKATEGORIJA');
    $('#allOffers').hide();
    $('#singleOffer').show();
    $('#singleOffer input:text').val('');
    $('#singleOffer textarea').val('');
    $($('#singleOffer input')[0]).val('Novi unos');
    $('#singleOffer input:radio[name=vidljivost]').prop('checked', false);
    $('#singleOffer input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editOffer(num){
    prodavateljiDropSelectOptions('offerPRODAVATELJ');
    categoryDropSelectOptions('offerKATEGORIJA');
    var protocolData = new Array('2',num);
    var xml = sendToPhp(protocolData,'../getSet_ponude.php');
    var data = new Array();
    var parsedXML = $(xml).find('ponuda');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    $('#offerID').val(data[0]);
    $('#offerPRODAVATELJ').val(data[1]);
    $('#offerKATEGORIJA').val(data[2]);
    $('#offerNASLOV').val(data[3]);
    $('#offerPODNASLOV').val(data[4]);
    $('#offerCIJENA').val(data[5]);
    $('#offerOPISNASLOV').val(data[6]);
    $('#offerOPISKRATKI').val(data[7]);
    $('#offerOPIS').val(data[8]);
    $('#offerNAPOMENA').val(data[9]);
    $('#offerKARTAX').val(data[10]);
    $('#offerKARTAY').val(data[11]);
    $('#offerPRODAVATELJ option').eq(2).attr('selected', 'selected');    
    $('#offerKATEGORIJA option').eq(3).attr('selected', 'selected');
    if(data[data.length-1]=="1")
        $('#singleOffer input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleOffer input:radio[name=vidljivost][value="0"]').prop('checked', true);

    $('#singleOffer').show();
    $('#allOffers').hide();
}

function saveOffer(){
    var data = new Array();
    if($($('#singleOffer input')[0]).val()=="Novi unos"){
        data.push(3);
        data.push(-1);
    } else {
        data.push(4);        
        data.push($($('#singleOffer input')[0]).val());
    }

    data.push($('#offerPRODAVATELJ').val());  
    data.push($('#offerKATEGORIJA').val());
    data.push($('#offerNASLOV').val());
    data.push($('#offerPODNASLOV').val());
    data.push($('#offerCIJENA').val());
    data.push($('#offerOPISNASLOV').val());
    data.push($('#offerOPISKRATKI').val());
    data.push($('#offerOPIS').val());
    data.push($('#offerNAPOMENA').val());
    data.push($('#offerKARTAX').val());
    data.push($('#offerKARTAY').val());
    data.push($('#singleOffer input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_ponude.php');
    layout_showPonude();
}


/*
function initCategoriesTable(){ }

function newCategory(){ }

function editCategory(num){ }

function saveCategory(){ }

*/

/* === USER DROP SELECT */

function userDropSelect(field){
    var availableTags = new Array();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../get_allusers.php');
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            availableTags.push(user[1]);
        });
    });
    $(function(){$("#"+field).autocomplete({source: availableTags});});
}

function prodavateljiDropSelectOptions(field){
    $('#'+field+" option").remove();    
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_prodavatelji.php');
    var dataSet = $(xml).find('prodavatelji');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            $('#'+field).append("<option value="+data[0]+">"+data[2]+"</option>");
        });
    });
}

function categoryDropSelectOptions(field){
    $('#'+field+" option").remove();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_kategorije.php');
    var cats = $(xml).find('kategorije');
    var data = new Array();
    $(cats).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            $('#'+field).append("<option value="+data[0]+">"+data[1]+"</option>");
        });
    });
}

/* === AJAX status SEND/R === */
function sendToPhp(dataString,url){
    var jsonString = JSON.stringify(dataString);
    var data;
    $.ajax({
         type: "POST",
         url: url,
         data: {data : jsonString}, 
         cache: false,
         async:false,
         success: function(xml){
             data = xml;
         }
     });
     return data;
}

/* === SESSION and USER DATA === */
function sessionCheck() {
    var data = new Array();
    data.push('2');
    var xml = sendToPhp(data,"../includes/session.php");
    var status = $(xml).find('status').text();
    return parseInt(status);
}

function getUserData(id){
    var data = new Array();
    data.push(id);
    var xml = sendToPhp(data,"../get_userdata.php");
    var status = $(xml).find('status').text();
    //if(status==='0') error(); !!!!!!!!!!!!!!!!!!!!!! - i u PHP (get set)
    var userData = new Array();
    var user = $(xml).find('korisnik');
    $(user).children().each(function(){userData.push($(this).text())});
    return userData;
}

function setUserData(data){
    var xml = sendToPhp(data,"../set_userdata.php");
    return xml;
}

/* === Message Box=== */

function msgBoxShow(title, content, type) {
    $.msgBox({
        title: title,
        content: content,
        type: type,
        showButtons: false,
        opacity: 0.9,
        autoClose:true
    });
}

/* === OTHER ===*/

function goTop(){
    window.scrollTo(0,0);
}

function leadZero(str) {
    return str.length < 5 ? leadZero("0" + str) : str;
}

function error() {
    document.location.reload(true);
}

function htmlEncodeEntities(s){
        return $("<div/>").text(s).html();
}

function htmlDencodeEntities(s){
    return $("<div/>").html(s).text();
}

function CheckOIB(oib) { //http://v2009.dizzy.hr/oib/
    oib = oib.toString();
    if (oib.length != 11) return false;
    var b = parseInt(oib, 10);
    if (isNaN(b)) return false;
    var a = 10;
    for (var i = 0; i < 10; i++) {
    a = a + parseInt(oib.substr(i, 1), 10);
    a = a % 10;
    if (a == 0) a = 10;
    a *= 2;
    a = a % 11;
    }
    var kontrolni = 11 - a;
    if (kontrolni == 10) kontrolni = 0;
    return kontrolni == parseInt(oib.substr(10, 1));
}