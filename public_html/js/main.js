var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
var map_x = 0;
var map_y = 0;

/* === DROPBOX === */

function showDropbox(index){
    if(index==='Account') userAccount();
    if(index==='Purchases') userPurchases();
    $(".dropbox"+index).slideToggle("slow");    
}

function userAccount() {
    var userId = sessionCheck ();
    if(!sessionCheck()) error();
    var userData = getUserData(userId);
    $('#inputUserIdA').val(userData[0]);
    $('#inputImeA').val(userData[1]);
    $('#inputPrezimeA').val(userData[2]);
    $('#inputAdresaA').val(userData[3]);
    $('#inputPbrA').val(userData[4]);
    $('#inputMjestoA').val(userData[5]);
    $('#inputTelefonA').val(userData[6]);
    $('#inputOibA').val(userData[8]);
    $('#inputEmailA').val(userData[7]);

    $('#infoCol').html('ok');
    $('#dropboxCol1Status').hide();
    $('#dropboxCol2Status').hide();
}

function userPurchases() {
    if(!sessionCheck()) error();
}

/* === REGISTER === */

function registerUser(){
    if(!checkIsEmpty()) return;
    if(!checkEmailAvailability()) return;
    if(!checkPassMatching()) return;
    var dataString = parseRegForm();
    dataString.push("regData");
    $('#btnRegister').attr("disabled", "disabled");
    var xml = sendToPhp(dataString,"includes/register.php");
    var status = $(xml).find('status').text();
    if(status==='1'){
        $('#regStatus').removeClass("error").removeClass("warning").addClass("info");
        $('#regStatus span').html("Registracija izvršena!<br/>Možete se prijaviti");      
        $('#regStatus').slideDown("slow");
    } else {
        $('#regStatus').removeClass("warning").addClass("error");
        $('#regStatus span').html("Registracija neuspjela!<br/>Pokušajte ponovno");
        $('#btnRegister').removeAttr("disabled");        
        $('#regStatus').slideDown("slow");
    }
}

function checkIsEmpty(){
    var i;
    var data = parseRegForm();
    for(i=0; i<data.length; i++)
        if(data[i].length===0)
            break;
    if(!emailPattern.test(data[2])) i=2;
    if(!data[5]) i=5;
    switch(i){
        case 0: 
            $('#regStatus span').html("Ime je obavezno polje!");
            $('#regStatus').slideDown("slow");
            $('#inputIme').focus();
              return false;
        case 1: 
            $('#regStatus span').html("Prezime je obavezno polje!");
            $('#regStatus').slideDown("slow");
            $('#inputPrezime').focus();
            return false;
        case 2: 
            $('#regStatus span').html("Email nije unešen ili je neispravan!");
            $('#regStatus').slideDown("slow");
            $('#inputEmail').focus();
            return false;
        case 3: 
            $('#regStatus span').html("Lozinka je obavezno polje!");
            $('#regStatus').slideDown("slow");
            $('#inputLozinka').focus();
            return false;
        case 4: 
            $('#regStatus span').html("Potvrda lozinke je obavezna");
            $('#regStatus').slideDown("slow");
            $('#inputLozinka2').focus();
            return false;
        case 5: 
            $('#regStatus span').html("Morate prihvatiti uvijete");
            $('#regStatus').slideDown("slow");
            $('#uvjeti').focus();
            return false;
        default:
            $('#regStatus').slideUp("slow");
            $('#regStatus span').html("");
            return true;
    }
}

function checkEmailAvailability(){
    var dataString = parseRegForm();
    var xml = sendToPhp(dataString,"includes/register.php");
    var status = $(xml).find('status').text();
    if(status==='1'){
        $('#regStatus span').html("E-mail zauzet!");
        $('#regStatus').slideDown("slow");
        return false;
    } else {
        $('#regStatus').slideUp("slow");
        $('#regStatus span').html("");
        return true;
    }
}

