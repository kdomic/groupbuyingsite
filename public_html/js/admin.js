var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
var originalEmail;
var userSelectType;

/* === LAYOUTS === */

function hideAll(){
    $('#pocetna').hide();
    $('#korisnici').hide();
    $('#kategorije').hide();
    $('#proizvodi').hide();
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

function layout_showKategorije(){
    hideAll();
    $('#kategorije').show();
    $('#allCategories').show();
    $('#singleCategory').hide();    
    initCategoriesTable();
    $('.menuCurrent').removeClass('menuCurrent');
    $($('#sidebar li')[3]).addClass('menuCurrent');
}

/* === ONLOAD === */
$(document).ready(function(){
    //!!!! PROVJERA OVLASTI - get_allusers.php
	hideAll();

    //EVENTS
    $($('#sidebar li')[0]).click(function(){});
    $($('#sidebar li')[1]).click(function(){layout_showKorisnici();});
    $($('#sidebar li')[2]).click(function(){layout_showModeratori();});
    $($('#sidebar li')[3]).click(function(){layout_showKategorije();});
    $($('#sidebar li')[4]).click(function(){});
    $($('#sidebar li')[5]).click(function(){});
    $($('#sidebar li')[6]).click(function(){});

    $('#btnNewCategory').click(function(){newCategory();});
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
    console.log(status);
}

/* === CATEGORIES === */

function initCategoriesTable() { 
    var dataTable = $('#categoriesTable').dataTable();
    dataTable.fnClearTable();
    var protocolData = new Array();
    protocolData.push(1);
    var xml = sendToPhp(protocolData,'../getSet_categories.php');
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
    $('input:radio[name=vidljivost]').prop('checked', false);
    $('input:radio[name=vidljivost][value="1"]').prop('checked', true);
}

function editCategory(num){
    var data = new Array('2',num);
    var xml = sendToPhp(data,'../getSet_categories.php');
    var catData = new Array();
    var user = $(xml).find('kategorija');
    $(user).children().each(function(){catData.push($(this).text())});
    console.log(catData);
    $('#categoryID').val(catData[0]);
    $('#categoryNAZIV').val(catData[1]);
    if(catData[2]=="Da")
        $('input:radio[name=vidljivost][value="1"]').prop('checked', true);
    else
        $('input:radio[name=vidljivost][value="0"]').prop('checked', true);

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
    console.log(data);
    var xml = sendToPhp(data,'../getSet_categories.php');
    layout_showKategorije();
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