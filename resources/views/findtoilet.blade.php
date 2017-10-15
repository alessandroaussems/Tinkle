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
                center: uluru,
                fullscreenControl: false,
                streetViewControl: false,
                mapTypeControl: false
            });
            var currentImage="https://tinkletoilets.com/public/img/cp.png";
            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                icon: currentImage
            });
            var image = 'https://tinkletoilets.com/public/img/maplogo.png';
                var markers_toilet=[];
                var contents_toilets = [];
                var infowindows_toilets = [];
            for(var i=0; i < toilets.length; i++)
            {
                markers_toilet[i] = new google.maps.Marker({
                    position: {lat: Number(toilets[i]["lat"]), lng: Number(toilets[i]["long"])},
                    map: map,
                    title: toilets[i]["title"],
                    icon: image
                });

                markers_toilet[i].index=i;

                contents_toilets[i] = '<div id="content">'+
                '<h4 class="text-center">'+toilets[i]["title"]+'</h4>'+
                '<img src="<?php echo asset("img/toiletuploads/") ?>'+"/"+toilets[i]["picture"]+
                '"</div>'+

                '<a href="/toilets/'+ toilets[i]["id"] +'"  class="btn btn-primary more " >More info</a>'+
                '</div>';

                 infowindows_toilets[i] = new google.maps.InfoWindow({
                    content: contents_toilets[i]
                });

                google.maps.event.addListener(markers_toilet[i], 'click', function() {
                    infowindows_toilets[this.index].open(map,markers_toilet[this.index]);
                    map.panTo(markers_toilet[this.index].getPosition());
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
            initMap({coords: {latitude: position.coords.latitude, longitude: position.coords.longitude}})
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
            src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBgNloFNpl_OBS75FoR4UVRhPYUEQw0qkY">
    </script>
@endsection