function checkPassMatching() {
    var data = parseRegForm();
    if(data[3]!==data[4]) {
        $('#regStatus span').html("Lozinke se ne podudaraju");
        $('#regStatus').slideDown("slow");
        return false;
    } else {
        $('#regStatus').slideUp("slow");
        $('#regStatus span').html("");
        return true;
    }
}

function parseRegForm(){
    var data = new Array();
    data.push($('#inputIme').val());        //0
    data.push($('#inputPrezime').val());    //1
    data.push($('#inputEmail').val());      //2
    data.push($('#inputLozinka').val());    //3
    data.push($('#inputLozinka2').val());   //4
    data.push($('#uvjeti').is(':checked')); //5
    return data;
}

/* === LOGIN === */

function loginUser(){
    var data = new Array();
    data.push('1');
    data.push($('#inputEmailP').val());
    data.push($('#inputLozinkaP').val());
    if(data[1].length===0 || data[2].length===0 || !emailPattern.test(data[1])){        
        $('#loginStatus span').html("Uneseni podatci nisu ispravni");
        $('#loginStatus').slideDown("slow");
        return false;
    }
    $('#loginStatus').slideUp("slow");
    $('#loginStatus span').html("");
    $('#btnLogin').attr("disabled", "disabled");
    var xml = sendToPhp(data,"includes/session.php");
    var status = $(xml).find('status').text();
    if(status==='1'){
        $('#loginStatus').removeClass("error").removeClass("warning").addClass("info");
        $('#loginStatus span').html("Prijava uspješna!");      
        $('#loginStatus').slideDown("slow");
        $('#btnShowDropboxLogin').addClass("hide");        
        setTimeout(function(){
            $('.dropboxLogin').slideUp("slow");
            $('#btnShowDropboxPurchases').removeClass("hide");
            $('#btnShowDropboxAccount').removeClass("hide");
        }, 1000);
        reloadBasket();
    } else {
        $('#loginStatus').removeClass("warning").addClass("error");
        $('#loginStatus span').html("Uneseni podatci nisu ispravni");
        $('#btnLogin').removeAttr("disabled");        
        $('#loginStatus').slideDown("slow");
    }
}

/*=== USER SETTINGS ===*/

function userInformationChange(){
    var userData = getUserData($('#inputUserIdA').val());
    userData[1] = $('#inputImeA').val();
    userData[2] = $('#inputPrezimeA').val();
    userData[3] = $('#inputAdresaA').val();
    userData[4] = $('#inputPbrA').val();
    userData[5] = $('#inputMjestoA').val();
    userData[6] = $('#inputTelefonA').val();
    userData[8] = $('#inputOibA').val();
    if(!CheckOIB(userData[8])){
        $('#dropboxCol1Status').slideUp("slow");
        $('#dropboxCol1Status').removeClass("info").removeClass("error").addClass("warning");
        $('#dropboxCol1Status span').html("OIB je neispravan");
        $('#dropboxCol1Status').slideDown("slow");
        return;
    }
    var xml = setUserData(userData);
    var status = $(xml).find('status').text();
    accountMess('dropboxCol1Status',status);
}

function userCredentialChange(){
    var userData = getUserData($('#inputUserIdA').val());
    var pass = $('#inputLozinkaA').val();
    var pass2 = $('#inputLozinka2A').val();
    if(pass!==pass2){
        $('#dropboxCol2Status').slideUp("slow");
        $('#dropboxCol2Status').removeClass("info").removeClass("error").addClass("warning");
        $('#dropboxCol2Status span').html("Lozinke se ne podudaraju");
        $('#dropboxCol2Status').slideDown("slow");
        return;
    }
    userData[16] = pass;
    var xml = setUserData(userData);
    var status = $(xml).find('status').text();
    accountMess('dropboxCol2Status',status);
}

