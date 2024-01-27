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

    fetch('get_cities.php')
        .then(response => response.json())
        .then(data => {
            // Find the nearest city
            var nearestCity = findNearestCity(clickLatLng, data.cities);

            // Display city information in a card or alert
            if (nearestCity) {
                displayCityInfo(nearestCity);
            }
        })
        .catch(error => {
            console.error('Error fetching city data:', error);
        });
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

function clearMap(){
    if (routingControl) {
        map.removeControl(routingControl);
    }
    markers.forEach(function (marker) {
        map.removeLayer(marker);
    });

    markers = [];
}

function findNearestCity(clickedLatLng, cities) {
    var nearestCity = null;
    var minDistance = Infinity;

    for (var i = 0; i < cities.length; i++) {
        var cityLatLng = L.latLng(cities[i].latitude, cities[i].longitude);
        var distance = clickedLatLng.distanceTo(cityLatLng);

        if (distance < minDistance) {
            minDistance = distance;
            nearestCity = cities[i];
        }
    }

    return nearestCity;
}

function displayCityInfo(city) {
    // You can customize this part to display the city information in a card or any UI element
    alert('Nearest City: ' + city.name);
}


map.on('click', onMapClick);
map.on('contextmenu', clearMap);