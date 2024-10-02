<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motostyle Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            max-width: 1200px;
        }

        .logo-section {
            text-align: center;
            width: 40%;
        }

        .logo {
            width: 100%;
            max-width: 400px; 
        }

        .logo-section h1 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 28px;
            margin-top: 20px;
        }

        .form-section {
            width: 40%;
        }

        .form-box {
            background-color: #4f4f4f;
            padding: 60px; 
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: 600px; /* Further increased height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .form-box h2 {
            color: white;
            text-align: center;
            margin-bottom: 40px;
        }

        .form-box input {
            display: block;
            width: 100%;
            padding: 20px; 
            margin-bottom: 30px; 
            border-radius: 10px;
            border: none;
            background-color: #d3d3d3;
            font-size: 18px;
        }

        .form-box button {
            width: 50%; 
            margin: 0 auto; 
            padding: 15px; 
            border: none;
            border-radius: 10px;
            background-color: #e2e2e2;
            font-size: 18px;
            cursor: pointer;
        }

        .form-box button:hover {
            background-color: #ccc;
        }

        .form-box p {
            text-align: center;
            margin-top: 20px;
        }

        .form-box a {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="moto.png" alt="Motostyle Logo" class="logo">
            <h1>Showcase Your Unique Motorcycles for the World to See!</h1>
        </div>
        <div class="form-section">
            <div class="form-box">
                <h2>REGISTRATION</h2>
                <form action="" method="POST">
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit" name="register">Sign Up</button>
                </form>
                <p><a href="Login.php">Already have an Account?</a></p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Database
        //CRUD

        header("Location: LandingPage.php");
        exit();
    }
    ?>
</body>
</html>
