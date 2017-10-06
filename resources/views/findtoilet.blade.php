@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div style="width:100%; height: 92.5%; position: absolute;">
    <div id="map" style="clear:both; height:100%;"></div>
    </div>
    <script>
            <?php
            $js_array = json_encode($toilets);
            echo "var toilets = ". $js_array . ";\n";
            ?>
        function initMap(position) {
            var uluru = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var currentImage="http://tinkle.dev/img/cp.png";
            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                icon: currentImage
            });
            var image = 'http://tinkle.dev/img/MapLogo.png';
            for(var i=0; i < toilets.length; i++)
            {
                var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="title">'+toilets[i]["title"]+'</h1>'+
                '<a href="/toilets/'+ toilets[i]["id"] +'">More information!</a>'+
                '</div>';

                var infowindow = new google.maps.InfoWindow({

                    content: contentString
                });

                var toiletMarker = new google.maps.Marker({
                    position: {lat: Number(toilets[i]["lat"]), lng: Number(toilets[i]["long"])},
                    map: map,
                    title: toilets[i]["title"],
                    icon: image
                });
                toiletMarker.addListener('click', function() {
                    infowindow.open(map, toiletMarker);
                });

            }
        }
        var tryAPIGeolocation = function() {
            jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyBgNloFNpl_OBS75FoR4UVRhPYUEQw0qkY",
            function(success) {
                initMap({coords: {latitude: success.location.lat, longitude: success.location.lng}})
            })
                .fail(function(err) {
                    alert("API Geolocation error! \n\n"+err);
                });
        };

        var browserGeolocationSuccess = function(position) {
            alert("Browser geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
        };

        var browserGeolocationFail = function(error) {
            switch (error.code) {
                case error.TIMEOUT:
                    alert("Browser geolocation error !\n\nTimeout.");
                    break;
                case error.PERMISSION_DENIED:
                    if(error.message.indexOf("Only secure origins are allowed") == 0) {
                        tryAPIGeolocation();
                    }
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Browser geolocation error !\n\nPosition unavailable.");
                    break;
            }
        };
        var tryGeolocation = function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    browserGeolocationSuccess,
                    browserGeolocationFail,
                    {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
            }
        };

        tryGeolocation();
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBgNloFNpl_OBS75FoR4UVRhPYUEQw0qkY&callback=initMap">
    </script>
@endsection