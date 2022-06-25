
<?php
$password_err = '';
$email_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $err = 0;
    if(isset($_SESSION['email'])) {
        $email_err = 'You are already logged in';
        $err++;
    }

    if(empty($_POST['password'])) {
        $password_err = 'Field required';
        $err++;
    }

    if(empty($_POST['email'])) {
        $email_err = 'Field required';
        $err++;
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Invalid email';
        $err++;
    }

    $curl = curl_init(URL . '/users/email/' . $_POST['email']);
    curl_setopt($curl, CURLOPT_URL, URL . '/users/email/' . $_POST['email']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    $headers = array(
        "Accept: application/json",
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $output = curl_exec($curl);
    curl_close($curl);

    $ans = json_decode($output, true)[0];

    if(!password_verify($_POST['password'], $ans['password'])) {
        $password_err = 'Wrong email or password';
        $err++;
    }

    if($err == 0) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['id'] = $ans['id'];
        $_SESSION['first_name'] = $ans['first_name'];
        $_SESSION['last_name'] = $ans['last_name'];
        $_SESSION['admin'] = $ans['admin'];
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
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">MaWT</label>
    <ul>
        <li><a href="<?php echo URL ?>">Home</a></li>
        <li><a href="/list">List</a></li>
        <li class="login"><a class="active" href="" >Join</a></li>
        <li>
            <a href="/profile">
                <?php echo isset($_SESSION['email']) ? $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] : ''; ?>
            </a>
        </li>
    </ul>
</nav>

<div class="card">
    <div class="container">

        <div class="form-title">
            <h3>Log in</h3>
        </div>

        <form class="form-signup" method="post">

            <div class="form-input" >
                <label><h4>Email</h4></label>
                <input type="text" name="email" placeholder="adress@type.com">
                <label><h4><?= $email_err ?></h4></label>

            </div>

            <div class="form-input">
                <label><h4>Password:</h4></label>
                <input type="password" name="password" placeholder="Try smt over 8 caracters...">
                <label><h4><?= $password_err ?></h4></label>

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