function accountMess(id,status){
    $('#'+id).slideUp("slow");
    if(status==='1'){
        $('#'+id).removeClass("error").removeClass("warning").addClass("info");
        $('#'+id+' span').html("Izmjene pohranjene");      
    } else if(status==='') {
        $('#'+id).removeClass("info").removeClass("error").addClass("warning");
        $('#'+id).html("Podatci nisu izmjenjeni");
    } else {
        $('#'+id).removeClass("info").removeClass("warning").addClass("error");
        $('#'+id+' span').html("Pohrana nije uspjela");
    }
    $('#'+id).slideDown("slow");
}

/* === SLIDER === */

var timer = $.timer(function() {sliderChange(null);}); /*https://code.google.com/p/jquery-timer/*/
var speed = 6000;
var sliderNum = 0;
var sliderMaxNum = 4;
var sliderData = new Array();

function initSlider() {
    sliderNum = 0;
    sliderChange(null);
    timer.set({ time : speed, autostart : true });
}

function sliderPlayIcon(){
    if(timer.isActive) $('#sliderPlay').html("&#9734;");
    else $('#sliderPlay').html("&#9733;");
}

function sliderPlay(){
    timer.toggle(true);
    sliderPlayIcon();
}

function sliderChange(selectedOffer){
    var data = new Array();
    if(selectedOffer===null){
        sliderNum = sliderNum+1;
        selectedOffer = sliderNum;        
        sliderNum = sliderNum%sliderMaxNum;        
    }else{
        sliderNum = selectedOffer;
        timer.pause();        
        data = getOffer(selectedOffer);
    }    
    sliderPlayIcon();
    var index = $('.sliderImgNum a').length-selectedOffer;
    $('.sliderImgNum a').removeClass('current');
    $($('.sliderImgNum a')[index]).addClass('current');
    data = getOffer(sliderMaxNum-index+1);
    slideOfferChange(data);
    sliderImgChange(data[12]);
}

function sliderImgChange(img){
    var time = 400;
    if(jQuery.type(img) !== "string") img = img.src;
    $('.sliderImg img').css({opacity: 1.0}).animate({opacity: 0}, time);
    $('.sliderImg img').delay(time+10)
                       .queue(function(next){
                            $(this).attr("src", img);
                            $(this).css({opacity: 0, visibility: "visible"}).animate({opacity: 1.0}, time);
                            next(); 
                        });                    
}

function slideOfferChange(data) { 
    var time = 400;
    $('.sliderCaption h1').fadeOut(time, function() { $(this).text(data[1]).fadeIn(time); });
    $('.sliderCaption h2').fadeOut(time, function() { $(this).text(data[2]).fadeIn(time); });
    $('.sliderOfferBuy h2').fadeOut(time, function() { $(this).text(data[3]).fadeIn(time); });
    $('.sliderOfferDiscount h2.u').fadeOut(time, function() { $(this).text(data[4]).fadeIn(time); });
    $('.sliderOfferDiscount h2.p').fadeOut(time, function() { $(this).text(data[5]).fadeIn(time); });
    $('.sliderOfferDiscount h2.v').fadeOut(time, function() { $(this).text(data[6]).fadeIn(time); });
    $('.sliderOfferBought h1').fadeOut(time, function() { $(this).text(data[7]).fadeIn(time); });
    $('.sliderOfferBought h2').fadeOut(time, function() { $(this).text(data[8]).fadeIn(time); });
    $('.sliderOfferBought meter').css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0}, time);
    $('.sliderOfferBought meter').delay(time+10)
                                 .queue(function(next){ 
                                     $('.sliderOfferBought meter').attr("value", data[9]);
                                     $('.sliderOfferBought meter').attr("max", data[10]);
                                     $(this).css({opacity: 0, visibility: "visible"}).animate({opacity: 1.0}, time);
                                     next(); 
                                 });    
    $('.sliderOfferTime h2').fadeOut(time, function() { $(this).text(data[11]).fadeIn(time); });
    $('.sliderOfferFriend a').unbind('click');
    $($('.sliderOfferFriend a')[0]).click(function(){alter("napraviti")});
    $($('.sliderOfferFriend a')[1]).click(function(){loadOfferDetails(data[0]);});    
    $('.sliderOfferBuy a').remove('a');
    $('.sliderOfferBuy img').remove('img');
    if(isInBasket(data[0]))    
        $('.sliderOfferBuy').append('<img src="images/basketRemove.png" alt="U košaric" onclick="removeOfferFromBasket('+data[0]+');"/>');
    else
        $('.sliderOfferBuy').append('<a onclick="addOfferToBasket('+data[0]+');">KUPI</a>');
    $('.sliderOfferBuy a').fadeOut(time).fadeIn(time);
    $('.sliderOfferBuy img').fadeOut(time).fadeIn(time);
    $('.sliderOfferFriend h1').fadeOut(time).fadeIn(time);
    $('.sliderOfferFriend img').fadeOut(time).fadeIn(time);
    $('.sliderOfferBuy h1').fadeOut(time).fadeIn(time);        
    $('.sliderOfferTime h1').fadeOut(time).fadeIn(time);
}

