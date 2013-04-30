var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
var originalEmail;
var userSelectType; //ova nam je da se znamo vratiti poslje pohrane korisnika ili moderatora

/* === ONLOAD === */

$(document).ready(function(){
    //!!!! PROVJERA OVLASTI - getSet_korisnici.php
    hideAll();
    layout_showPocetna();
    //EVENTS
    $($('nav li')[0]).click(function(){layout_showPocetna();});
    $($('nav li')[1]).click(function(){layout_showKorisnici();});
    $($('nav li')[2]).click(function(){layout_showModeratori();});
    $($('nav li')[3]).click(function(){layout_showProdavatelji();});
    $($('nav li')[4]).click(function(){layout_showKategorije();}); 
    $($('nav li')[5]).click(function(){layout_showGradovi();});       
    $($('nav li')[6]).click(function(){layout_showPonude();});
    $($('nav li')[7]).click(function(){layout_showAkcije();});
    $($('nav li')[8]).click(function(){layout_showProdaja();});
    $($('nav li')[9]).click(function(){layout_showKomentari();});
    $($('nav li')[10]).click(function(){layout_showVrijeme();});

    $('#btnNewUser').click(function(){newUser();});
    $('#btnUserWarnNew').click(function(){saveWarn();});
    $('#btnNewMod').click(function(){saveMod();});    
    $('#btnNewSeller').click(function(){newSeller();});
    $('#btnNewCategory').click(function(){newCategory();});
    $('#btnNewCity').click(function(){newCity();});
    $('#btnNewOffer').click(function(){newOffer();});
    $('#btnNewAction').click(function(){newAction();});

    $('#btnSaveUser').click(function(){saveUser();});     
    $('#btnSaveSeller').click(function(){saveSeller();});        
    $('#btnSaveCategory').click(function(){saveCategory();});    
    $('#btnSaveCity').click(function(){saveCity();});
    $('#btnSaveOffer').click(function(){saveOffer();});
    $('#btnSaveAction').click(function(){saveAction();});
    $('#btnSaveTime').click(function(){saveTime();});

    $('#userEMAIL').blur(function(){checkEmailAvailability('userEMAIL')});
    $('#modSelectUser').change(function(){showCatDropSelectOptions()});

});

/* === LAYOUTS === */

function hideAll(){
    $('#pocetna').hide();
    $('#korisnici').hide();
    $('#moderatori').hide();    
    $('#prodavatelji').hide();    
    $('#kategorije').hide();
    $('#gradovi').hide();    
    $('#ponude').hide();
    $('#akcije').hide();
    $('#vrijeme').hide();
    $('#prodaja').hide();
    $('#komentari').hide();
}

function layout_showPocetna(){
    hideAll();
    $('#pocetna').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[0]).addClass('menuCurrent');
}

function layout_showKorisnici(){
    hideAll();    
    userSelectType = 1;
    initUserTable(1);    
    $('#singleUser').hide();
    $('#allUsers').show();
    $('#korisnici').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[1]).addClass('menuCurrent');
}

function layout_showModeratori(){
    hideAll();    
    userSelectType = 2;    
    initUserTable(2);
    modsDropSelectOptions('modSelectUser');
    initModsTable();
    $('#singleUser').hide();
    $('#allUsers').show();
    $('#korisnici').show();
    $('#moderatori').show();    
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[2]).addClass('menuCurrent');    
}

function layout_showProdavatelji(){
    hideAll();
    $('#prodavatelji').show();
    $('#singleSeller').hide();
    $('#allSellers').show();
    initSellersTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[3]).addClass('menuCurrent');
}

function layout_showKategorije(){
    hideAll();
    $('#kategorije').show();
    $('#allCategories').show();
    $('#singleCategory').hide();    
    initCategoriesTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[4]).addClass('menuCurrent');
}

function layout_showGradovi(){
    hideAll();
    $('#gradovi').show();
    $('#allCitys').show();
    $('#singleCity').hide();    
    initCitysTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[5]).addClass('menuCurrent');    
}

function layout_showPonude(){
    hideAll();
    $('#ponude').show();
    $('#allOffers').show();
    $('#singleOffer').hide();    
    initOffersTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[6]).addClass('menuCurrent');    
}

