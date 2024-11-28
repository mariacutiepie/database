<?php
session_start();


require_once '../classes/user.class.php';
require_once '../tools/clean.php';

if(isset($_SESSION['user'])){
    header('Location: home.php');
}

$username = $password = "";
$usernameErr = $passwordErr = $incorrect_credentials = "";
$allinputsfield = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = isset($_POST['username']) ? clean_input($_POST['username']) : '';
    $password = isset($_POST['password']) ? clean_input($_POST['password']) : '';

    if (empty($username)) {
        $usernameErr = '*Username is required!';
        $allinputsfield = false;
    }

    if (empty($password)) {
        $passwordErr = '*Password is required!';
        $allinputsfield = false;
    }

    

    if ($allinputsfield) {
        $objUser = new User();
        $objUser->login($username, $password);
        $incorrect_credentials = isset($_SESSION['incorrect_credentials']) ? $_SESSION['incorrect_credentials'] : '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="../bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>Login</title>
</head>

<body>
    <section>
        <div class="p-container">
            <div class="mid">
                <div class="header">
                    <h1>Sign In</h1>
                </div>
                <div class="c-container">
                    <form method="post">
                        <div class="f_child">
                            <span class="required"><?= $incorrect_credentials; ?></span>
                            <div class="form-floating mb-3 <?= !empty($usernameErr) ? 'is-invalid' : ''; ?>">
                                <input type="text" class="form-control <?= !empty($usernameErr) ? 'is-invalid' : ''; ?>" id="floatingInputGroup2" name="username" placeholder="Enter Username">
                                <label for="floatingInputGroup2">Username</label>
                                <div class="invalid-feedback">
                                    <span><?= $usernameErr; ?></span>
                                </div>
                            </div>
                            <div class="form-floating mb-3 ">
                                <input type="password" class="form-control <?= !empty($passwordErr) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Enter password">
                                <label for="password">Password</label>
                                
                                <div class="invalid-feedback">
                                    <span><?= $passwordErr; ?></span>
                                </div>
                            </div>
                            <br>
                            <div class="dont">
                                <p>Don't have an account yet? <a href="signup.php">Sign Up!</a></p>
                            </div>
                            <input type="submit" value="Sign In">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
