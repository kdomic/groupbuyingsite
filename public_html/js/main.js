var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;

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
    if(selectedOffer===null){
        sliderNum = sliderNum+1;
        selectedOffer = sliderNum;        
        sliderNum = sliderNum%sliderMaxNum;        
    }else{
        sliderNum = selectedOffer;
        timer.pause();
        sliderPlayIcon();
    }
    var index = $('.sliderImgNum a').length-selectedOffer;
    $('.sliderImgNum a').removeClass('current');
    $($('.sliderImgNum a')[index]).addClass('current');
    var data = getOffer(sliderMaxNum-index+1);
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
    $('.sliderOfferBuy a').attr("href", ""+data[0]);
    $('.sliderOfferFriend a').attr("href", ""+data[0]);    
    $('.sliderOfferBuy h1').fadeOut(time).fadeIn(time);
    $('.sliderOfferBuy a').fadeOut(time).fadeIn(time);    
    $('.sliderOfferTime h1').fadeOut(time).fadeIn(time);
}

/* === OFFERS ==== */

var initOfferNum = 3;
var currentOfferNum = 5; //prve 4 su za gore!

function initOffers(){
    initSlider();
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
<img src="'+data[12]+'" alt="slika" />\
<div>\
<h1>'+data[1]+'</h1>\
<h2>'+data[2]+'</h2>\
<div class="down">\
<div class="price"> <h3>Plaćaš</h3> <h4>'+data[3]+'</h4>  </div>\
<div class="discount"> <h3>Štediš</h3> <h4>'+data[5]+'</h4> </div>\
<div class="time"> <h3>Vrijedi još</h3> <h4>'+data[11]+'</h4> </div>\
<div class="more"> <a href="'+data[0]+'"><img src="images/info.png" alt="Info" /></a> </div>\
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
function sessionCheck () {
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
    $('#inputLozinkaP').keypress(function(e) {if(e.which == 13){loginUser();}
});
});

/* === OTHER ===*/

function error() {
    document.location.reload(true);
}

function CheckOIB(oib) { //Preuzeto sa: http://v2009.dizzy.hr/oib/
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