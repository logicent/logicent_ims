var placeSearch, autocomplete;
var componentForm = {
  lat: 'lat()',
  lng: 'lng()'
};

window.initAutocomplete = function () {
  autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')));

  autocomplete.setComponentRestrictions({ 'country': ['ke'] });
  // When a location in the dropdown options is selected, populate the coordinates fields in the row.
  autocomplete.addListener('place_changed', fillInCoordinates);
}

function fillInCoordinates() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  document.getElementById('lat').value = place.geometry.location.lat();
  document.getElementById('lng').value = place.geometry.location.lng();
}
