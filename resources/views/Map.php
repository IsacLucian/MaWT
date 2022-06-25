<?php
    $link = $_SERVER["REQUEST_URI"];
    $link = explode('/', $link);
    $_SESSION['turbine_id'] = $link[2];
    $curl = curl_init(URL . '/turbines/' . $_SESSION['turbine_id']);
    curl_setopt($curl, CURLOPT_URL, URL . '/turbines/' . $_SESSION['turbine_id']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    $headers = array(
        "Accept: application/json",
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $output = curl_exec($curl);
    curl_close($curl);

    if($output != '[]') {
        $ans = json_decode($output, true)[0];

        $_SESSION['lon'] = $ans['lon'];
        $_SESSION['lat'] = $ans['lat'];
        $_SESSION['status'] = $ans['status'];
        $_SESSION['user_id'] = $ans['user_id'];
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MaWT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../resources/css/Navbar.css" rel="stylesheet"/>
    <link href="../../resources/css/Footer.css" rel="stylesheet"/>
    <link href="../../resources/css/List.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" type="text/css"/>
</head>

<body onload="init()">
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">MaWT</label>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/list">List</a></li>
            <?php echo (isset($_SESSION['id']) ? '' : '<li class="login"><a href="/register" >Join</a></li>')?>
            <?php echo isset($_SESSION['email']) ? '<li><a href="/profile">'. $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</a></li>' : ''; ?>
            <?php echo (!isset($_SESSION['email']) ? '' : '<li><a href="/logout" >Logout</a></li>')?>

        </ul>
    </nav>

    <div class="card" id="Map" style="height: 500px; width: 100%" ></div>

    <div id="weather" class="wrap">
        <div id="description"></div>
        <h1 id="temp"></h1>
        <div id="location"></div>

        <button name="switch" type="submit" id="<?= $_SESSION['status'] ?>" onclick="updateTurbine(this)"><?php echo ($_SESSION['status'] == 'working' ? 'DISABLE' : 'ENABLE')?></button>
    </div>

</body>

<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
    var map,vectorLayer,selectMarkerControl,selectedFeature;
    var lat =    <?= $_SESSION['lat'] ?>;
    var lon =    <?= $_SESSION['lon'] ?>;
    var zoom =   4;
    var curpos = new Array();
    var position;

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection

    var cntrposition;
    var markers     = new OpenLayers.Layer.Markers( "Markers" );
    var mapnik      = new OpenLayers.Layer.OSM("MAP");

    function init() {
        let id =      <?= isset($_SESSION['id']) ? $_SESSION['id'] : -1 ?>;
        let user_id = <?= $_SESSION['user_id'] ?>;
        var st = <?= $_SESSION['status'] ?>;
        if(id !== user_id) {
            console.log(st);
            st.parentNode.removeChild(st);
        }


        map = new OpenLayers.Map("Map",{
                controls:
                    [
                        new OpenLayers.Control.PanZoomBar(),
                        new OpenLayers.Control.LayerSwitcher({}),
                        new OpenLayers.Control.Permalink(),
                        new OpenLayers.Control.MousePosition({}),
                        new OpenLayers.Control.ScaleLine(),
                        new OpenLayers.Control.OverviewMap(),
                    ]
            }
        );

        cntrposition = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
        map.addLayers([markers, mapnik]);
        map.addLayer(mapnik);
        map.setCenter(cntrposition, zoom);

        markers.addMarker(new OpenLayers.Marker(cntrposition));

        fetch('https://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + lon + '&appid=<?= WEATHER_KEY ?>')
            .then(res => res.json())
            .then(d => {
                var celcius = Math.round(parseFloat(d.main.temp)-273.15);

                document.getElementById('description').innerHTML = d.weather[0].description;
                document.getElementById('temp').innerHTML = celcius + '&deg;';
                document.getElementById('location').innerHTML = d.name;
            });
    }

        function updateTurbine(button) {
            const id = <?= $_SESSION['turbine_id'] ?>;
            const old_val = (button.id !== 'working' ? 'stopped' : 'working');
            const val = (button.id === 'working' ? 'stopped' : 'working');
            const data = '{"status": ' + '"' + val + '"' + '}';
            fetch('/turbines/update/' + id, {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({status: val})
            }).then(res => res.text())
                .then(d => {
                    document.getElementById(old_val).textContent = (val === 'working' ? 'DISABLE' : 'ENABLE');
                    document.getElementById(old_val).id = val;
                });
        }

</script>
</html>