function layout_showAkcije(){
    hideAll();
    $('#akcije').show();
    $('#allActions').show();
    $('#singleAction').hide();    
    initActionsTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[7]).addClass('menuCurrent');    
}

function layout_showProdaja(){
    hideAll();
    initSalesTable();
    $('#prodaja').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[8]).addClass('menuCurrent');    
}

function layout_showKomentari(){
    hideAll();
    initCommentsTable();
    $('#komentari').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[9]).addClass('menuCurrent');    
}

function layout_showVrijeme(){
    hideAll();
    initTimeTable();
    $('#vrijeme').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('nav li')[10]).addClass('menuCurrent');    
}

/* === USER EDIT === */

function initUserTable(protocol) {   
    var dataTable = $('#userTable').dataTable();
    if(protocol!=3)dataTable.fnClearTable();
    var protocolData = new Array(); //1-all, 6-mods, 7-admins
    if(protocol==1) protocolData.push(1);
    else if (protocol==2) protocolData.push(6);
    else if (protocol==3) protocolData.push(7);
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            dataTable.fnAddData([ user[0],user[1]+' '+user[2],user[7],user[11],user[10],user[15],user[16] ]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editUser(dataTable.fnGetData(this)[0])});
    if(protocol==2) initUserTable(3);  
}

function editUser(num){
    $('#userUpdateStatus').slideUp("fast");    
    $('#allUsers').hide();
    $('#moderatori').hide();
    $('#userUpdateStatus').hide();    
    $('#singleUser').show();
    $('#userPurHistory').show();
    $('#userWarnHalf').show();
    $('#userPurHistory').show();  
    userPurchases(num);    
    var userData = getUserData(num);
    $('#userID').val(userData[0]);
    $('#userIME').val(userData[1]);
    $('#userPREZIME').val(userData[2]);
    $('#userADRESA').val(userData[3]);
    $('#userPBR').val(userData[4]);
    $('#userMJESTO').val(userData[5]);
    $('#userTELEFON').val(userData[6]);
    $('#userEMAIL').val(userData[7]);
    $('#userOIB').val(userData[8]);
    $('#userOPENID option').eq(userData[9]).prop('selected',true);
    if(userData[10]==1)
        $('#singleUser input:radio[name=deaktiviran][value="1"]').prop('checked', true);
    else
        $('#singleUser input:radio[name=deaktiviran][value="0"]').prop('checked', true);
    var dt = userData[11].split(" ");
    $('#userZAMRZNUTdate').val(dt[0]);
    $('#userZAMRZNUTtime').val(dt[1]);    
    $('#userDATUM').val(userData[12]);    
    if(userData[13]==0){
        $('#userPOTVRDA option').eq(0).prop('selected',true);
        $('#userPOTVRDA').prop('disabled', 'disabled');
    } else {
        $('#userPOTVRDA option').eq(1).prop('selected',true).val(userData[13]);
        $('#userPOTVRDA').prop('disabled', false);    
    }
    $('#userLOZINKA').val(userData[14]);
    $('#userOVLASTI option').eq(parseInt(userData[15])-1).prop('selected', true);    
    if(userData[16]==1)
        $('#singleUser input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleUser input:radio[name=vidljivost][value="0"]').prop('checked', true);
    originalEmail = $('#userEMAIL').val();
    initWarnTable();
}

