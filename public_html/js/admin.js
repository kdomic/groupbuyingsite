var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
var originalEmail;
var userSelectType; //ova nam je da se znamo vratiti poslje pohrane korisnika ili moderatora

/* === LAYOUTS === */

function hideAll(){
    $('#pocetna').hide();
    $('#korisnici').hide();
    $('#prodavatelji').hide();    
    $('#kategorije').hide();
    $('#gradovi').hide();    
    $('#ponude').hide();
    $('#akcije').hide();
    $('#vrijeme').hide();
    $('#prodaja').hide();
    $('#moderatori').hide();
    $('#komentari').hide();
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
    modsDropSelectOptions('modSelectUser');
    initModsTable();
    $('#singleUser').hide();
    $('#allUsers').show();
    $('#korisnici').show();
    $('#moderatori').show();    
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

function layout_showGradovi(){
    hideAll();
    $('#gradovi').show();
    $('#allCitys').show();
    $('#singleCity').hide();    
    initCitysTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[5]).addClass('menuCurrent');    
}

function layout_showPonude(){
    hideAll();
    $('#ponude').show();
    $('#allOffers').show();
    $('#singleOffer').hide();    
    initOffersTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[6]).addClass('menuCurrent');    
}

function layout_showAkcije(){
    hideAll();
    $('#akcije').show();
    $('#allActions').show();
    $('#singleAction').hide();    
    initActionsTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[7]).addClass('menuCurrent');    
}

function layout_showVrijeme(){
    hideAll();
    initTimeTable();
    $('#vrijeme').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[8]).addClass('menuCurrent');    
}

function layout_showProdaja(){
    hideAll();
    initSalesTable();
    $('#prodaja').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[9]).addClass('menuCurrent');    
}


function layout_showKomentari(){
    hideAll();
    initCommentsTable();
    $('#komentari').show();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[10]).addClass('menuCurrent');    
}

/* === ONLOAD === */
$(document).ready(function(){
    //!!!! PROVJERA OVLASTI - getSet_korisnici.php
	hideAll();

    //EVENTS
    $($('#sidebar li')[0]).click(function(){});
    $($('#sidebar li')[1]).click(function(){layout_showKorisnici();});
    $($('#sidebar li')[2]).click(function(){layout_showModeratori();});
    $($('#sidebar li')[3]).click(function(){layout_showProdavatelji();});
    $($('#sidebar li')[4]).click(function(){layout_showKategorije();}); 
    $($('#sidebar li')[5]).click(function(){layout_showGradovi();});       
    $($('#sidebar li')[6]).click(function(){layout_showPonude();});
    $($('#sidebar li')[7]).click(function(){layout_showAkcije();});
    $($('#sidebar li')[8]).click(function(){layout_showVrijeme();});
    $($('#sidebar li')[9]).click(function(){layout_showProdaja();});
    $($('#sidebar li')[10]).click(function(){layout_showKomentari();});




    $('#btnNewUser').click(function(){newUser();});
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


});

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
            dataTable.fnAddData([user[0],user[1]+' '+user[2],user[7],user[12],user[13],user[11],user[10],user[17],user[18]]);
        });
    });    
    dataTable.$('tr').addClass("row").click(function(){editUser(dataTable.fnGetData(this)[0])});
    if(protocol==2) initUserTable(3);
}

function editUser(num){
    $('#userUpdateStatus').slideUp("fast");    
    $('#allUsers').hide();
    $('#singleUser').show();
    $('#userPurHistory').show();
    userPurchases(num);    
    var userData = getUserData(num);
    var userInput = $('#singleUser td input');
    for(var i=0; i<(userData.length-1); i++)
        $($(userInput)[i]).val(userData[i]);
    if(userData[userData.length-1]==1)
        $('#singleUser input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('#singleUser input:radio[name=vidljivost][value="0"]').prop('checked', true);
    originalEmail = $('#userEMAIL').val();
}

function newUser(){
    $('#allUsers').hide();
    $('#userPurHistory').hide();    
    $('#moderatori').hide();
    $('#singleUser').show();
    $('#singleUser input:text').val('');
    $($('#singleUser input')[0]).val('Novi korisnik');
    $('#singleUser input:radio[name=vidljivost]').prop('checked', false);
    $('#singleUser input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function saveUser(){
    var protocolData = new Array();
    if($($('#singleUser input')[0]).val()=="Novi korisnik"){
        protocolData.push(3);        
        protocolData.push(-1);
    } else {
        protocolData.push(4);
        protocolData.push($($('#singleUser input')[0]).val());
    }
    for(var i=1; i<(19-1); i++)
        protocolData.push($($('#singleUser input')[i]).val());
    protocolData.push($('#singleUser input:radio[name=vidljivost]:checked').val());

    console.log(protocolData);
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');
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
}

function saveMod() {
    var protocolData = new Array('3');
    protocolData.push($('#modSelectUser').val());
    protocolData.push($('#modeSelectCat').val());
    var xml = sendToPhp(protocolData,'../getSet_moderatori.php'); 
    var status = $(xml).find('status').text();
    if(status==='1')
        $('#modUpdateStatus').html("Zapis pohranjen").addClass("success").removeClass("error").slideDown("slow").delay(2000).slideUp("slow");
    else 
        $('#modUpdateStatus').html("Greška prilikom pohrane").addClass("error").removeClass("success").slideDown("slow").delay(2000).slideUp("slow");    
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
    $('#sellerKORISNIK option').eq(parseInt(data[1])-1).attr('selected', 'selected');
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
    layout_showPonude();
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
    layout_showGradovi();
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
    $('#actionPOCETAK').val(data[3]);
    $('#actionZAVRSETAK').val(data[4]);
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
    data.push($('#actionPOCETAK').val());
    data.push($('#actionZAVRSETAK').val());
    data.push($('#actionGRANICA').val());
    data.push($('#singleAction input:radio[name=istaknuto]:checked').val());    
    data.push($('#singleAction input:radio[name=vidljivost]:checked').val());
    var xml = sendToPhp(data,'../getSet_akcije.php');
    layout_showAkcije();
}

/* ==== SALES === */

function initSalesTable() {
    var dataTable = $('#allSales').dataTable();
    var xml = sendToPhp(new Array('1'),"../get_purchases.php");
    $(xml).find('kupnja').each(function(){
        var data = new Array();
        $(this).children().each(function(){
            data.push($(this).text());
        });
        console.log(data);
        dataTable.fnAddData([ data[0],data[1]+' '+data[2],data[3],data[4],data[5],data[6] ]);
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
        initCommentsTable();
    });
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
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_ponude.php');
    var cats = $(xml).find('ponude');
    var data = new Array();
    $(cats).each(function(){    
        $(this).children().each(function(){
            data = []; 
            $(this).children().each(function(){
                data.push($(this).text());
            });
            $('#'+field).append("<option value="+data[0]+">"+data[3]+"</option>");
        });
    });
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
    var protocolData = new Array('2',id);
    var xml = sendToPhp(protocolData,'../getSet_korisnici.php');
    var parsedXML = $(xml).find('korisnik');
    $(parsedXML).children().each(function(){
        data.push($(this).text());
    });
    return data;
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