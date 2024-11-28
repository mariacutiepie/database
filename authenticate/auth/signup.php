<?php
session_start();
require_once '../classes/user.class.php';
require_once '../tools/clean.php';

$objUser = new User;

$username = $password = $confirm_password = $is_admin = $is_staff = '';
$usernameErr = $passwordErr = $confirm_passwordErr = '';
$allinputsfield = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? clean_input($_POST['username']) : '';
    $password = isset($_POST['password']) ? clean_input($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? clean_input($_POST['confirm_password']) : '';
    $is_staff = isset($_POST['is_staff']) ? clean_input($_POST['is_staff']) : 0;
    $is_admin = isset($_POST['is_admin']) ? clean_input($_POST['is_admin']) : 0;

    if (empty($username)) {
        $usernameErr = ' Username is required!';
        $allinputsfield = false;
    }
    if (empty($password)) {
        $passwordErr = ' Password is required!';
        $allinputsfield = false;
    }
    if (empty($confirm_password)) {
        $confirm_passwordErr = ' Confirm password is required!';
        $allinputsfield = false;
    } else if ($confirm_password != $password) {
        $confirm_passwordErr = ' Confirm password not match!';
        $allinputsfield = false;
    }
    if ($allinputsfield) {
        if ($objUser->record_exist($username) == true) {
            $usernameErr = ' Username exist!';
        } else {
            $objUser->create_account($username, $password, $is_admin, $is_staff);
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>Login</title>
</head>

<body>
    <section>
        <div class="p-container">
            <div class="mid">
                <div class="header">
                    <h1>Sign Up!</h1>
                </div>
                <div class="c-container ">
                    <form method="post">
                        <div class="f_child mb-3">
                            <div class="form-floating <?= !empty($usernameErr) ? 'is-invalid' : ''; ?> mb-3">
                                <input type="text" class="form-control <?= !empty($usernameErr) ? 'is-invalid' : ''; ?>" id="floatingInputGroup2" name="username" placeholder="Enter Username">
                                <label for="floatingInputGroup2">Username</label>
                                <div class="invalid-feedback">
                                    <span><?= $usernameErr; ?></span>
                                </div>
                            </div>
                            <div class="form-floating <?= !empty($passwordErr) ? 'is-invalid' : ''; ?> mb-3">
                                <input type="password" class="form-control <?= !empty($passwordErr) ? 'is-invalid' : ''; ?>" id="floatingInputGroup2" name="password" placeholder="Enter password">
                                <label for="floatingInputGroup2">Password</label>
                                <div class="invalid-feedback">
                                    <span><?= $passwordErr; ?></span>
                                </div>
                            </div>
                            <div class="form-floating <?= !empty($confirm_passwordErr) ? 'is-invalid' : ''; ?> mb-3">
                                <input type="password" class="form-control <?= !empty($confirm_passwordErr) ? 'is-invalid' : ''; ?>" id="floatingInputGroup2" name="confirm_password" placeholder="Confirm password">
                                <label for="floatingInputGroup2">Confirm Password</label>
                                <div class="invalid-feedback">
                                    <span><?= $confirm_passwordErr; ?></span>
                                </div>
                            </div>
                            <div class="role">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_staff" value="1" id="is_staff">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Client
                                </label>
                            </div>
						</div>
                    </div>
                            <div class="dont">
                                <p>Already have an Account? <a href="login.php">Sign In!</a></p>
                            </div>
                            <input type="submit" value="Sign Up">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- <script>
            const adminCheckbox = document.querySelector('#is_admin');
            const staffCheckbox = document.querySelector('#is_staff');

            adminCheckbox.addEventListener('change', () => {
            if (adminCheckbox.checked) {
                staffCheckbox.checked = true;
            }
            });

            staffCheckbox.addEventListener('change', () => {
            if (adminCheckbox.checked) {
                staffCheckbox.checked = true;
            }
            });
        </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>







<!-- <div class="div_form">
                <h1>SignUp</h1>
                <form action="" method="post">
                    * Are required fields.
                    <div class="input">
                        Username <span class="required">* <?= $usernameErr; ?></span><br>
                        <input type="text" name="username" id="username" value="<?= $username; ?>">
                    </div>
                    <div class="input">
                        Password <span class="required">* <?= $passwordErr ?></span><br>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input">
                        Confirm Password <span class="required">* <?= $confirm_passwordErr ?></span><br>
                        <input type="password" name="confirm_password" id="confirm_password">
                    </div>
                    <div class="input">
                        Role <br>
                        <input type="checkbox" name="is_admin" id="is_admin" value="1">Admin <br>
                        <input type="checkbox" name="is_staff" id="is_staff" value="1">Staff<br>
                    </div>
                    <p>already have an account? <a href="login.php">LogIn</a></p>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </section> -->
<script>
    const adminCheckbox = document.querySelector('#is_admin');
    const staffCheckbox = document.querySelector('#is_staff');

    adminCheckbox.addEventListener('change', () => {
        if (adminCheckbox.checked) {
            staffCheckbox.checked = true;
        }
    });

    staffCheckbox.addEventListener('change', () => {
        if (adminCheckbox.checked) {
            staffCheckbox.checked = true;
        }
    });
</script>
</body>

</html>