function newUser(){
    $('#allUsers').hide();
    $('#userPurHistory').hide();    
    $('#moderatori').hide();
    $('#userUpdateStatus').hide();
    $('#userWarnHalf').hide();
    $('#userPurHistory').hide();  
    $('#singleUser').show();
    $('#singleUser input:text').val('');
    $('#singleUser input:radio').prop('checked', false);
    $($('#singleUser input')[0]).val('Novi korisnik');
    $('#userEMAIL').val('');
    $('#userOPENID option').eq(0).prop('selected', true); 
    $('#singleUser input:radio[name=deaktiviran][value="0"]').prop('checked', true);    
    $('#userZAMRZNUTdate').val('0000-00-00');
    $('#userZAMRZNUTtime').val('00:00:00');
    $('#userPOTVRDA').prop('disabled', 'disabled');        
    $('#userPOTVRDA option').eq(0).prop('selected', true); 
    $('#userLOZINKA').val('');            
    $('#userOVLASTI option').eq(0).prop('selected', true);
    $('#singleUser input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function saveUser(){
    var protocolData = new Array();
    if($($('#singleUser input')[0]).val()=="Novi korisnik"){
        protocolData.push(3);        
        protocolData.push(-1);
    } else {
        protocolData.push(4);
        protocolData.push($('#userID').val());
    }    
    protocolData.push($('#userIME').val());
    protocolData.push($('#userPREZIME').val());
    protocolData.push($('#userADRESA').val());
    protocolData.push($('#userPBR').val());
    protocolData.push($('#userMJESTO').val());
    protocolData.push($('#userTELEFON').val());
    protocolData.push($('#userEMAIL').val());
    protocolData.push($('#userOIB').val());
    protocolData.push($('#userOPENID').val());
    protocolData.push($('#singleUser input:radio[name=deaktiviran]:checked').val());
    if($('#userZAMRZNUTdate').val()=='')
        protocolData.push('0000-00-00 00:00:00');        
    else  
        protocolData.push($('#userZAMRZNUTdate').val()+' '+$('#userZAMRZNUTtime').val());
    protocolData.push($('#userDATUM').val());
    protocolData.push($('#userPOTVRDA').val());
    protocolData.push($('#userLOZINKA').val());
    protocolData.push($('#userOVLASTI').val());
    protocolData.push($('#singleUser input:radio[name=vidljivost]:checked').val());
    var i;
    if(protocolData[15].length===0) i=15;
    if(!CheckOIB(protocolData[9])) i=9;
    if(!emailPattern.test(protocolData[8])) i=8;
    if(!checkEmailAvailability('userEMAIL')) i=8;
    if(protocolData[3].length===0) i=3
    if(protocolData[2].length===0) i=2;
    switch(i){
        case 2: 
            $('#userUpdateStatus').html("Ime je obavezno polje!").removeClass("info").removeClass("error").addClass("warning").slideDown("slow").delay(2000).slideUp("slow");;
            $('#userIME').focus();
            return false;
        case 3: 
            $('#userUpdateStatus').html("Prezime je obavezno polje!").removeClass("info").removeClass("error").addClass("warning").slideDown("slow").delay(2000).slideUp("slow");;
            $('#userPREZIME').focus();
            return false;
        case 8: 
            $('#userUpdateStatus').html("Email nije unešen ili je neispravan!").removeClass("info").removeClass("error").addClass("warning").slideDown("slow").delay(2000).slideUp("slow");;
            $('#userEMAIL').focus();
            return false;
        case 9: 
            $('#userUpdateStatus').html("Oib je neispravan").removeClass("info").removeClass("error").addClass("warning").slideDown("slow").delay(2000).slideUp("slow");;
            $('#userOIB').focus();
            return false;
        case 15: 
            $('#userUpdateStatus').html("Lozinka je obavezno polje!").removeClass("info").removeClass("error").addClass("warning").slideDown("slow").delay(2000).slideUp("slow");;
            $('#userLOZINKA').focus();
            return false;
        default:
            $('#userUpdateStatus').html("").slideUp("slow");
    }
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');    
    if(phpStatus(xml,'userUpdateStatus')){
        setTimeout(function(){
            $('#singleUser').hide();
            $('#allUsers').show();
            initUserTable(userSelectType);
            if(userSelectType==2)$('#moderatori').show();
        }, 1000);
    }
}

function userPurchases(num) {
    var dataTable = $('#userPurchases').dataTable();
    var xml = sendToPhp(new Array(2,num),"../get_purchases.php");
    $(xml).find('kupnja').each(function(){
        var data = new Array();
        $(this).children().each(function(){
            data.push($(this).text());
        });
        dataTable.fnAddData([data[0],data[4],data[2],data[3]]);
    });
}

function initWarnTable(){
    var dataTable = $('#userWarn').dataTable();
    dataTable.fnClearTable();
    var xml = sendToPhp(new Array('2',$('#userID').val()),'../getSet_opomene.php');
    var dataSet = $(xml).find('opomene');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([data[0],data[1],data[2]]);
        });
    });
}

