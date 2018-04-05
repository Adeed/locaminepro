function initMap() {
    var qgc = {lat: 33.670933, lng: 72.996772};
    var map = new google.maps.Map(document.getElementById('map'),{
        zoom: 13,
        center: qgc
    });
    var marker = new google.maps.Marker({
        position: qgc,
        map: map
    });
}