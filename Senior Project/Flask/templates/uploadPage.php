<!-- Mohamad Al-Nakib -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=League+Spartan:wght@100..900&display=swap" rel="stylesheet" />


    <style>
        * {
            font-family: "League Spartan", sans-serif;
        }
        
        .bigBox {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 100px;
            height: 100vh;
        }

        .Box {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 100px;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 50px;
            border-radius: 30px;
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
                <!-- Links -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                    <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:3000/homePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Try Our Model</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-5" href="http://localhost:3000/aboutUsPage.php">About Us</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main -->
    <div class="bigBox">
        <main class="my-5">
            <div id="box">
                <div class="container mt-5">
                    <form id="upload-form" class="upl-container" method="POST" action="predict" enctype="multipart/form-data">

                        <div class="input-group">
                            <i class="bx bxs-cloud-upload icon"></i>
                            <span class="">
                                Drag and drop file here
                                <input type="file" onChange="dragNdrop(event)" name="myfile" ondragover="drag()" ondrop="drop()" id="myfile" class="form-control" />
                                <!-- id="myfile" accept="video/*,image/*" /> -->
                            </span>
                        </div>
                        <div id="preview">
                            <p id="preview-text"></p>
                            <img id="preview-img" src="" alt="" height="500px">
                        </div>
                        <input type="submit" id="upload-btn" value="Upload file" class="btn btn-primary mt-5 w-100" />
                    </form>

                </div>
            </div>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        AWS.config.update({});
    </script>
    <script>
        "use strict";
        const uploadBtn = document.getElementById('upload-btn')
        var fileName,
            preview = document.getElementById("preview"),
            previewImg = document.getElementById("preview-img"),
            previewtext = document.getElementById("preview-text");

        function dragNdrop(event) {
            let file = event.target.files[0]
            if (!file)
                return
            fileName = URL.createObjectURL(file);
            previewImg.setAttribute("src", fileName);
            uploadBtn.style.display = 'block';
            previewtext.innerHTML = `File selected: <b>${file.name}</b>`
        }

        function drag() {
            document.getElementById('myfile').parentNode.className = 'draging dragBox';
        }

        function drop() {
            document.getElementById('myfile').parentNode.className = 'dragBox';
        }

        function handleUpload() {
            uploadBtn.disabled = true;
            const local_server_url = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;
        }
    </script>

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