<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motostyle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #CCCCCC;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
        .brand-name {
            font-weight: bold;
            font-size: 20px;
        }
        .user-icon {
            display: flex;
            align-items: center;
        }
        .user-icon img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }
        .nav-container {
            display: flex;
            justify-content: flex-start; 
            flex-grow: 1;
            margin-left: 475px;
        }
        nav {
            display: flex;
            align-items: center;
        }
        nav a {
            margin: 0 30px; 
            text-decoration: none;
            color: black;
            font-size: 16px;
        }
        @media (max-width: 1024px) {
            .nav-container {
            margin-left: 50px;
            }
            .nav a {
            margin: 0 15px;
            font-size: 14px; 
            }
        }
        .welcome {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .welcome h1 {
            margin: 0;
            font-size: 36px;
        }
        .welcome p {
            font-size: 18px;
            margin-top: 10px;
        }
        .section-title {
            text-align: left;
            margin: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .builds-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px;
        }
        .build-item {
            margin: 10px;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
        }
        .build-item img {
            width: 300px;
            height: 200px;
        }
        footer {
            background-color: #CCCCCC;
            padding: 20px;
            text-align: center;
            font-size: 16px;
            color: #333;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="logo.jpg">
        <div class="brand-name">MOTOSTYLE</div>
    </div>
    <div class="nav-container">
        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Customize Motorcycles</a>
            <a href="#">Community</a>
        </nav>
    </div>
    <div class="user-icon">
        <a href="user_profile.php">
            <img src="ic.png">
        </a>
    </div>
</header>

<div class="welcome">
    <h1>WELCOME!</h1>
    <p>Description about the website</p>
</div>

<div class="section-title">TOP MOTORCYCLE BUILDS</div>
<div class="builds-container">
    <div class="build-item">
        <img src="motostyle_logo.png">
        <p>Name of motor/builds</p>
        <p>Description</p>
    </div>
    <div class="build-item">
        <img src="motostyle_logo.png">
        <p>Name of motor/builds</p>
        <p>Description</p>
    </div>
    <div class="build-item">
        <img src="motostyle_logo.png">
        <p>Name of motor/builds</p>
        <p>Description</p>
    </div>
</div>

<div class="section-title">RECENT BUILDS</div>
<div class="builds-container">
    <div class="build-item">
        <img src="motostyle_logo.png">
        <p>Name of motor/builds</p>
        <p>Description</p>
    </div>
    <div class="build-item">
        <img src="motostyle_logo.png">
        <p>Name of motor/builds</p>
        <p>Description</p>
    </div>
    <div class="build-item">
        <img src="motostyle_logo.png">
        <p>Name of motor/builds</p>
        <p>Description</p>
    </div>
</div>

<footer>
    <p></p>
</footer>

</body>
</html>
