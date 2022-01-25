document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelectorAll('#map').length > 0)
  {
    if (document.querySelector('html').lang)
      lang = document.querySelector('html').lang;
    else
      lang = 'en';

    var js_file = document.createElement('script');
    js_file.type = 'text/javascript';
    js_file.src = 'https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyC74AxXWkG258TIgdzrRsJ7TTk0uF9MoAc&language=' + lang;
    document.getElementsByTagName('head')[0].appendChild(js_file);
  }
});

var map;

function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -0.023559, lng: 37.90619300000003},
        scrollwheel: false,
        zoom: 6
    });

    var geoMarkers = JSON.parse(markers);
    var infoWin = new google.maps.InfoWindow();

    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    var location_markers = geoMarkers.map(function(location, index) {
        var location_marker = new google.maps.Marker({
            position: location,
            title: location.name
        });
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">'+location.name+'</h1>'+
            '<div id="bodyContent">'+
            '</div>'+
            '</div>';

        google.maps.event.addListener(location_marker, 'click', function(evt) {
            infoWin.setContent(contentString);
            infoWin.open(map, location_marker);
        })
        return location_marker;
    });
    // Add a marker clusterer to manage the markers.
    var markerCluster = new MarkerClusterer(map, location_markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

    // Setting individual markers
    // geoMarkers.forEach (function(item, index, array)
    // {
    //     // Create a marker and set its position.
    //     var marker = new google.maps.Marker({
    //         map: map,
    //         position: item,
    //         title: item.name
    //     });
}
