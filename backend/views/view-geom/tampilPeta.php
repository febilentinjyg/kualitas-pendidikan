<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polygon</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

    <script src="viewmap.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSXKjURGk8oGBVaqSD20PWa6oisvmcQRA&callback=initMap"
    async defer></script>
  </body>
</html>