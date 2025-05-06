<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Setting up body styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/img/recycling.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0; /* Reset body margin */
            padding: 0; /* Reset body padding */
            height: 100vh; /* Set body height to viewport height */
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            position: relative; /* Set position relative for containing elements */
            overflow: auto; /* Allow scrolling if content exceeds viewport */
        }

        /* Navigation bar styles */
        .navbar {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999; /* Ensure navigation bar stays on top */
        }

        /* Navigation bar links */
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Contact information container styles */
        .contact-info {
            max-width: 50%; /* Adjusted max-width */
            width: 100%;
            padding: 20px;
            position: relative; /* Set position relative */
            z-index: 1; /* Ensure address blocks appear above the background */
            height: auto; /* Let the height adjust based on content */
            max-height: calc(100vh - 120px); /* Subtract height of navbar for scrollable area */
        }

        /* Styles for address blocks */
        .address-block {
            margin-bottom: 30px; /* Increased margin bottom */
            padding: 20px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            color: #333; /* Text color */
            cursor: pointer;
             /* Change cursor to pointer on hover */
        }
        .address-block:hover {
            transform: translateY(-5px);
        }

        /* Odd and even address block background colors */
        .address-block:nth-child(odd) {
            background-color: #f0f5ff; /* Light blue */
        }
        .address-block:nth-child(even) {
            background-color: #fff3f3; /* Light pink */
        }

        /* Title styles */
        .address-block h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        /* Address styles */
        .address {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }

        /* Phone list styles */
        .phone-list {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        /* Phone item styles */
        .phone-item {
            font-size: 16px;
            color: #777;
            margin-bottom: 5px;
        }

        /* Google Map styles */
        .map-container {
            display: none; /* Initially hide the map */
            width: 100%;
            max-width: 500px; /* Adjust the width of the map */
            height: 300px; /* Adjust the height of the map */
            margin-top: 20px; /* Adjust the distance between the map and the address blocks */
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <div class="navbar">
        <a href="http://localhost/cscorner/waste-management-system-main/waste-management-system-main/index.html">Home</a>
    </div>

    <!-- Contact information -->
    <div class="contact-info">
        <!-- Address blocks -->
        <div class="address-block" onclick="showMap('BELMAN')">
            <h2>BELMAN</h2>
            <div class="address">Belman, Karnataka 576111</div>
            <ul class="phone-list">
                <li class="phone-item">Phone 1: +91 9955773322</li>
                <li class="phone-item">Phone 2: +91 8822663377</li>
            </ul>
        </div>
        <div id="map-belman" class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15539.760148631001!2d74.86225594060818!3d13.166180738456765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbcac0f18f7d045%3A0x76792a4e157e00ad!2sBelman%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1711366295406!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <br>
       
        <!-- Address blocks -->
        <div class="address-block" onclick="showMap('karkala')">
            <h2>KARKALA</h2>
            <div class="address">Karkala Town Municipality Council, Main Rd, opposite</div>
            <ul class="phone-list">
                <li class="phone-item">Phone 1: +91 9889786753</li>
                <li class="phone-item">Phone 2: +91 9807866534</li>
            </ul>
        </div>
        <!-- Add other address blocks here -->
        
        <!-- Google Map -->
    
        <div id="map-karkala" class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31073.446984293107!2d74.97724432752244!3d13.213958255632788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbb564562e922d1%3A0x2488ca62b343f974!2sKarkala%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1711366400152!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <br>
    <div class="address-block" onclick="showMap('nitte')">
            <h2>NITTE</h2>
            <div class="address">Near nitte, Nitte, Nitte Parapady, Karnataka 574110</div>
            <ul class="phone-list">
                <li class="phone-item">Phone 1: +91 8998765453</li>
                <li class="phone-item">Phone 2: +91 9098878976</li>
            </ul>
        </div>
        <div id="map-nitte" class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15538.506519646357!2d74.92917724061303!3d13.185925436485343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbcaa27c6232803%3A0xe385854f69800a5b!2sNitte%2C%20Karnataka%20574110!5e0!3m2!1sen!2sin!4v1711366664953!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <br>
    <div class="address-block" onclick="showMap('udupi')">
            <h2>UDUPI</h2>
            <div class="address">Udupi Zilla Panchayat Office, Brahmagiri, Udupi, Karnataka 576101</div>
            <ul class="phone-list">
                <li class="phone-item">Phone 1: +91 7890657789</li>
                <li class="phone-item">Phone 2: +91 9089907656</li>
            </ul>
        </div>
        <div id="map-udupi" class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62116.7271648416!2d74.70589123950015!3d13.331888796434576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbcbb69938f41cf%3A0xcccc99e431850143!2sUdupi%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1711366802489!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" allowfullscreen="" loading="lazy"></iframe>
    </div><br>
        </div>
    <script>
        function showMap(address) {
            // Hide all map containers first
            var mapContainers = document.querySelectorAll('.map-container');
            mapContainers.forEach(function(container) {
                container.style.display = 'none';
            });

            // Show the map corresponding to the clicked address
            var mapId = 'map-' + address.toLowerCase().replace(/\s/g, '-');
            var map = document.getElementById(mapId);
            if (map) {
                map.style.display = 'block';
            }
        }
    </script>
</body>
</html>
