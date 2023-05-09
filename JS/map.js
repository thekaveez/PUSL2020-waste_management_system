// // Initialize and add the map


async function initMap() {
  // The location of Uluru
  const position = { lat: 6.820795, lng: 80.03944 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerView } = google.maps.importLibrary("marker");

  // The map, centered at Uluru
 var map = new Map(document.getElementById("map"), {
    zoom: 12,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at Uluru
  const marker = new google.maps.marker({
    map: map,
    position: position,
    title: "Uluru",
  });
}

initMap();

// function initMap() {
    
//     let mapOptions = {
//         center: { lat: 40.7413549, lng: -73.9980244 },
//         zoom: 12,
//     }
//     let map = new google.maps.Map(document.getElementById('map'), mapOptions);
    
//     let markerOptions = {
//         position: ( 40.7413549, -73.9980244 ),
//         map: map
//     }

//     let marker = new google.maps.Marker(markerOptions)
// }
