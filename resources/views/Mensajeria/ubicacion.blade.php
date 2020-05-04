
<link rel="stylesheet" href="{{asset("assets/MAP/leaflet.css")}}"/>


<table style="width: 100%;
          margin-right: auto;
          margin-left: auto;
          display: inline;
          float: left;
          text-align: center;" >
         <div id="mapid" style=" margin-right: auto;
         margin-left: auto; width: 400px; height: 250px; position: relative;"></div>
</table><br>
<script src="{{asset("assets/MAP/leaflet.js")}}"></script>
<script>
var mymap = L.map('mapid').setView([9.9789728,-85.6605546], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/streets-v11'
}).addTo(mymap);
var mark = L.marker([{{$Latitud}},{{$Longitud}}]).addTo(mymap);
function onMapClick(e) {
        mark.setLatLng(e.latlng);
        var Longitud = document.getElementById("lg");
        var latitud = document.getElementById("lt");
        latitud.value = mark.getLatLng().lat;
        Longitud.value = mark.getLatLng().lng;
      }
mymap.on('click', onMapClick);
</script>