

function initMap() {
    
    let mapOptions = {
        center: { lat: 40.7413549, lng: -73.9980244 },
        zoom: 12,
    }
    let map = new google.maps.Map(document.getElementById('map'), mapOptions);
    
    let markerOptions = {
        position: ( 40.7413549, -73.9980244 ),
        map: map
    }

    let marker = new google.maps.Marker(markerOptions)
}
