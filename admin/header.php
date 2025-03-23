<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../validor.js">
    <title>Sidebar Demo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(to bottom, #66dddd, #2c3e50);
            padding-top: 20px;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            color: #ecf0f1;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 120px;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            border-bottom: 1px solid #3e5060;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            transition: background 0.3s, padding-left 0.3s;
            cursor: pointer;
        }

        .sidebar ul li a .icon {
            margin-right: 15px;
        }

        .sidebar ul li a:hover {
            background: #1abc9c;
            padding-left: 25px;
        }

        .sidebar ul li ul {
            display: none;
            list-style-type: none;
            padding-left: 30px;
            background: #3e5060;
        }

        .sidebar ul li ul li a {
            color: #bdc3c7;
        }

        .sidebar ul li ul li a:hover {
            color: #ecf0f1;
        }

        main {
            margin-left: 250px;
            padding: 0 20px;
            background: #ecf0f1;
        }

        .hd-main h1 {
            color: #2c3e50;
        }

        .main-content {
            margin-left: 250px;
            background-color: #fff;
            justify-content: center;
            padding: 0 20px;
            align-items: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2ecc71;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .action-buttons button {
            border: none;
            background: none;
            cursor: pointer;
            margin-right: 8px;
        }

        .action-buttons .fa {
            font-size: 18px;
        }

        .product-image {
            width: 50px;
            height: 50px;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 1000px;
            margin: 0 auto;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #34495e;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
            margin-right: 10px;
        }

        .form-group:last-child {
            margin-right: 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group select {
            padding: 9px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #2ecc71;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="../fontend/image/logo.jpg" alt="Logo">
        </div>
        <ul>
            <li><a href="../index.php" onclick="hideAllSubMenus()"><span class="icon"><i class="fas fa-home"></i></span>
                    Home</a>
            </li>
            <li><a href="#" onclick="toggleSubMenu(event, 'category-submenu')"><span class="icon"><i
                            class="fas fa-list"></i></span> Category</a>
                <ul id="category-submenu">
                    <li><a href="index.php?act=listdm">List Category</a></li>
                    <li><a href="index.php?act=adddm">Add Category</a></li>
                </ul>
            </li>
            <li><a href="#" onclick="toggleSubMenu(event, 'product-submenu')"><span class="icon"><i
                            class="fas fa-box"></i></span> Product</a>
                <ul id="product-submenu">
                    <li><a href="index.php?act=listsp">List Product</a></li>
                    <li><a href="index.php?act=addsp">Add Product</a></li>
                </ul>
            </li>
            <li><a href="#" onclick="toggleSubMenu(event, 'account-submenu')"><span class="icon"><i
                            class="fas fa-user"></i></span> Account</a>
                <ul id="account-submenu">
                    <li><a href="index.php?act=listacc">List Account</a></li>
                    <li><a href="index.php?act=addacc">Add Account</a></li>
                </ul>
            </li>
            <li><a href="index.php?act=listComment" onclick="hideAllSubMenus()"><span class="icon"><i class="fa-solid fa-comment"></i></span>
                    Comment</a></li>
            <li><a href="index.php?act=listOrder" onclick="hideAllSubMenus()"><span class="icon"><i class="fa-solid fa-comment"></i></span>
                    Order</a></li>
            <li><a href="index.php?act=thongke" onclick="hideAllSubMenus()"><span class="icon"><i class="fas fa-chart-bar"></i></span>
                    Statistical</a></li>
            <li><a href="#" onclick="hideAllSubMenus()"><span class="icon"><i class="fas fa-cog"></i></span>
                    Settings</a></li>
            <li><a href="#" onclick="hideAllSubMenus()"><span class="icon"><i class="fas fa-info-circle"></i></span>
                    About</a></li>
            <li><a href="index.php?act=logout" onclick="hideAllSubMenus()"><span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    Logout</a></li>
        </ul>
    </div>
    <div>
        <main class="d-flex hd-main" style="justify-content: space-between;">
            <div>
                <h1>Welcome to your sidebar demo</h1>
                <p>This is the main content area.</p>
            </div>
            <header class="d-flex" style="justify-content: space-between; ">
                <div class="dropdown mt-3 mb-3 d-flex">
                    <img src="../fontend/image/Screenshot 2024-11-06 231314.png" style="border-radius: 50%;"
                        width="80px" alt="">
                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
                        $user = $_SESSION['username'];
                    ?>
                        <h3 style="margin: 20px;"><?= $user ?></h3>
                    <?php } ?>
                </div>
            </header>
        </main>