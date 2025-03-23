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
    
    <div class="container" id="container" style="min-height: 550px !important;">
        <div class="form-container sign-up-container" >
            <form action="index.php?act=resignter" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input style="background-color: #eee; padding: 12px 15px; margin: 8px 0; width: 100%;" type="text" name="username" placeholder="User Name">
                <input style="background-color: #eee; padding: 12px 15px; margin: 8px 0; width: 100%;" type="email" name="email" placeholder="Email">
                <input style="background-color: #eee; padding: 12px 15px; margin: 8px 0; width: 100%;" type="password" name="password" placeholder="PassWord">
                <input style="background-color: #eee; padding: 12px 15px; margin: 8px 0; width: 100%;" type="password" name="rPassword" placeholder="RPassWord">
                <input style="border-radius: 20px;border: 1px solid #FF4B2B;background-color: #FF4B2B;color: #FFFFFF;font-size: 12px;font-weight: bold;padding: 12px 45px;letter-spacing: 1px;text-transform: uppercase;transition: transform 80ms ease-in;" type="submit" name="submitRegister" value="Đăng Ký">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <a href="index.php?act=login"><button class="ghost" id="signIn">Sign In</button></a>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <a href="index.php?act=resignter"><button class="ghost" id="signUp">Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        container.classList.add('right-panel-active');

        signInButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signUpButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
        
    </script>
</body>

</html>