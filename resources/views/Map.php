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
            <li><a href="/list" class="active">List</a></li>
            <li class="login"><a href="<?php echo URL . '/register' ?>">Join</a></li>
            <li>
                <a href="">
                    <?php echo isset($_SESSION['email']) ? $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] : ''; ?>
                </a>
            </li>
        </ul>
    </nav>

    <div class="card" id="Map" style="height: 500px; width: 100%" ></div>
</body>

<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
    var map,vectorLayer,selectMarkerControl,selectedFeature;
    var lat =   <?= $_SESSION['lat'] ?>;
    var lon =    <?= $_SESSION['log'] ?>;
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

        cntrposition = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
        console.log(cntrposition);
        map.addLayers([markers, mapnik]);
        map.addLayer(mapnik);
        map.setCenter(cntrposition, zoom);

        markers.addMarker(new OpenLayers.Marker(cntrposition));

        // var click = new OpenLayers.Control.Click();
        // map.addControl(click);
        //
        // click.activate();
    }

    // OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {
    //     defaultHandlerOptions: {
    //         'single': true,
    //         'double': false,
    //         'pixelTolerance': 0,
    //         'stopSingle': false,
    //         'stopDouble': false
    //     },
    //
    //     initialize: function(options) {
    //         this.handlerOptions = OpenLayers.Util.extend(
    //             {}, this.defaultHandlerOptions
    //         );
    //         OpenLayers.Control.prototype.initialize.apply(
    //             this, arguments
    //         );
    //         this.handler = new OpenLayers.Handler.Click(
    //             this, {
    //                 'click': this.trigger
    //             }, this.handlerOptions
    //         );
    //     },
    //
    //     trigger: function(e) {
    //         var lonlat = map.getLonLatFromPixel(e.xy);
    //         lonlat1 = lonlat;//new OpenLayers.LonLat(lonlat.lon,lonlat.lat).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
    //
    //         markers.clearMarkers();
    //         lon = lonlat1.lon;
    //         lat = lonlat1.lat;
    //         cntrposition = new OpenLayers.LonLat(lon, lat);//.transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
    //
    //         markers.addMarker(new OpenLayers.Marker(cntrposition));
    //         console.log(cntrposition.transform(new OpenLayers.Projection("EPSG:900913"), new OpenLayers.Projection("EPSG:4326")));
    //
    //         alert("Hello..."+lonlat1.lon + "  " +lonlat1.lat);
    //
    //     }
    //
    // });
</script>
</html>