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
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">MaWT</label>
    <ul>
        <li><a href="<?php echo URL ?>">Home</a></li>
        <li><a href="List.php">List</a></li>
        <li><a href="#">Map</a></li>
        <li class="login"><a class="active" href="" >Join</a></li>
    </ul>
</nav>

<div class="card">
    <div class="container">

        <div class="form-title">
            <h3>Log in</h3>
        </div>

        <form class="form-signup">

            <div class="form-input">
                <label><h4>Email</h4></label>
                <input type="text" name="email" placeholder="adress@type.com">
            </div>

            <div class="form-input">
                <label><h4>Password:</h4></label>
                <input type="password" name="password" placeholder="Try smt over 8 caracters...">
            </div>

            <button type="submit"> Log in </button>

            <div class="signin">
                <h4>Don't have an account? Click here:</h4>
                <a href="<?php echo URL . '/register' ?>" target="_self" id="login">Register</a>
            </div>

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
</html>