/* === OFFERS ==== */

var initOfferNum = 3;
var currentOfferNum = 5; //prve 4 su za gore!

function initOffers(){
    for(var i = 0; i<initOfferNum; i++)
        addOneOffer();
}

function addOneOffer(){
    addNewOffer(currentOfferNum);
    currentOfferNum++;
}

function addNewOffer(load){
    var data = getOffer(load);
    var $div = $('\
<div class="offer">\
<img src="'+data[12]+'" alt="slika" onclick="loadOfferDetails('+data[0]+');"/>\
<div>\
<h1>'+data[1]+'</h1>\
<h2>'+data[2]+'</h2>\
<div class="down">\
<div class="price"> <h3>Plaćaš</h3> <h4>'+data[3]+'</h4>  </div>\
<div class="discount"> <h3>Štediš</h3> <h4>'+data[5]+'</h4> </div>\
<div class="time"> <h3>Vrijedi još</h3> <h4>'+data[11]+'</h4> </div>\
<div class="more"> <a onclick="loadOfferDetails('+data[0]+');"><img src="images/info.png" alt="Info" /></a> </div>\
</div>\
</div>\
</div>\
');
    $('#layout_offers').append($div);
}

function getOffer(load){
    var data = new Array();
    $.ajax({
        url:'get_offer.php?num='+load,
        async:false,
        type: 'GET',
        dataType: 'xml',
        success: function(xml) {
            var offer = $(xml).find('offer'); //var offer = $(xml).find('offer[id='+selectedOffer+']');
            $(offer).each(function(){
                $(this).children().each(function(){
                    var _data = $(this).text();
                    _data = _data.replace(/"/g, '');
                    data.push(_data);
                });
            });
        }
    });
    return data;
}

/* === OFFER DETAILS === */

function loadOfferDetails(num){
    goTop();   
    var data = getOffer(num);
    sliderChange(num);
    var img = data[14].split(';');
    img.pop();
    $('.imgGallery').html('');
    while(img.length>0){
        var path = data[13]+'/'+img.pop();
        var $div = $('<img src="'+path+'" alt="slika" onclick="sliderImgChange(this);"/>');
        $('.imgGallery').append($div);
    }
    $('.shortDesc').text(htmlDencodeEntities(data[15]));
    $('.desc').text(htmlDencodeEntities(data[16]));
    $($('#layout_sidebar_offer_details div')[0]).html(htmlDencodeEntities(data[17])); 
    map_x = parseFloat(data[18]);
    map_y = parseFloat(data[19]);  
    $($('#layout_sidebar_offer_details div')[1]).html(data[1]+'<br/><a href=""><img src="images/basketAdd.png" alt="slika" /></a>');
    showOfferLayou();
    backQuene.push(parseInt(num)*(-1));
}

/* === BASKET ==== */

function addOfferToBasket(num){
    if(!sessionCheck()){
        msgBoxShow("Niste prijavljeni", "Molimo Vas prijavite se kako biste mogli kupovati", "info");       
        showDropbox('Login');
        return;
    }
    var dataString = new Array();
    dataString.push('1');
    dataString.push(num);
    var xml = sendToPhp(dataString,"includes/basket.php");
    var status = $(xml).find('status').text();
    reloadBasket();
    sliderChange(num);
    msgBoxShow("Dodavanje", "Proizvod je dodan u košaricu", "info");
}

function removeOfferFromBasket(num){
    var dataString = new Array();
    dataString.push('2');
    dataString.push(num);
    var xml = sendToPhp(dataString,"includes/basket.php");
    var status = $(xml).find('status').text();
    reloadBasket();
    sliderChange(num);
    msgBoxShow("Uklanjanje", "Proizvod je uklonjen iz košarice", "info");
}

function isInBasket(num){
    var dataString = new Array();
    dataString.push('0');
    var xml = sendToPhp(dataString,"includes/basket.php");
    var data = $(xml).find('status').text();
    data = data.split(';');
    data.pop();
    while(data.length>0)
        if(parseInt(data.pop())===parseInt(num))
            return true;
    return false;
}

function reloadBasket() {
    if(!sessionCheck()){
        $('#basket').html('Niste prijavljani');
        $('.buttonGreen').hide();
        return;
    }
    var dataString = new Array();
    dataString.push('0');
    var xml = sendToPhp(dataString,"includes/basket.php");
    var data = $(xml).find('status').text();
    $('#basket').html('');
    data = data.split(';');
    data.pop();
    $('.buttonGreen').hide();
    if(data.length===0)$('#basket').html('Košarica je prazna');
    while(data.length>0){
        var num = data.pop();
        var $div = $('<img src="offers/ponuda_'+leadZero(num)+'/01.jpg" alt="slika" onclick="loadOfferDetails('+num+')"/>');
        $('#basket').append($div);
        $('.buttonGreen').show();
    }
}

/* === CHECKOUT ===*/

function checkout(){
    showCheckoutLayout();    
    var dataString = new Array();
    dataString.push('0');
    var xml = sendToPhp(dataString,"includes/basket.php");
    var data = $(xml).find('status').text();
    data = data.split(';');
    data.pop();
    while(data.length>0){
        var num = data.pop();
        addNewOffer(num);
    }
    $('#layout_content_universal').html('<div class="buttonLongGreen" onclick="checkoutPay();">Plati</div>');
    $('#layout_sidebar_universal h1').html('Opis pllaćanja');
    $('#layout_sidebar_universal div').html('\
        Plaćanje na portalu grupne kupovine je vrlo jednostavno!<br><br>\
        Nakon što pritisnete gumb plati transakciju možete izvršiti sljedećim sredstvima:<br>\
        <div class="cards"><img src="images/card_paypal.png" alt="Kartica" /></div>\
        <div class="cards"><img src="images/card_visa.png" alt="Kartica" /></div>\
        <div class="cards"><img src="images/card_mastercard.png" alt="Kartica" /></div>');
}

function checkoutPay() {
    var sum = 0;
    $.msgBox({
        title: "Proces naplate",
        content: "Ukupan iznos za naplatu: "+sum+"kn",
        type: "confirm",
        buttons: [{ value: "Prihvati" }, { value: "Povratak" }],
        success: function (result) {
            if (result == "Prihvati") {                
                var dataString = new Array();
                dataString.push('3');
                var xml = sendToPhp(dataString,"includes/basket.php");
                var data = parseInt($(xml).find('status').text());
                if(data===1){
                    $('#layout_offers').html('<div class="success">Kupnja gotova!</div>');
                    $('#layout_content_universal').hide();
                    reloadBasket();
                } else {
                    $('#layout_offers').html('<div class="error">Greška</div>');
                    $('#layout_content_universal').hide();
                }
            }
        }
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
    var xml = sendToPhp(data,"includes/session.php");
    var status = $(xml).find('status').text();
    return parseInt(status);
}

function getUserData(id){
    var data = new Array();
    data.push(id);
    var xml = sendToPhp(data,"get_userdata.php");
    var status = $(xml).find('status').text();
    if(status==='0') error();
    var userData = new Array();
    var user = $(xml).find('korisnik');
    $(user).children().each(function(){userData.push($(this).text())});
    return userData;
}

function setUserData(data){
    var xml = sendToPhp(data,"set_userdata.php");
    return xml;
}

/* === ONLOAD === */
$(document).ready(function() {
    if(sessionCheck()){
        $('#btnShowDropboxLogin').addClass("hide");        
        $('#btnShowDropboxPurchases').removeClass("hide");
        $('#btnShowDropboxAccount').removeClass("hide");
    }
    $('#inputLozinkaP').keypress(function(e) {if(e.which == 13)loginUser();});    
    reloadBasket();   
    showIndexLayout();
});

/* === LAYOUTS === */

function hideAll() {
    goTop();
    hideIndexLayou();
    hideOfferLayou();
    hideCheckoutLayout();
}

function showIndexLayout() {
    backQuene.push(1);
    $('#goBack').hide();
    hideAll();
    $('#layout_offers').html('');
    initOffers();
    initSlider();
    sliderPlayIcon();
    $('#slider').show();
    $($('.sliderOfferFriend a')[1]).show();
    $('.sliderImgNum').show();
    $('#layout_offers').show();
    $('#layout_content_universal').html('<div class="offer" id="loadMoreOffer" onclick="addOneOffer();">Učitaj više</div>')
                                  .show();
    $('#layout_sidebar_search').show();
    $('#layout_sidebar_basket').show(); 
    $('#layout_sidebar_newsletter').show();
}

function hideIndexLayou() {
    timer.stop();
    $('#slider').hide();
    $($('.sliderOfferFriend a')[1]).hide();
    $('.sliderImgNum').hide();
    $('#layout_offers').hide();
    $('#layout_content_universal').hide();
    $('#layout_sidebar_search').hide();
    $('#layout_sidebar_basket').hide();    
    $('#layout_sidebar_newsletter').hide();
}

function showOfferLayou(){
    hideAll();    
    $('#goBack').show();
    $('#slider').show();
    $('#imageGallery').show();
    $('#layout_offer_details').show();
    $('#layout_sidebar_offer_details').show();
    $('#layout_sidebar_basket').show();
    $('#layout_comments').show();
    $('#layout_recomended_offers').show();
    googleMaps();    
}

function hideOfferLayou(){
    $('#slider').hide();
    $('#imageGallery').hide();    
    $('#layout_offer_details').hide();
    $('#layout_sidebar_offer_details').hide();
    $('#layout_sidebar_basket').hide();
    $('#layout_comments').hide();  
    $('#layout_recomended_offers').hide();    
}

function showCheckoutLayout() {
    backQuene.push(3);
    $('#goBack').show();
    hideAll();
    $('#layout_offers').html('').show();
    $('#layout_sidebar_universal').show();
    $('#layout_content_universal').html('').show();  
}

function hideCheckoutLayout() {
    $('#layout_offers').hide();
    $('#layout_sidebar_universal').hide();
    $('#layout_content_universal').hide();
}

var backQuene = new Array();

function goHome(){
    backQuene = new Array();
    backQuene.push(1);
    backQuene.push(1);
    goBack();   
}

function goBack() {    
    hideAll();
    backQuene.pop();
    var num = backQuene.pop();
    switch(num){
        case 1: 
            showIndexLayout(); 
            $('#goBack').hide();
            break;
        case 2: break;
        case 3: showCheckoutLayout(); break;
        default:
            num = num*(-1);
            showOfferLayou();
            loadOfferDetails(num);
    }
}

/* === === */

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

function googleMaps() { //https://developers.google.com/maps/
    var mapOptions = {
        center: new google.maps.LatLng(map_x,map_y),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var markerOptions = {
        position: new google.maps.LatLng(map_x,map_y)
    };
    var marker = new google.maps.Marker(markerOptions);
    marker.setMap(map);
}

