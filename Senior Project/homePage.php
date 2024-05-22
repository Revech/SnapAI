<!-- Mohamad Al-Nakib -->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=League+Spartan:wght@100..900&display=swap" rel="stylesheet" />

    <style>
        /* Video Background */
        * {
            font-family: "League Spartan", sans-serif;
        }

        video {
            width: 100%;
            height: auto;
        }

        .section-video {
            padding: 0%;
            position: relative;
            background-size: cover;
        }



        .hero-h1 {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .hero-p {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: rgb(255, 255, 255);
            font-size: 1.5rem;
        }

        .hero-btn {
            position: absolute;
            z-index: 1;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.25rem;
        }


        @media (max-width : 768px) {
            .hero-h1 img {
                height: 75px;
            }

            .hero-h1 {
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .hero-p {
                position: absolute;
                width: 450px;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: rgb(255, 255, 255);
                font-size: 0.75rem;
            }

            .hero-btn {
                position: absolute;
                z-index: 1;
                top: 75%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 0.90rem;
            }
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

                <!-- Links -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                    <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="./homePage.php">Home</a>
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

    <!-- /* Video Background */ -->
    <section class="section-video hero-video min-vh-100">
        <h1 class="hero-h1">
            <img src="../Images/Snap_Sign_Speak_Logo.png" alt="Snap Sign Speak Logo" height="150px" />
        </h1>
        <p class="lead text-center hero-p">
            Welcome to our innovative platform where the power of technology meets
            the beauty of sign language! Our mission is to bridge communication
            gaps and make information accessible to everyone, regardless of
            hearing ability.
        </p>
        <a class="btn btn-primary hero-btn" href="http://127.0.0.1:5000">Try Our Model</a>
    </section>

    <br>
    <br>

    <!-- START THE FEATURETTES -->
    <div class="container marketing">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Image Upload</h2>
                <br>
                <ul class="lead">
                    <li><strong>Instructions:</strong> Upload an image containing sign language gestures for analysis.
                    </li>
                    <li><strong>Accepted Formats:</strong> JPEG, PNG, etc.</li>
                    <li><strong>File Size Limit:</strong> Maximum file size: 2 MB.</li>
                    <li><strong>Tips for Clear Images:</strong>
                        <ul>
                            <li>Ensure the sign language gestures are clearly visible in the image.</li>
                            <li>Use good lighting.</li>
                            <li>Capture the gestures from an appropriate angle.</li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="col-md-5">
                <img src="https://via.placeholder.com/500x300" alt="Placeholder Image">
            </div>
        </div>
        <br>
        <br>
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Video Upload</h2>
                <br>
                <ul class="lead">
                    <li><strong>Instructions:</strong> Upload a video containing sign language gestures for analysis.
                    </li>
                    <li><strong>Accepted Formats:</strong> MP4, etc.</li>
                    <li><strong>File Size Limit:</strong> Maximum file size: 20 MB.</li>
                    <li><strong>Tips for Clear Videos:</strong>
                        <ul>
                            <li>Ensure the sign language gestures are clearly visible in the video.</li>
                            <li>Use good lighting.</li>
                            <li>Capture the gestures from an appropriate angle.</li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="col-md-5">
                <img src="https://via.placeholder.com/500x300" alt="Placeholder Image">
            </div>
        </div>

    </div>
    <!-- /END THE FEATURETTES -->

    <!--FOOTER SECTION-->
    <br>
    <br>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
        <p class="text-center text-body-secondary">© 2024 Snap Sign Speak, Inc</p>
    </footer>

    <!-- /* Video Background */ -->
    <script>
        const video = document.createElement("video");
        video.src = "../Images/Background_Video.mp4";
        video.autoplay = true;
        video.loop = true;
        video.muted = true;

        const section = document.querySelector(".hero-video");
        section.append(video);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>