<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MaWT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Navbar.css">
    <link rel="stylesheet" href="../css/Join.css">
    <link rel="stylesheet" href="../css/Footer.css">
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
        <li><a href="List.php">List</a></li>
        <li><a href="#">Map</a></li>
        <li class="login"><a class="active" href="#" >Join</a></li>
    </ul>
</nav>

<div class="card">
    <div class="container">

        <div class="form-title">
            <h3>Register</h3>
        </div>

        <form class="form-signup">

            <div class="form-input">
                <label><h4>Email</h4></label>
                <input type="text" name="email" placeholder="adress@type.com">
            </div>

            <div class="form-input">
                <label><h4>First name:</h4></label>
                <input type="text" name="first-name" placeholder="John">
            </div >

            <div class="form-input">
                <label><h4>Last name:</h4></label>
                <input type="text" name="last-name" placeholder="Abraham">
            </div>

            <div class="form-input">
                <label><h4>Password:</h4></label>
                <input type="password" name="password" placeholder="Try smt over 8 caracters...">
            </div>

            <div class="form-input">
                <label><h4>Confirm password:</h4></label>
                <input type="password" name="password" placeholder="Same password..." >
            </div>

            <button type="submit"> Register </button>

            <div class="signin">
                <h4>If you have already an account, click here:</h4>
                <a href="Login.php" target="_self" id="login">Log in</a>
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