/* === LAYOUTS === */

function hideAll(){

}

/* === ONLOAD === */
$(document).ready(function(){
	hideAll();
});


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