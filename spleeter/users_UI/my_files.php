<?php 

session_start();
include '../database/config.php';
include '../utils/download_folder.php';
include '../utils/remove.php';


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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="../assets/my_files.css?v=<?php echo time(); ?>">

        <script>
            $(document).ready(function(){
                $('input[type="radio"]').click(function(){
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".body-table").not(targetBox).hide();
                    $(targetBox).show();
                });
            });
        </script>
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
            <div class="top">
                <div class="body-radiobtn d-flex">
                    <label class="sp-font upload-btn"><input type="radio" name="user-table" value="upload">Uploaded</label>
                    <label class="sp-font separate-btn"><input type="radio" name="user-table" value="separate">Separated</label>
                </div>
            </div>
            <hr style="border: 1px solid white;">
            <div class="bottom">

                <div class="upload body-table">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>File Name</th>
                            <th>Size(Mb)</th>
                            <th>Upload On</th>
                            <th>Download</th>
                            <th>Remove</th>
                        </thead>
                        <tbody>
                            <?php
                                $id = $_SESSION['id'];
                                $result = $conn->query("SELECT * FROM files where user_id='$id'");
                                while($files = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $files['id']; ?> </td>
                                <td><?php echo $files['file_name']; ?> </td>
                                <td><?php echo $files['size_Mb']; ?> </td>
                                <td><?php echo $files['uploaded_on']; ?> </td>
                                <td><a href=<?php echo $files['download'];?>>Download</a></td>
                                <td><a href='my_files.php?file_path_remove=<?php echo $files['download'];?>&file_id_remove=<?php echo $files['id']; ?>' style="color: red;">Remove</a></td>
                            </tr>
                            <?php
                                }
                            ?>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="separate body-table">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Folder Name</th>
                            <th>Stem Option</th>
                            <th>Upload On</th>
                            <th>Download</th>
                            <th>Remove</th>
                        </thead>
                        <tbody>
                            <?php
                                $id = $_SESSION['id'];
                                $result = $conn->query("SELECT * FROM processed_folders where user_id='$id'");
                                while($files = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $files['id']; ?> </td>
                                <td><?php echo $files['folder_name']; ?> </td>
                                <td><?php echo $files['stem_option']; ?> </td>
                                <td><?php echo $files['uploaded_on']; ?> </td>
                                <td><a href='my_files.php?folder_path_download=<?php echo $files['download'];?>&folder_name_download=<?php echo $files['folder_name'].'_'.$files['stem_option'];?>'>Download</a></td>
                                <td><a href='my_files.php?folder_path_remove=<?php echo $files['folder_name']; ?>&folder_id_remove=<?php echo $files['id']; ?>' style="color: red;">Remove</a></td>
                            </tr>
                            <?php
                                }
                            ?>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>

                            <tr>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td>Dummy</td>
                                <td><a href='#'>Download</a></td>
                                <td><a href='#' style="color: red;">Remove</a></td>
                            </tr>
                        </tbody>
                    </table>
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