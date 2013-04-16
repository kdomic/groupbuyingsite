/* === Slider === */

function dajPodatke()
{
    $.ajax({
        url: 'data.php',
        type: 'GET',
        dataType: 'xml',
        success: function(xml) {
            var inHTML = '<select id="kolegij" name="kolegij" size="20">';
            $(xml).find('name').each(function() {
                inHTML += '<option value="' 
                        + $(this).attr('studij') 
                        + "#" + $(this).attr('sifra') + '">' +
                        $(this).attr('studij') + " / " + $(this).text() + '</option>';
            });
            inHTML += '</select>';
            $('#cilj')[0].innerHTML = inHTML;
        }
    });
}
/*
console.log($(j).attr("id"));
console.log($(j).find("name").attr("lang"));
*/
function sliderChange(img){
    var data = new Array();
    $.ajax({
        url:'sliderOffers.xml',
        type: 'GET',
        dataType: 'xml',
        success: function(xml) {
            var offer = $(xml).find('offer[id=1]');
            $(offer).each(function(){
                $(this).children().each(function(){
                    console.log(this);
                });
            });
        }
    });

    sliderImgChange("http://localhost:8383/groupbuyingsite/offers/ponuda_00042/01.jpg");
    //slideOfferChange(data);
}

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

function slideOfferChange(data) {
    var time = 400;
    $('.sliderCaption h1').fadeOut(time, function() { $(this).text(data[0]).fadeIn(time); });
    $('.sliderCaption h2').fadeOut(time, function() { $(this).text(data[1]).fadeIn(time); });    
    $('.sliderOfferBuy h2').fadeOut(time, function() { $(this).text(data[2]).fadeIn(time); });
    $('.sliderOfferDiscount h2.u').fadeOut(time, function() { $(this).text(data[3]).fadeIn(time); });
    $('.sliderOfferDiscount h2.p').fadeOut(time, function() { $(this).text(data[4]).fadeIn(time); });
    $('.sliderOfferDiscount h2.v').fadeOut(time, function() { $(this).text(data[5]).fadeIn(time); });
    $('.sliderOfferBought h1').fadeOut(time, function() { $(this).text(data[6]).fadeIn(time); });
    $('.sliderOfferBought h2').fadeOut(time, function() { $(this).text(data[7]).fadeIn(time); });
    $('.sliderOfferBought meter').css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0}, time);
    $('.sliderOfferBought meter').delay(time+10)
                                 .queue(function(next){ 
                                     $('.sliderOfferBought meter').attr("value", data[8]);
                                     $('.sliderOfferBought meter').attr("max", data[9]);
                                     $(this).css({opacity: 0, visibility: "visible"}).animate({opacity: 1.0}, time);
                                     next(); 
                                 });    
    $('.sliderOfferTime h2').fadeOut(time, function() { $(this).text(data[10]).fadeIn(time); });
    $('.sliderOfferBuy a').attr("href", "javascript:aletr(1)");
    $('.sliderOfferFriend a').attr("href", "javascript:aletr(2)");    
}

