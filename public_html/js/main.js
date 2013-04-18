/* === LogIn === */
var dropboxOn = 0;

function showDropbox(){
    if(dropboxOn){
        $(".dropbox").slideUp("slow");
        dropboxOn = 0;
    } else {
        $(".dropbox").slideDown("slow");
        dropboxOn = 1;
    }
}

/* === Slider === */

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
    console.log(index);
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