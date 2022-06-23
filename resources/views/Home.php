<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MaWT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/Navbar.css" type="text/css"/>
<!--    <link rel="stylesheet" href="../css/Join.css">-->
    <link rel="stylesheet" href="resources/css/Footer.css" type="text/css"/>
    <link rel="stylesheet" href="resources/css/Home.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" type="text/css"/>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">MaWT</label>
        <ul>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="List.php">List</a></li>
            <li><a href="#">Map</a></li>
            <li class="login"><a href="Join.php    " >Join</a></li>
        </ul>
    </nav>

    <img src="public/images/Upgrading+Pumped+Storage+Hydropower_+O&M+Modernization+and+Optimization.jpg" class="main">

    <div class="text">
        <h2>Welcome, guest</h2> <br>
        This website was created to help the management of hydroelectric power station: from the optimal location of the turbines depending
        on efficiency, ground, minimizing the risks and other factors to checking the state of a turbine in real time. Also
        the app offers statistics regarding the degree of functionality, efficiency depending on the flow of water and weather conditions.
    </div>

    <div class="wrap">
        <div class="card">
            <div class="container">
                <div class="form-title">
                    <h3>Search by id</h3>
                </div>


                <label><b>Go to a certain hydroelectric power station by searching the id</b></label>

                <input type="text" name="searchId">

                <button type="submit"> Search </button>

            </div>
        </div>

        <div class="card">
            <div class="container">
                <div class="form-title">
                    <h3>Map</h3>
                </div>
                <label><b>Select a hydroelectric power station on the map</b></label>
                <img src="public/images/thumbnail.jpg" class="map">
            </div>
        </div>

        <div class="card">
            <div class="container">
                <div class="form-title">
                    <h3>Search by name</h3>
                </div>
                <label><b>Go to a certain hydroelectric power station by searching the name</b></label>
                <input type="text" name="searchName">
                <button type="submit"> Search </button>

            </div>
        </div>
    </div>

    <div class="footer">
        <p>
            Managing water turbines on web <br>
            <a href="Documentatie.php"> Architecture </a>
        </p>
    </div>
</body>
</html>