function saveWarn(){
    if($('#userWarnNew').val()==''){
        $('#userWarnStatus').html("Upišite opis").addClass("error").removeClass("success").slideDown("slow").delay(2000).slideUp("slow");    
        return;
    }
    var protocolData = new Array('3');
    protocolData.push($('#userID').val());
    protocolData.push(sessionCheck());
    protocolData.push($('#userWarnNew').val());
    var xml = sendToPhp(protocolData,'../getSet_opomene.php');
    phpStatus(xml,'userWarnStatus');    
    initWarnTable();
}

/* === MODS === */

function initModsTable() {
    var dataTable = $('#modTables').dataTable();  
    dataTable.fnClearTable();
    var xml = sendToPhp(new Array('1'),'../getSet_moderatori.php');
    var dataSet = $(xml).find('moderatori');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([data[0],data[1],data[2], "ukloni"]);
        });
    });
    dataTable.$('td:nth-child(4)').addClass("row").click(function(){
        var aPos = dataTable.fnGetPosition( this );
        var aData = dataTable.fnGetData( aPos[0] );
        var xml = sendToPhp(new Array('5',aData[0]),'../getSet_moderatori.php');
        phpStatus(xml,'modUpdateStatus');         
        initModsTable();
    });
}

function saveMod() {
    var protocolData = new Array('3');
    protocolData.push($('#modSelectUser').val());
    protocolData.push($('#modeSelectCat').val());
    var xml = sendToPhp(protocolData,'../getSet_moderatori.php'); 
    phpStatus(xml,'modUpdateStatus'); 
    initModsTable();
    categoryDropSelectOptions('modeSelectCat',5,$('#modSelectUser').val());
}

function modsDropSelectOptions(field){
    $('#'+field+" option").remove();
    $('#'+field).append('<option disabled selected>--- Izaberi korisnika ---</option>');
    var protocolData = new Array('6');
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');    
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            $('#'+field).append("<option value="+user[0]+">"+user[1]+' '+user[2]+"</option>");
        });
    });
    var protocolData = new Array('7');
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');    
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            $('#'+field).append("<option value="+user[0]+">"+user[1]+' '+user[2]+"</option>");
        });
    });
}

