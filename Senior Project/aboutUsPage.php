<!-- Mohamad Al-Nakib -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>About</title>
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
                            <a class="nav-link active me-5" href="./aboutUsPage.php">About Us</a>
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

    <!-- Main -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row">
            <div class="col-md-7">
                <h1>Our Mission <br />Bring People Together !</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit ea
                    doloribus repudiandae quibusdam voluptates non eum perferendis aut.
                </p>
                <a class="btn btn-primary hero-btn mb-5" href="http://127.0.0.1:5000">Try Our Model</a>
            </div>
            <div class="col-md-5">
                <img class="img-box" src="https://via.placeholder.com/400x300" />
            </div>
        </div>
    </div>




    <!-- Founders -->

    <div class="container marketing">
        <h1 class="mb-5">Meet Our Founders</h1>
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Our Mission</h2>
                <br>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
                    natus inventore cum quam harum velit fugiat, aperiam doloribus quos
                    officia ipsa nihil quibusdam at enim ipsum voluptas dignissimos et
                    minus!
                </p>
                <p class="email">Contact : mohamad@gmail.com</p>

            </div>
            <div class="col-md-5">
                <img src="https://via.placeholder.com/400x300" alt="Placeholder Image">
            </div>
        </div>
        <br>
        <br>
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Our Mission</h2>
                <br>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
                    natus inventore cum quam harum velit fugiat, aperiam doloribus quos
                    officia ipsa nihil quibusdam at enim ipsum voluptas dignissimos et
                    minus!
                </p>
                <p class="email">Contact : reve@gmail.com</p>

            </div>
            <div class="col-md-5">
                <img src="https://via.placeholder.com/400x300" alt="Placeholder Image">
            </div>
        </div>

    </div>

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