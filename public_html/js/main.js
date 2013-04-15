/* === Slider === */

function sliderImgChange(img){
    var time = 400;
    $('.sliderImg img').css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0}, time);
    $('.sliderImg img').delay(time+10)
                       .queue(function(next){ 
                            $(this).attr("src", img.src);
                            $(this).css({opacity: 0, visibility: "visible"}).animate({opacity: 1.0}, time);
                            next(); 
                        });                    
}

function slideOfferChange() {
    var time = 400;
    $('.sliderOfferBuy h2').fadeOut(time, function() { $(this).text('1').fadeIn(time); });
    $('.sliderOfferDiscount h2.u').fadeOut(time, function() { $(this).text('2').fadeIn(time); });
    $('.sliderOfferDiscount h2.p').fadeOut(time, function() { $(this).text('3').fadeIn(time); });
    $('.sliderOfferDiscount h2.v').fadeOut(time, function() { $(this).text('4').fadeIn(time); });
    $('.sliderOfferBought h1').fadeOut(time, function() { $(this).text('5').fadeIn(time); });
    $('.sliderOfferBought h2').fadeOut(time, function() { $(this).text('6').fadeIn(time); });
    $('.sliderOfferBought meter').css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0}, time);
    $('.sliderOfferBought meter').delay(time+10)
                                 .queue(function(next){ 
                                     $('.sliderOfferBought meter').attr("value", "30");
                                     $('.sliderOfferBought meter').attr("min", "0");
                                     $('.sliderOfferBought meter').attr("max", "100");
                                     $(this).css({opacity: 0, visibility: "visible"}).animate({opacity: 1.0}, time);
                                     next(); 
                                 });    
    $('.sliderOfferTime h2').fadeOut(time, function() { $(this).text('7').fadeIn(time); });
    $('.sliderOfferBought meter').attr("min", "0");
    $('.sliderOfferBuy a').attr("href", "javascript:aletr(1)");
    $('.sliderOfferFriend a').attr("href", "javascript:aletr(2)");    
}

/* === Google Maps === */

var mapOptions = {
    center: new google.maps.LatLng(45.396838, 15.430899),
    zoom: 12,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById('map'), mapOptions);

var markerOptions = {
    position: new google.maps.LatLng(45.396838, 15.430899)
};
var marker = new google.maps.Marker(markerOptions);
marker.setMap(map);