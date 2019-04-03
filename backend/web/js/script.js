var mapboxAccessToken = 'pk.eyJ1IjoiZmViaWxlbnRpbmp5ZyIsImEiOiJjanE0b242dm0xdzdnNGFtc3E3bmxraWZxIn0.-6bpoEcidX0n0MbPFietdQ';
var map = L.map('map').setView([37.8, -96], 4);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxAccessToken, {
    id: 'mapbox.streets'
}).addTo(map);

$.getJSON('http://localhost:8080/tugasAkhir/backend/web/json/JATIM_KAB.json', function(geojson){
	var layer = L.geoJson(geojson).addTo(map);

	map.fitBounds(layer.getBounds());
})
