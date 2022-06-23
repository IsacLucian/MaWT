<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MaWT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Navbar.css">
    <link rel="stylesheet" href="../css/Footer.css">
    <link rel="stylesheet" href="../css/List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">MaWT</label>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a class="active" href="#">List</a></li>
            <li><a href="#">Map</a></li>
            <li class="login"><a href="Join.php" >Join</a></li>
        </ul>
    </nav>

    <div class="wrap">
        <div class="card">
            <div class="container">
                <h3> #1 </h3>
                Hidrocentrala#1
                <div class="working"> Working </div>
                <button type="submit"> View </button>
            </div>
        </div>

        <div class="card">
            <div class="container">
                <h3> #2 </h3>
                Hidrocentrala#2
                <div class="working"> Working </div>
                <button type="submit"> View </button>
            </div>
        </div>

        <div class="card">
            <div class="container">
                <h3> #3 </h3>
                Hidrocentrala#3
                <div class="stopped"> Stopped </div>
                <button type="submit"> View </button>
            </div>
        </div>

        <div class="card">
            <div class="container">
                <h3> #4 </h3>
                Hidrocentrala#4
                <div class="stopped"> Stopped </div>
                <button type="submit"> View </button>
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