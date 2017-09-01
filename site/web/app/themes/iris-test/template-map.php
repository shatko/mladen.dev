<?php
/**
 * Template Name: Map Template
 */
?>






<style>

  #map {
    height: 600px;
  }

    .gm-style-iw {
      overflow: visible;
    }
    .infowindow {
      width: 200px;
      height: 200px;
    }




</style>

<div id="map"></div>
<script>

editInfowindow = function() {};

var infoWindows = [];
var map;
var styles;

function closeWindow() {
  for(var i = 0; i < infoWindows.length; i++) {
    infoWindows[i].close();
  }
  map.setOptions({styles: styles});
}

function initMap() {
  var center = {lat: 49.123024, lng: 10.132054};

  map = new google.maps.Map(document.getElementById('map'), {
    center: center,
    zoom: 8
  });



  styles = [
    {
      "featureType": "all",
      "elementType": "all",
      "stylers": [
        {
          "hue": "#ff8d00"
        },
        {
          "saturation": "-40"
        },
        {
          "lightness": "10"
        }
      ]
    },
    {
      "featureType": "administrative.country",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "administrative.province",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "administrative.locality",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "administrative.neighborhood",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "administrative.land_parcel",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [
        {
          "lightness": "0"
        }
      ]
    },
    {
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [
        {
          "saturation": "-50"
        }
      ]
    },
    {
      "featureType": "landscape.natural",
      "elementType": "geometry",
      "stylers": [
        {
          "saturation": "5"
        }
      ]
    },
    {
      "featureType": "landscape.natural.terrain",
      "elementType": "geometry",
      "stylers": [
        {
          "saturation": "-20"
        }
      ]
    },
    {
      "featureType": "landscape.natural.terrain",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
          "saturation": "-60"
        },
        {
          "lightness": "-10"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [
        {
          "visibility": "on"
        },
        {
          "saturation": "-75"
        },
        {
          "lightness": "-10"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [
        {
          "visibility": "on"
        },
        {
          "saturation": "-75"
        },
        {
          "weight": "0.5"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels",
      "stylers": [
        {
          "saturation": "-75"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "all",
      "stylers": [
        {
          "color": "#c1bdb5"
        },
        {
          "lightness": "35"
        }
      ]
    }
  ];

  var stylesGrey = [
    {
      "featureType": "all",
      "elementType": "all",
      "stylers": [
        {
          "hue": "#ff8d00"
        },
        {
          "saturation": "-90"
        },
        {
          "lightness": "-40"
        }
      ]
    },
    {
      "featureType": "administrative.country",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "administrative.province",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "administrative.locality",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "administrative.neighborhood",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "administrative.land_parcel",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "landscape.natural.terrain",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "on"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels",
      "stylers": [
        {
          "saturation": "-75"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    }
  ];

  map.setOptions({styles: styles});


  // First Pin
  var icon1 = {
    url: 'http://plaza.fp-hotelier.com/wp-content/themes/plaza.dev/dist/images/pin-stadt-villa.png',
    size: new google.maps.Size(39, 56),
    scaledSize: new google.maps.Size(39, 56),
    anchor: new google.maps.Point(19, 56)
  };
  // Second Pin
  var icon2 = {
    url: 'http://plaza.fp-hotelier.com/wp-content/themes/plaza.dev/dist/images/pin-plaza-forchheim.png',
    size: new google.maps.Size(22, 32),
    scaledSize: new google.maps.Size(22, 32),
    anchor: new google.maps.Point(11, 32)
  };



  var marker;

  infowindow = new google.maps.InfoWindow();

  //First marker
  marker = new google.maps.Marker({
  map: map,
  position: {lat: 49.123024, lng: 10.132054},
  title: 'TITLE',
  label: 'label1',
  icon: icon1
  });

  marker.content = '<div class="infowindow">' +
    '<p>Lorem Ipsum</p>' +
    '<div class="close-window" onclick="closeWindow();">close</div>' +
  '</div>';


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(this.content);
    infowindow.open(map, this);
    editInfowindow();
    map.setOptions({styles: stylesGrey});
  });

  //Second marker
  marker = new google.maps.Marker({
  map: map,
  position: {lat: 49.523024, lng: 10.532054},
  title: 'TITLE',
  label: 'label2',
  icon: icon2
  });

  marker.content = '<div class="infowindow">' +
    '<p>Lorem Ipsum2</p>' +
    '<div class="close-window" onclick="closeWindow();">close</div>' +
  '</div>';


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(this.content);
    infowindow.open(map, this);
    editInfowindow();
    map.setOptions({styles: stylesGrey});
  });



  infoWindows.push(infowindow);

  //Closes transparent overlay
  google.maps.event.addListener(map, 'click', function() {
    closeWindow();
  });


}
</script>


<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQzYb980i8Vzz0Lm9gnMqHdYQyTf50ZAk&callback=initMap"
async defer></script>
