$(document).ready(function(){
	var mapboxAccessToken = 'pk.eyJ1IjoiZmViaWxlbnRpbmp5ZyIsImEiOiJjanE0b242dm0xdzdnNGFtc3E3bmxraWZxIn0.-6bpoEcidX0n0MbPFietdQ';
	var map = L.map('map',{
		zoom 	: 7.5,
		minZoom	: 7.5
	})
		;

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxAccessToken, {
	    id: 'mapbox.streets'
	}).addTo(map);

	$.getJSON('http://localhost:8080/tugasAkhir/backend/web/json/PROVINSI_JAWA_TIMUR.json', function(geojson) {
		$('#map-dropdown').on('change', function(){
			var val = $(this).val();

			$.get('http://localhost:8080/tugasAkhir/backend/web/api/' + val, function(data) {
				renderMap(val, JSON.parse(data));
			});
		}).trigger('change');

		//create layer group
		var layerGroup = L.layerGroup().addTo(map);
		var legend = L.control({position: 'bottomright'});

		var renderMap = function (type, data) {

			//Clear Layer & controls
			layerGroup.clearLayers();
			map.removeControl(legend);

			var nilai = $(data).map((i, e) => parseFloat(e.value)).get(),
				min = Math.min.apply(null, nilai),
    			max = Math.max.apply(null, nilai);

    		var style = function (feature) {
    			var selected = data.find(x => x.id == (feature.properties.PROVNO.toString() + feature.properties.KABKOTNO.toString()));
			    return {
			        fillColor: getColor(selected.value),
			        weight: 2,
			        opacity: 1,
			        color: 'white',
			        dashArray: '3',
			        fillOpacity: 0.7
			    };
			}

			var getColor = function (d) {
				var bagi = (max - min) / 3,
					batas1 = min + (1 * bagi),
					batas2 = min + (2 * bagi);
				
				//merah, hijau, kuning 
			    return d >= min && d < batas1 		? '#E31A1C' : 
			           d >= batas1 && d < batas2  	? '#F2F21E' : 
			           								  '#41F21E';
			}

			var highlightFeature = function highlightFeature(e) {
			    var layer = e.target;
			    layer.openPopup();
			    layer.setStyle({
			        weight: 5,
			        color: '#666',
			        dashArray: '',
			        fillOpacity: 0.5
			    });

			    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			        layer.bringToFront();
			    }
			}

			var resetHighlight = function resetHighlight(e) {
				layer.closePopup();
 			   	layer.resetStyle(e.target);
			}

			var onEachFeature = function onEachFeature(feature, layer) {
				var selected = data.find(x => x.id == (feature.properties.PROVNO.toString() + feature.properties.KABKOTNO.toString()));

				var toTitle = function(string) {
					string = string.replace('-', ' ').toLowerCase().split(' ');
					for (var i = 0; i < string.length; i++) {
    					string[i] = string[i].charAt(0).toUpperCase() + string[i].slice(1); 
    				}
    				return string.join(' ');
				}

				layer.bindPopup('<p><span style="font-weight: bold;">' + selected.nama + '</span><br>' + toTitle(type) + ' : ' + parseFloat(selected.value).toFixed(2) + '</p>');
			    layer.on({
			        mouseover: highlightFeature,
			        mouseout: resetHighlight,
			    });
			}


			// legend----------------------------------------------------------------------------------

			legend.onAdd = function (map) {

			    var div = L.DomUtil.create('div', 'legend box box-info'),
			        // grades = [0, 10, 20, 50, 100, 200, 500, 1000],
			        labels = type == 'kualitas-pendidikan' ? ["Sangat Baik", "Baik", "Kurang Baik"] : ["Sangat Tinggi", "Tinggi", "Rendah"],
			        colors = ['#41F21E', '#F2F21E', '#E31A1C'], 
			        legendBody = '';

			    for (var i = 0; i < labels.length; i++) {
			        legendBody += '<li><i style="background:' + colors[i] + '"></i> ' + labels[i] + '</li>';
			    }

			    div.innerHTML += '<div class="box-body">'
			     + '<ul style="list-style-type: none;padding-left: 0px;">'
			     + legendBody
			     + '</ul>'
			     + '</div>';

			    return div;
			};

			legend.addTo(map);


			var layer = L.geoJson(geojson, {
			    style: style,
			    onEachFeature: onEachFeature
			}).addTo(layerGroup);


			// var layer = L.geoJson(geojson).addTo(map);
			map.fitBounds(layer.getBounds(), {
				paddingTopLeft		: [100, -200]
				// paddingBottomRight	: [-50, 50]
			});
		}
	});
});


