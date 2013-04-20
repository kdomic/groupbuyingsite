var emailPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;

/* === DROPBOX === */

function showDropbox(index){
    $(".dropbox"+index).slideToggle("slow");
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
    data.push($('#inputEmailP').val());
    data.push($('#inputLozinkaP').val());
    if(data[0].length===0 || data[1].length===0 || !emailPattern.test(data[0])){        
        $('#loginStatus span').html("Uneseni podatci nisu ispravni");
        $('#loginStatus').slideDown("slow");
        return false;
    }
    $('#loginStatus').slideUp("slow");
    $('#loginStatus span').html("");
    $('#btnLogin').attr("disabled", "disabled");
    var xml = sendToPhp(data,"includes/login.php");
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