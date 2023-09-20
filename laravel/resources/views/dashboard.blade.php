<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        body {
            font-family: "Roboto";
            margin: 0;
            padding: 0;
            overflow-y: hidden;
        }

        .navbar {
            background-color: #C51F1A;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        #map {
            margin-top: -60px;
            width: 937px;
            height: 343px;
            flex-shrink: 0;
            margin-left: 20px;
        }

        /* Modifikasi ukuran teks */
        #map-title {
            margin-left: 20px;
            font-family: 'Roboto';
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }

        #map-title2 {
            margin-left: 1000px;
            font-family: 'Roboto';
            font-size: 15px;
            font-weight: 700;
            margin-top: 35px;
        }
        
        .dark-mode {
            top: 10px;
            right: 10px;
        }

        .dark-mode label {
            display: inline-block;
            vertical-align: middle;
            font-size: 24px;
        }

        .dark-mode input[type="checkbox"] {
            display: none;
        }

        .dark-mode label::before {
            margin-left: 1450px;
            margin-top: -1020px;
            content: "☀️"; /* Emoji matahari (☀️) */
            display: inline-block;
            vertical-align: middle;
            transform: translateY(4px);
            cursor: pointer;
        }

        .dark-mode input:checked + label::before {
            content: "🌙"; /* Emoji bulan (🌙) */
        }

        /* Gaya untuk dark mode */
        .dark-mode body {
            background-color: #333;
            color: white;
        }

        .dark-mode .navbar {
            background-color: #00293C;
        }

        .dark-mode .navbar a {
            color: white;
        }

        .dark-mode .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .dark-mode #map-title {
            color: rgb(0, 0, 0);
        }

        /* Gaya untuk kotak persegi panjang (alarm box) */
        .alarm-box {
            width: 205px;
            height: 67px;
            border-radius: 20px;
            border: 4px solid red; /* Warna border merah */
            margin-left: 1000px;
            margin-top: -600px; /* Spasi di atas kotak */
            padding: 3px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .alarm-box-title {
            font-size: 14px;
            font-weight: bold;
            margin-left: 100px;
            transform: translateX(-50%);
        }

        .alarm-1 {
            width: 205px;
            height: 67px;
            border-radius: 20px;
            border: 4px solid #FFA500; /* Warna border merah */
            margin-left: 1000px;
            margin-top: 15px; /* Spasi di atas kotak */
            padding: 3px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .alarm-2 {
            width: 205px;
            height: 67px;
            border-radius: 20px;
            border: 4px solid #1499FF; /* Warna border merah */
            margin-left: 1000px;
            margin-top: 15px; /* Spasi di atas kotak */
            padding: 3px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .inventory-text {
            width: 167px;
            height: 14px;
            flex-shrink: 0;
            padding: 10px;
            color: #000;
            font-family: Roboto;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin-left: 10px;
        }

        .summary {
            width: 250px;
            height: 124px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 10px;
            margin-top: 50px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .DC-BSD {
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 290px;
            margin-top: -125px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .DC-TBSIMATUPANG {
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 520px;
            margin-top: -60px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
            z-index: 10;
        }

        .DC-BUARAN {
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 520px;
            margin-top:13px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .DC-SOLOBARU {
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 750px;
            margin-top: -55px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
            z-index: -15;
        }

        .DC-GAYUNGAN {
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 290px;
            margin-top: -60px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
            z-index: 13;
        }

        .DC-ARIFINAHMAD {
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 750px;
            margin-top: -125px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
            z-index: 16;
        }

        .DC-SUDIANG{
            width: 205px;
            height: 57px;
            flex-shrink: 0;
            background-color: 4px solid #FEF3F2; /* Warna border merah */
            margin-left: 980px;
            margin-top: -59px; /* Spasi di atas kotak */
            border-radius: 10px;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: bold;
            color: rgb(0, 0, 0);
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgb(0, 0, 0, 0.25);
        }

        .navbar a[href="#home"] {
            margin-left: 60px; 
        }

        .Home{
            margin-left: 120px; 

        }

        .logo{
            width: 37px;
            height: 25px;
            flex-shrink: 0; 
            margin-left: -160px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#Home" class="Home">Home</a>
    <div><img src="IT OPERATION.png" class="logo"></div>
        {{-- <a href="#dashboard">Dacita Dashboard</a>
        <a href="#asset">Asset Management</a>
        <a href="#document">Document</a>
        <a href="#sensor">Sensor</a>
        <a href="#tour">Virtual Tour</a>
        <a href="#setting">Setting</a> --}}
    </div>
    <h3 id="map-title">MAPS DATA CENTER NATIONWIDE</h3>
    <h3 id="map-title2">ALARM</h3>
    <div class="map-container">
        <div id="map"></div>
        <div class="inventory-text">INVENTORY DATA CENTER</div>
    </div>

    <div id="map"></div>

    <!-- Kotak Persegi Panjang (Alarm Box) -->
    <div class="alarm-box">
        <div class="alarm-box-title">Critical</div>
        <hr style="width: 80%; margin: 0 auto; border: 1px solid red;">
    </div>
    
    <div class="alarm-1">Major
    <hr style="width: 80%; margin: 0 auto; border: 1px solid #FFA500;">
    </div>

    <div class="alarm-2">Minor
    <hr style="width: 80%; margin: 0 auto; border: 1px solid #1499FF;">
    </div>

    <div class="summary">SUMMARY</div>
    <div class="DC-BSD">DC BSD</div>
    <div class="DC-TBSIMATUPANG">DC TB Simatupang</div>
    <div class="DC-BUARAN">DC Buaran</div>
    <div class="DC-SOLOBARU">DC Solo Baru</div>
    <div class="DC-GAYUNGAN">DC Gayungan</div>
    <div class="DC-ARIFINAHMAD">DC Arifin Ahmad</div>
    <div class="DC-SUDIANG">DC Sudiang</div>

    <div class="dark-mode">
        <input type="checkbox" id="darkModeToggle">
        <label for="darkModeToggle"></label>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([-6.2088, 106.8456], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([-6.2088, 106.8456]).addTo(map);
        marker.bindPopup('dacita').openPopup();

        var darkModeToggle = document.getElementById('darkModeToggle');
        var body = document.body;

        darkModeToggle.addEventListener('change', function() {
            if (this.checked) {
                body.classList.add('dark-mode');
                map.invalidateSize();
            } else {
                body.classList.remove('dark-mode');
                map.invalidateSize();
            }
        });
    </script>
</body>
</html>
