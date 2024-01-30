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
        document.getElementById("saveRoute").style.display = "none";
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

    document.getElementById('cityCardsContainer').innerHTML = '';
    document.getElementById("saveRoute").style.display = "none";
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
    // Create a new card element
    var cityCard = document.createElement('a');
    cityCard.className = 'recommended-cities-a';
    cityCard.href = `city.php?id=${city.id_city}`;

    // Update the content of the card
    cityCard.innerHTML = `
            <div class="recommended-cities city-card">
                <h2>${city.name}, ${city.country}</h2>
                <p>Population: ${city.population}</p>
            </div>
    `;

    var container = document.getElementById('cityCardsContainer');
    container.insertBefore(cityCard, container.firstChild);


}

function saveRoute(){
    var waypoints = markers.map(function (marker) {
        return L.latLng(marker.getLatLng().lat, marker.getLatLng().lng);
    });

    alert(waypoints);
}


map.on('click', onMapClick);
map.on('contextmenu', clearMap);