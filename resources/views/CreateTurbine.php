
<?php
$name_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $err = 0;
    if(isset($_SESSION['name'])) {
        $name_err = 'Field Required';
        $err++;
    }


    if($err == 0) {
        $curl = curl_init(URL . '/turbines/post');
        curl_setopt($curl, CURLOPT_URL, URL . '/turbines/post');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );

        curl_setopt($curl, CURLOPT_HEADER, $headers);

        $aux = [];
        $aux['name'] = $_POST['Name'];
        $aux['lon'] = $_POST['Lon'];
        $aux['lat'] = $_POST['Lat'];
        $aux['user_id'] = $_SESSION['id'];
        $aux['status'] = 'working';
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($aux));
        $output = curl_exec($curl);
        curl_close($curl);

        header("Location: /profile");
    }
    unset($_SERVER['REQUEST_URI']);
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MaWT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/Navbar.css">
    <link rel="stylesheet" href="resources/css/Join.css">
    <link rel="stylesheet" href="resources/css/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body onload="init()">
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">MaWT</label>
    <ul>
        <li><a href="<?php echo URL ?>">Home</a></li>
        <li><a href="/list">List</a></li>
        <?php echo isset($_SESSION['id']) ? '' : '<li class="login"><a href="/register" >Join</a></li>'?>
        <li>
            <a href="/profile" class="active">
                <?php echo isset($_SESSION['email']) ? $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] : ''; ?>
            </a>
        </li>
    </ul>
</nav>

<div class="card">
    <div class="container">

        <div class="form-title">
            <h3>Create new Turbine</h3>
        </div>

        <form class="form-signup" method="post">

            <label>Latitude: </label>
            <input type="text" id="lat" name="Lat" readonly>
            <label>Longitude: </label>
            <input type="text" id="lon" name="Lon" readonly>

            <div id="Map" style="height: 300px; width: 100%" ></div>
            <div class="form-input" >
                <label><h4>Name:</h4></label>
                <input type="text" name="Name">
                <label><h4><?= $name_err ?></h4></label>
            </div>

            <button type="submit"> Submit </button>
        </form>
    </div>
</div>
<div class="footer">
    <p>
        Managing water turbines on web <br>
        <a href="Documentatie.php"> Architecture </a>
    </p>
</div>
</body>
<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
    var map,vectorLayer,selectMarkerControl,selectedFeature;
    var lat =   45;
    var lon =   25;
    var zoom =   4;
    var curpos = new Array();
    var position;

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection

    var cntrposition;
    var markers     = new OpenLayers.Layer.Markers( "Markers" );
    var mapnik      = new OpenLayers.Layer.OSM("MAP");

    function init()
    {
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


        document.getElementById('lat').value = lat;
        document.getElementById('lon').value = lon;
        cntrposition = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
        map.addLayers([markers, mapnik]);
        map.addLayer(mapnik);
        map.setCenter(cntrposition, zoom);

        markers.addMarker(new OpenLayers.Marker(cntrposition));

        var click = new OpenLayers.Control.Click();
        map.addControl(click);

        click.activate();
    }

    OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {
        defaultHandlerOptions: {
            'single': true,
            'double': false,
            'pixelTolerance': 0,
            'stopSingle': false,
            'stopDouble': false
        },

        initialize: function(options) {
            this.handlerOptions = OpenLayers.Util.extend(
                {}, this.defaultHandlerOptions
            );
            OpenLayers.Control.prototype.initialize.apply(
                this, arguments
            );
            this.handler = new OpenLayers.Handler.Click(
                this, {
                    'click': this.trigger
                }, this.handlerOptions
            );
        },

        trigger: function(e) {
            var lonlat = map.getLonLatFromPixel(e.xy);
            lonlat1 = lonlat;//new OpenLayers.LonLat(lonlat.lon,lonlat.lat).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));

            markers.clearMarkers();
            lon = lonlat1.lon;
            lat = lonlat1.lat;

            cntrposition = new OpenLayers.LonLat(lon, lat);//.transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));

            markers.addMarker(new OpenLayers.Marker(cntrposition));
            cntrposition.transform(new OpenLayers.Projection("EPSG:900913"), new OpenLayers.Projection("EPSG:4326"));
            document.getElementById('lat').value = cntrposition.lat
            document.getElementById('lon').value = cntrposition.lon;
            // alert("Hello..."+lonlat1.lon + "  " +lonlat1.lat);

        }

    });
</script>
</html>