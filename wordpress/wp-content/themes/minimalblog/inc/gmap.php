<?php
/**
 * Display Google Map
 */
class minimalblog_google_map
{
	
	function __construct()
	{
		if (is_page_template('contact.php')) :
		  add_action( 'wp_enqueue_scripts', array($this, 'minimalblog_google_map_scripts') );
		endif;
	}
	public function minimalblog_google_map_scripts(){
		$map_api_kye = get_theme_mod( 'map_api_key', 'AIzaSyCn4uayw359fjMh4P9i2rKKZYHzXaqTRNs' );
		$latitude = get_theme_mod( 'latitude', '23.7063338' );
		$longitude = get_theme_mod( 'longitude', '90.4932206' );
		wp_enqueue_script("minimalblog-google-map-api", "https://maps.googleapis.com/maps/api/js?key=$map_api_kye");
		$data = <<<EOD
  function initialize(){
    var myLatLng = {lat: $latitude, lng: $longitude}; // Insert Your Latitude and Longitude For Footer Wiget Map
    var mapOptions = {
      center: myLatLng,
      zoom: 15,
      disableDefaultUI: true,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles:[
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "all",
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
                "saturation": -100
            },
            {
                "lightness": 65
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": "50"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "30"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "40"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#ffff00"
            },
            {
                "lightness": -25
            },
            {
                "saturation": -97
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "lightness": -25
            },
            {
                "saturation": -100
            }
        ]
    }
]
    };
    // For Footer Widget Map
    var map = new google.maps.Map(document.getElementById("gmap"), mapOptions);
    var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
    });
  }
google.maps.event.addDomListener(window, 'load', initialize);
EOD;
		
		wp_add_inline_script( 'minimalblog-active', $data, 'after' );
	}
}

$init_map = new minimalblog_google_map();