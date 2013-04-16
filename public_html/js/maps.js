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