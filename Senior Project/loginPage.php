<!-- Mohamad Al-Nakib -->

<?php
require_once "./connect.php";
try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    if (isset($_POST["email"], $_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashpw = md5($password);
        $query = "SELECT * FROM registration where email=? AND password=?";
        $result = $pdo->prepare($query);
        $result->bindValue(1, $email);
        $result->bindValue(2, $hashpw);
        $result->execute();

        if ($result->rowCount() > 0) {
            session_start();
            $_SESSION["logged"] = true;
            $_SESSION["name"] = $row["fullname"];
            header("location:./homePage.php");
        } else {
            echo "<script>alert('Login failed!');</script>";
            header("location:./loginPage.php");
        }
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=League+Spartan:wght@100..900&display=swap" rel="stylesheet" />

    <style>
        * {
            font-family: "League Spartan", sans-serif;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-sm fixed-top bg-light">
            <div class="container-fluid">
                <a href="./homePage.php">
                    <img src="../Images/Snap_Sign_Speak_Logo.png" alt="Website Logo" height="80px" />
                </a>
                <?php if (isset($_SESSION["logged"])): ?>
                    <h1>Welcome <?= $name ?></h1>
                <?php else: ?>
                    <h1></h1>
                <?php endif; ?>

                <!-- Links -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                    <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="./homePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:5000">Try Our Model</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-5" href="./aboutUsPage.php">About Us</a>
                        </li>
                        <?php if (isset($_SESSION["logged"])): ?>
                            <a href="./logoutPage.php" class="btn btn-danger" name="logout">Logout</a>
                        <?php else: ?>
                            <a href="./loginPage.php" class="btn btn-primary" name="login">Login</a>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Login Form -->
    <section>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-12 rounded-4 d-flex align-items-center flex-column">
                    <div class="featured-image mb-3">
                        <br />
                        <img src="../Images/Snap_Sign_Speak_Logo.png" class="img-fluid" style="width: 250px" />
                    </div>
                </div>
                <form action="loginPage.php" method="post">
                    <div class="col-md-12">
                        <div class="align-items-center">
                            <div class="header-text mb-4">
                                <h2>Hello, Again!</h2>
                                <p>We are happy to have you back.</p>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Email address" />
                            </div>
                            <div class="input-group mb-1">
                                <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" />
                            </div>
                            <div class="input-group mb-5 d-flex justify-content-between">
                               
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-primary w-100 fs-6" name="login">Login</button>
                            </div>
                            <div class="row">
                                <small>Don't have account?
                                    <a href="./signupPage.php">Sign Up</a></small>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!--FOOTER SECTION-->
    <br>
    <br>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
        <p class="text-center text-body-secondary">© 2024 Snap Sign Speak, Inc</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>