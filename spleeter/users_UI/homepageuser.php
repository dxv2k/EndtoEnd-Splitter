<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../homepage.html");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/homepageuser.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="w-100">
        <nav class="navbar navbar-expand-sm">
            <a class="navbar-brand">
                <img src="../img/logo.png" class="w-100 h-100 mb-4" alt="">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="./homepageuser.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./separator.php">Separator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./track_list.php">Track List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./mixer.php">Mixer</a>
                    </li>
                </ul>
                <div class="d-flex user">
                    <div class="user-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="user-option dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><?php echo "Hi, " . $_SESSION['username']; ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="./my_files.php">My Files</a></li>
                            <li><a href="../utils/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="body row w-100 m-0">
        <div class="text col-7 d-flex">
            <div>
                <p class="wtm">WELCOME<br> to <br> MuSep</p>
                <p class="text-detail">Separator - extract elemental audio from original track
                    <br>(vocals, drum, bass, piano, instrument)
                    <br>Mixer - combine various audios to a complete track
                </p>
            </div>
        </div>
        <div class="d-flex col-5" style="justify-content: center; align-items: center; height: 600px;">
            <div class="mot h150">
            </div>
            <div class="mot h300">
            </div>
            <div class="mot h500">
            </div>
            <div class="mot h250">
            </div>
            <div class="mot h150">
            </div>
            <div class="mot h300">
            </div>
            <div class="mot h500">
            </div>
            <div class="mot h250">
            </div>
            <div class="mot h150">
            </div>
        </div>
    </section>
    <section class="footer">

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>