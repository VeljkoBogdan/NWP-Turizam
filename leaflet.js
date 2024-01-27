var map = L.map('map').setView([0, 0], 2);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

var routingControl;
var markers = [];

function onMapClick(e) {
    var clickLatLng = e.latlng;

    var marker = L.marker(clickLatLng).addTo(map);
    markers.push(marker);

    updateRoutingControl();
}

function updateRoutingControl() {
    // Remove old routing control
    if (routingControl) {
        map.removeControl(routingControl);
    }

    // Create a route between all markers
    if (markers.length >= 2) {
        var waypoints = markers.map(function (marker) {
            return L.latLng(marker.getLatLng().lat, marker.getLatLng().lng);
        });

        routingControl = L.Routing.control({
            waypoints: waypoints
        }).addTo(map);
    }
}

function onMapDoubleClick(){
    if (routingControl) {
        map.removeControl(routingControl);
    }
    markers.forEach(function (marker) {
        map.removeLayer(marker);
    });

    markers = [];
}

map.on('click', onMapClick);
map.on('contextmenu', onMapDoubleClick);