function showCatDropSelectOptions(){
    $('#btnNewMod').removeAttr("disabled");
    categoryDropSelectOptions('modeSelectCat',5,$('#modSelectUser').val());
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
    userDropSelectOptions("sellerKORISNIK");
    $('#allSellers').hide();
    $('#singleSeller').show();
    $('#singleSeller input:text').val('');
    $($('#singleSeller input')[0]).val('Novi unos');
    $('#singleSeller input:radio[name=vidljivost]').prop('checked', false);
    $('#singleSeller input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editSeller(num){
    userDropSelectOptions("sellerKORISNIK");
    var protocolData = new Array('2',num);
    var xml = sendToPhp(protocolData,'../getSet_prodavatelji.php');
    var data = new Array();
    var parsedXML = $(xml).find('prodavatelj');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    $('#sellerID').val(data[0]);
    $('#sellerKORISNIK option').eq(parseInt(data[1])-1).prop('selected',true);
    $('#sellerNAZIV').val(data[2]);
    $('#sellerADRESA').val(data[3]);
    $('#sellerKONTAKT').val(data[4]); 
    $('#sellerINFO').val(data[5]);
    $('#sellerOIB').val(data[6]);
    if(data[data.length-1]=="Da")
        $('#singleSeller input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleSeller input:radio[name=vidljivost][value="0"]').prop('checked', true);    
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
    data.push($('#sellerKORISNIK option:selected').val());
    data.push($('#sellerNAZIV').val());
    data.push($('#sellerADRESA').val());
    data.push($('#sellerKONTAKT').val());
    data.push($('#sellerINFO').val());
    data.push($('#sellerOIB').val());
    data.push($('#singleSeller input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_prodavatelji.php');
    if(phpStatus(xml,'sellerUpdateStatus')) setTimeout(function(){ layout_showProdavatelji(); }, 1000);
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
    data.push($('#singleCategory input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_kategorije.php');       
    if(phpStatus(xml,'categoriesUpdateStatus')) setTimeout(function(){ layout_showKategorije(); }, 1000);      
}

/* === CITYS === */

function initCitysTable(){
    var dataTable = $('#citysTable').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_gradovi.php');
    var dataSet = $(xml).find('gradovi');    
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([data[0],data[1],data[2]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editCity(dataTable.fnGetData(this)[0])}); 
}

function newCity(){
    $('#allCitys').hide();
    $('#singleCity').show();
    $('#singleCity input:text').val('');
    $($('#singleCity input')[0]).val('Novi unos');
    $('#singleCity input:radio[name=vidljivost]').prop('checked', false);
    $('#singleCity input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editCity(num){
    var protocolData = new Array('2',num);
    var xml = sendToPhp(protocolData,'../getSet_gradovi.php');
    var data = new Array();
    var parsedXML = $(xml).find('grad');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    $('#cityID').val(data[0]);
    $('#cityNAZIV').val(data[1]);    
    if(data[2]=="1")
        $('#singleCity input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleCity input:radio[name=vidljivost][value="0"]').prop('checked', true);
    $('#singleCity').show();
    $('#allCitys').hide();
}

function saveCity(){
    var data = new Array();
    if($($('#singleCity input')[0]).val()=="Novi unos"){
        data.push(3);
        data.push(-1);
    } else {
        data.push(4);        
        data.push($($('#singleCity input')[0]).val());
    }
    data.push($('#cityNAZIV').val());  
    data.push($('#singleCity input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_gradovi.php');
    if(phpStatus(xml,'citysUpdateStatus')) setTimeout(function(){ layout_showGradovi(); }, 1000);
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
    categoryDropSelectOptions('offerKATEGORIJA',1,0);
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
    categoryDropSelectOptions('offerKATEGORIJA',1,0);
    var protocolData = new Array('2',num);
    var xml = sendToPhp(protocolData,'../getSet_ponude.php');
    var data = new Array();
    var parsedXML = $(xml).find('ponuda');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    $('#offerID').val(data[0]);
    $('#offerNASLOV').val(data[3]);
    $('#offerPODNASLOV').val(data[4]);
    $('#offerCIJENA').val(data[5]);
    $('#offerOPISNASLOV').val(data[6]);
    $('#offerOPISKRATKI').val(data[7]);
    $('#offerOPIS').val(data[8]);
    $('#offerNAPOMENA').val(data[9]);
    $('#offerKARTAX').val(data[10]);
    $('#offerKARTAY').val(data[11]);
    $('#offerPRODAVATELJ option').eq(parseInt(data[1])-1).attr('selected', 'selected');    
    $('#offerKATEGORIJA option').eq(parseInt(data[2])-1).attr('selected', 'selected');
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
    if(phpStatus(xml,'offerUpdateStatus')) setTimeout(function(){ layout_showPonude(); }, 1000);
}

/* === ACTION === */

function initActionsTable(){
    var dataTable = $('#actionsTables').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_akcije.php');
    var dataSet = $(xml).find('akcije');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([data[0],data[1],data[3],data[4],data[6],data[7]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editAction(dataTable.fnGetData(this)[0])}); 
}

function newAction(){
    offersDropSelectOptions('actionPONUDA');
    $('#allActions').hide();  
    $('#singleAction').show();
    $('#singleAction input:text').val('');
    $('#actionPOPUST').val('0');
    $('#actionPOCETAKdate').val('0000-00-00');
    $('#actionPOCETAKtime').val('00:00:00');
    $('#actionZAVRSETAKdate').val('0000-00-00');
    $('#actionZAVRSETAKtime').val('00:00:00');
    $('#actionGRANICA').val('0');      
    $($('#singleAction input')[0]).val('Novi unos');    
    $('#singleAction input:radio[name=istaknuto]').prop('checked', false);
    $('#singleAction input:radio[name=istaknuto][value="0"]').prop('checked', true);
    $('#singleAction input:radio[name=vidljivost]').prop('checked', false);
    $('#singleAction input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editAction(num){
    offersDropSelectOptions('actionPONUDA');    
    var protocolData = new Array('2',num);
    var xml = sendToPhp(protocolData,'../getSet_akcije.php');
    var data = new Array();
    var parsedXML = $(xml).find('akcija');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    $('#actionID').val(data[0]);
    $('#actionPONUDA option').eq(parseInt(data[1])-1).attr('selected', 'selected');        
    $('#actionPOPUST').val(data[2]);
    $('#actionPOCETAK').val();
    var dt = data[3].split(" ");
    $('#actionPOCETAKdate').val(dt[0]);
    $('#actionPOCETAKtime').val(dt[1]);     
    var dt = data[4].split(" ");
    $('#actionZAVRSETAKdate').val(dt[0]);
    $('#actionZAVRSETAKtime').val(dt[1]); 
    $('#actionGRANICA').val(data[5]);
    if(data[6]=="1")
        $('#singleAction input:radio[name=istaknuto][value="1"]').prop('checked', true);
    else
        $('#singleAction input:radio[name=istaknuto][value="0"]').prop('checked', true);

    if(data[7]=="1")
        $('#singleAction input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleAction input:radio[name=vidljivost][value="0"]').prop('checked', true);
    $('#singleAction').show();
    $('#allActions').hide();
}

function saveAction(){
    var data = new Array();
    if($($('#singleAction input')[0]).val()=="Novi unos"){
        data.push(3);
        data.push(-1);
    } else {
        data.push(4);        
        data.push($($('#singleAction input')[0]).val());
    }
    data.push($('#actionPONUDA').val());
    data.push($('#actionPOPUST').val());
    if($('#actionPOCETAKdate').val()=='')
        data.push('0000-00-00 00:00:00');        
    else  
        data.push($('#actionPOCETAKdate').val()+' '+$('#actionPOCETAKtime').val());
    if($('#actionZAVRSETAKdate').val()=='')
        data.push('0000-00-00 00:00:00');        
    else  
        data.push($('#actionZAVRSETAKdate').val()+' '+$('#actionZAVRSETAKtime').val());
    data.push($('#actionGRANICA').val());
    data.push($('#singleAction input:radio[name=istaknuto]:checked').val());    
    data.push($('#singleAction input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_akcije.php');
    if(phpStatus(xml,'actionUpdateStatus')) setTimeout(function(){ layout_showAkcije(); }, 1000);
}

/* ==== SALES === */

var filterInit = 0;

function initSalesTable() {
    var dataTable;
    if(!filterInit)
        dataTable = $('#allSales').dataTable().columnFilter({
            aoColumns:[null,null,null,{type: "select",values: kategorijeNazivi()},{type: "select",values: prodavateljiNazivi()},null,null]
        });
    else 
        dataTable = $('#allSales').dataTable();
    filterInit = 1;
    dataTable.fnClearTable();
    var xml = sendToPhp(new Array('1'),"../get_purchases.php");
    $(xml).find('kupnja').each(function(){
        var data = new Array();
        $(this).children().each(function(){
            data.push($(this).text());
        });
        dataTable.fnAddData([ data[0],data[1]+' '+data[2],data[3],data[4],data[5],data[6],data[7] ]);
    });
}

/* === COMMENTS === */

function initCommentsTable(){
    var dataTable = $('#commentsTable').dataTable();
    dataTable.fnClearTable();
    var xml = sendToPhp(new Array('1'),'../getSet_komentari.php');
    var dataSet = $(xml).find('komentari');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            dataTable.fnAddData([ data[0],data[1],data[3],data[5],data[6] ]);
        });
    });    
    dataTable.$('td:nth-child(5)').addClass("row").click(function(){
        var aPos = dataTable.fnGetPosition( this );
        var aData = dataTable.fnGetData( aPos[0] );
        var xml = sendToPhp(new Array('4',aData[0]),'../getSet_komentari.php');
        if(phpStatus(xml,'commentsUpdateStatus')) initCommentsTable();
    });
}

/* === TIME OFFSET === */

function initTimeTable(){
    var xml = sendToPhp(new Array('1'),'../getSet_vrijeme.php');
    var status = $(xml).find('status').text();
    $('#currentTimeOffset').html(status);
}

function saveTime() {
    sendToPhp(new Array('2'),'../getSet_vrijeme.php');
    initTimeTable();
}

/* === AJAX STATUS SEND/R === */

function sendToPhp(dataString,url){
    $("body").css("cursor", "progress");    
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
    $("body").css("cursor", "default");    
    return data;
}

function phpStatus(xml,field){userUpdateStatus
    var status = $(xml).find('status').text();
    if(status===''){
        $('#'+field).html("Nema izmjena").removeClass("info").removeClass("error").addClass("warning").slideDown("slow").delay(1500).slideUp("slow");
    } else if(status==='1'){
        $('#'+field).html("Zapis pohranjen").removeClass("error").removeClass("warning").addClass("info").slideDown("slow").delay(1500).slideUp("slow");        
        return true;
    } else {
        $('#'+field).html("Greška prilikom pohrane").removeClass("info").removeClass("warning").addClass("error").slideDown("slow").delay(1500).slideUp("slow");
    }
    return false;
}


/* === USER DROP SELECT */

function userDropSelect(field){
    var availableTags = new Array();
    var protocolData = new Array('1');
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');    
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            availableTags.push(user[1]+' '+user[2]);
        });
    });
    $(function(){$("#"+field).autocomplete({source: availableTags});});
}

