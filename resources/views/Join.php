<?php
$password_err = '';
$email_err = '';
$confirm_password_err = '';
$first_name_err = '';
$last_name_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $err = 0;
    if(empty($_POST['first_name'])) {
        $first_name_err = 'Field required';
        $err++;
    }

    if(empty($_POST['last_name'])) {
        $last_name_err = 'Field required';
        $err++;
    }

    if(empty($_POST['password'])) {
        $password_err = 'Field required';
        $err++;
    }

    if(empty($_POST['confirm_password'])) {
        $confirm_password_err = 'Field required';
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

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, URL . '/users/' . $_POST['email']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curl);
    curl_close($curl);

    if($output !== '[]') {
        $email_err = 'Email already used';
        $err++;
    }

    if($err == 0) {

        $url = URL . '/users/post';
        $curl = curl_init(URL . '/users/post');
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
                "Accept: application/json",
                "Content-Type: application/json"
        );

        curl_setopt($curl, CURLOPT_HEADER, $headers);

        unset($_POST['confirm_password']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($_POST));
        $resp = curl_exec($curl);
        curl_close($curl);


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
        <li><a href="<?php echo URL?>">Home</a></li>
        <li><a href="/list">List</a></li>
        <li class="login"><a class="active" href="">Join</a></li>
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
            <h3>Register</h3>
        </div>

        <form class="form-signup" id="RegForm" name="RegForm" method="post">

            <div class="form-input">
                <label><h4>Email</h4></label>
                <input type="text" name="email" placeholder="adress@type.com">
                <label><h4><?= $email_err ?></h4></label>

            </div>

            <div class="form-input">
                <label><h4>First name:</h4></label>
                <input type="text" name="first_name" placeholder="John">
                <label><h4><?= $first_name_err ?></h4></label>

            </div >

            <div class="form-input">
                <label><h4>Last name:</h4></label>
                <input type="text" name="last_name" placeholder="Abraham">
                <label><h4><?= $last_name_err ?></h4></label>

            </div>

            <div class="form-input">
                <label><h4>Password:</h4></label>
                <input type="password" name="password" placeholder="Try smt over 8 caracters...">
                <label><h4><?= $password_err ?></h4></label>

            </div>

            <div class="form-input">
                <label><h4>Confirm password:</h4></label>
                <input type="password" name="confirm_password" placeholder="Same password..." >
                <label><h4><?= $confirm_password_err ?></h4></label>

            </div>

            <button type="submit"> Register </button>

            <div class="signin">
                <h4>If you have already an account, click here:</h4>
                <a href="<?php echo URL . '/login'?>" target="_self" id="login">Log in</a>
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