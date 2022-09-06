var map = L.map('map').setView([49.074644, 6.098270], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

L.marker([49.074644, 6.098270]).addTo(map)
    .bindPopup('Restaurant AQUA')
    .openPopup();