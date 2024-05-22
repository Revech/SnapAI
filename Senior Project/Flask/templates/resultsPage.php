<!-- Mohamad Al-Nakib -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=League+Spartan:wght@100..900&display=swap" rel="stylesheet" />
    <title>Transcript</title>
    <style>
        * {
            font-family: "League Spartan", sans-serif;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        .text {
            margin: 50px;
            font-size: 100px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-sm fixed-top bg-light">
            <div class="container-fluid">
                <a href="http://localhost:3000/homePage.php">
                    <img src="http://localhost:3000/Images/Snap_Sign_Speak_Logo.png" alt="Website Logo" height="80px" />
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:5000">Try Our Model Again</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="bg-img">
    <div class="box">
        <h1 style="color : #0d6efd;">Transcript</h1>

        <div class="text">
            <p>{{ unique_names }}</p>
        </div>
    </div>
    </div>
    <!--FOOTER SECTION-->
    <br>
    <br>
    <footer class="py-3 my-4" style="background-color: white;">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
        <p class="text-center text-body-secondary">© 2024 Snap Sign Speak, Inc</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>