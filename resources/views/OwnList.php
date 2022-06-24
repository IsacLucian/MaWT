<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MaWT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/Navbar.css">
    <link rel="stylesheet" href="resources/css/Footer.css">
    <link rel="stylesheet" href="resources/css/List.css">
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
        <li><a href="/">Home</a></li>
        <li><a href="/list">List</a></li>
        <li class="login"><a href="/register" >Join</a></li>
        <li>
            <a href="" class="active">
                <?php echo isset($_SESSION['email']) ? $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] : ''; ?>
            </a>
        </li>
    </ul>
</nav>

<div class="wrap">

    <button onclick="window.location.href = '/createTurbine'">CREATE NEW TURBINE</button>

    <div class="card">
        <div class="container">
            <h3> #1 </h3>
            Hidrocentrala#1
            <div class="working"> Working </div>
            <button type="submit" onclick="window.location.href = '/map/25/46'"> View </button>
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