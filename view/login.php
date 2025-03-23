<?php
// session_start();
// ob_start();
// include "../model/account.php";
// include "../model/pdo.php";
// if (isset($_POST['submitLogin'])) {
//     $email = $_POST['email'];
//     $pass = $_POST['password'];

//     $role = checkLogin($email, $pass);
//     $_SESSION['role'] = $role;
//     if ($role == 1) header('Location: ../../index.php');
//     else {
//         echo "<script>alert('Sai Tài Khoản Hoặc Mật Khẩu');</script>";
//     }
// }
if (!empty($_POST)) {

    if (empty($_POST['email'])) {
        $errors['email']['required'] = "Vui lòng nhập email của bạn";
    } else {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['invalid'] = "Định dạng email không hợp lệ";
        }
    }
    if (empty($_POST['password'])) {
        $errors['password']['required'] = "Vui lòng nhập mật khẩu";
    } else {
        if (strlen(trim($_POST['password'])) < 6) {
            $errors['password']['min_length'] = "Mật khẩu phải trên 6 kí tự";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./fontend/login.css">
</head>

<body>
    <h2>Sign in/up Form</h2>
    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="index.php?act=login" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input style="background-color: #eee; padding: 12px 15px; margin: 8px 0; width: 100%;" type="email" placeholder="Email" name="email" />
                <?php echo !empty($errors['email']['required']) ? '<span style="color: red">' . $errors['email']['required'] . '</span>' : ''; ?>
                <?php echo !empty($errors['email']['invalid']) ? '<span style="color: red">' . $errors['email']['invalid'] . '</span>' : ''; ?>
                <input style="background-color: #eee; padding: 12px 15px; margin: 8px 0; width: 100%;" type="password" placeholder="Password" name="password" />
                <?php echo !empty($errors['password']['required']) ? '<span style="color: red">' . $errors['password']['required'] . '</span>' : ''; ?>
                <?php echo !empty($errors['password']['min_length']) ? '<span style="color: red">' . $errors['password']['min_length'] . '</span>' : ''; ?>
                <a href="#">Forgot your password?</a>
                <input style="border-radius: 20px;border: 1px solid #FF4B2B;background-color: #FF4B2B;color: #FFFFFF;font-size: 12px;font-weight: bold;padding: 12px 45px;letter-spacing: 1px;text-transform: uppercase;transition: transform 80ms ease-in;" type="submit" name="submitLogin" value="Sign In">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <a href="index.php?act=resignter"><button class="ghost" id="signUp">Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>