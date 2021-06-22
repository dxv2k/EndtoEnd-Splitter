<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../homepage.html");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Seperator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/separator.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- jquery for radiobutton swap -->
    <script>
        $(document).ready(function(){
            // $('input[type="radio"]').click(function(){
            //     var inputValue = $(this).attr("value");
            //     var targetBox = $("." + inputValue);
            //     $(".track-list").not(targetBox).hide();
            //     $(targetBox).show();
            // });
            
            $('.body .seperator input[type="file"]').change(function(e){
                $(this).siblings('input[type="text"]').val(e.target.files[0].name + '--' + (e.target.files[0].size/1024/1024).toFixed(2) +' Mb');
            }); 
        });

    </script>

</head>

<body>
    <header class="w-100">
        <nav class="navbar navbar-expand-sm">
            <a class="navbar-brand" href="#">
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
    <section class="body d-flex w-100">
        <div class="seperator">
            <p class="seperator-title">Music Separator</p>
            <form action='../utils/upload.php' method="post" class="form-group" enctype="multipart/form-data">
                <div class="body-browse w-100">
                    <!-- actual upload which is hidden -->
                    <input type="file" id="actual-btn" name="audio_in" hidden/>
                    <!-- our custom upload button -->
                    <label class="file-lb" for="actual-btn" style="cursor: pointer;">Choose File</label>
                    <!-- name of file chosen -->
                    <input type="text" value="No file chosen" class="file-chosen" style="font-family: sans-serif;"readonly>
                </div>
                <div class="body-radiobtn">
                    <label class="sp-font"><input type="radio" name="stems" value="2stems">2-stems model</label><br>
                    <label class="sp-font"><input type="radio" name="stems" value="4stems">4-stems model</label><br>
                    <label class="sp-font"><input type="radio" name="stems" value="5stems">5-stems model</label>
                </div>
                <button type="submit" class="body-btn btn-seperator" name="submit" value="upload">Seperator</button>
            </form>
        </div>
    </section>
    <section class="footer">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>