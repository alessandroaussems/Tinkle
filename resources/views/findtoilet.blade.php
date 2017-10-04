@extends('layouts.app')
@section('content')
    <div style="width:100%; height: 92.5%; position: absolute;">
    <div id="map" style="clear:both; height:100%;"></div>
    </div>
    <script>
        function initMap(position) {
            var uluru = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
        var apiGeolocationSuccess = function(position) {
            alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
        };

        var tryAPIGeolocation = function() {
            jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
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
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJpEPPNdqKVTdQAqtDhKL7YQzUYU8aU-8&callback=initMap">
    </script>
@endsection