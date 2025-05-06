<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Map</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <!-- Google Map -->
    <div id="map" style="width: 100%; height: 500px;"></div>

    <script>
        // Function to extract query parameters from the URL
        function getQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                if (pair[0] === variable) {
                    return decodeURIComponent(pair[1]);
                }
            }
            return null;
        }

        // Get the location from the URL
        var location = getQueryVariable("location");

        // Display the Google Map for the location
        if (location) {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8
            });

            // You can use the location parameter to customize the map, e.g., set the center or marker position
            // Example:
            // var marker = new google.maps.Marker({
            //     position: { lat: -34.397, lng: 150.644 },
            //     map: map,
            //     title: location
            // });
        }
    </script>

    <!-- Load the Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
