<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 85%;
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
    <a href="viewshop.php"><button>Back</button></a>
    <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        var map, infoWindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: <?php echo $_GET['lat'];?>, lng: <?php echo $_GET['lng'];?> },
                zoom: 6
            });
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: <?php echo $_GET['lat'];?>,
                        lng: <?php echo $_GET['lng'];?> 
                    };
                    console.log(pos);
                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);

                    var map1 = new google.maps.Map(
                        document.getElementById('map'), { zoom: 6, center: pos });
                    // The marker, positioned at Uluru
                    var marker = new google.maps.Marker({
                        position: pos, map: map1

                    });

                    map.addListener('center_changed', function () {
                        // 3 seconds after the center of the map has changed, pan back to the
                        // marker.
                        window.setTimeout(function () {
                             map.panTo(marker.getPosition());
                            console.log(marker.position.lat(), marker.position.lng());
                            var obj = { lat: marker.position.lat(), lng: marker.position.lng() };
                            console.log(obj.lat);
                        }, 2000);
                    });


                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE5FltkyvmP3bBcv4iQN555pjA5lL6KyM&callback=initMap">
    </script>
</body>
</html>