function userDropSelectOptions(field){
    $('#'+field+" option").remove();
    var protocolData = new Array('1');
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');    
    var users = $(xml).find('korisnici');
    var user = new Array();
    $(users).each(function(){    
        $(this).children().each(function(){
            user = []; 
            $(this).children().each(function(){
                user.push($(this).text());
            });
            $('#'+field).append("<option value="+user[0]+">"+user[1]+' '+user[2]+"</option>");
        });
    });
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

function prodavateljiNazivi(){
    var xml = sendToPhp(new Array('1'),'../getSet_prodavatelji.php');
    var dataSet = $(xml).find('prodavatelji');
    var data = new Array();
    var nazivi = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            nazivi.push(data[2]);
        });
    });
    return nazivi;
}

function categoryDropSelectOptions(field,type,userID){
    $('#'+field+" option").remove();
    var protocolData = new Array();
    protocolData.push(type);
    protocolData.push(userID);
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

function kategorijeNazivi(){
    var xml = sendToPhp(new Array('1'),'../getSet_kategorije.php');
    var dataSet = $(xml).find('kategorije');
    var data = new Array();
    var nazivi = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            nazivi.push(data[1]);
        });
    });
    return nazivi;
}

function categoryDropSelectOptions(field,type,userID){
    $('#'+field+" option").remove();
    var protocolData = new Array();
    protocolData.push(type);
    protocolData.push(userID);
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


function offersDropSelectOptions(field){
    $('#'+field+" option").remove();
    var xml = sendToPhp(new Array('1','1'),'../getSet_ponude.php');
    var dataSet = $(xml).find('ponude');
    var data = new Array();
    $(dataSet).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            $('#'+field).append("<option value="+data[0]+">"+data[3]+"</option>");
        });
    });
}

/* === SESSION AND USER DATA === */

function sessionCheck() {
    var data = new Array();
    data.push('2');
    var xml = sendToPhp(data,"../includes/session.php");
    var status = $(xml).find('status').text();
    return parseInt(status);
}

function getUserData(id){
    var data = new Array();
    var protocolData = new Array('2',id);
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');
    var parsedXML = $(xml).find('korisnik');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    return data;
}

/* === MESSAGE BOX === */

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
    if (oib.length==0) return true;    
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

function checkEmailAvailability(field) {
    if(originalEmail == $('#'+field).val())return true;
    var dataString = new Array('','',$('#'+field).val(),'','','');
    var xml = sendToPhp(dataString,"../includes/register.php");
    var status = $(xml).find('status').text();
    if(status==='1'){
        $('#userUpdateStatus').html("Email zauzet!").removeClass("info").removeClass("error").addClass("warning").slideDown("slow");
        return false;
    }else{
        $('#userUpdateStatus').html("").removeClass("warning").slideUp("slow");
        return true;
    }
}