<?php 

include 'config.php';
session_start();

function alert($msg){
    echo "<script type='text/javascript'>window.alert('$msg'); window.location.href='../seperator/seperator.php';</script>";
}

// Check file valid then seperate and insert into database
if (isset($_POST['submit']) && $_POST['submit'] == 'upload')
{
    if ($_FILES['audio_in']['size'] > 0 && $_FILES['audio_in']['error'] == 0 && isset($_POST['stems']))
    {        
        if (!is_dir('../user_files/'.$_SESSION['username'].'/uploaded')) {
            mkdir('../user_files/'.$_SESSION['username'].'/uploaded', 0777, true);
        }

        if (!is_dir('../user_files/'.$_SESSION['username'].'/seperate')) {
            mkdir('../user_files/'.$_SESSION['username'].'/seperate', 0777, true);
        }
            
        // File path configuration
        $cur = $_SESSION['id'];
        $uploadDir = '../user_files/'.$_SESSION['username'].'/uploaded'.'/'; 
        $fileName = basename($_FILES['audio_in']['name']);
        $uploadOk = 1;
        $uploadFilePath = $uploadDir.$fileName;
        $file_info = pathinfo($fileName);
        $imageFileType = strtolower($file_info['extension']);
        // Check if $uploadOk is set to 0 by an error

        if (file_exists($uploadFilePath)) {
            alert("Sorry, file already exists !!! Please check your files");
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["audio_in"]["size"] > 50*1024*1024) {
            alert("Sorry, your file is too large.");
            $uploadOk = 0;
        }
            
        // Allow certain file formats
        if(!in_array($imageFileType, ["mp3", "mp4", "wav", "mpeg"])) {
            alert("Sorry only MP3, MP4, WAV, MPEG files are allowed.");
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            alert("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["audio_in"]["tmp_name"], $uploadFilePath)) {
                //insert file to db
                $conn->query("INSERT INTO files (file_name, user_id, uploaded_on, download) VALUES ('$fileName', $cur, NOW(), '$uploadFilePath')");

                //seperate model
                $stems_option = $_POST['stems'];
                $save_path = '../user_files/'.$_SESSION['username'].'/seperate';
                $err_code = null;
                system("python st.py $stems_option $uploadFilePath $save_path 2>&1", $err_code);

                //insert processed folder to db
                $tmp = $conn->query("SELECT * FROM files WHERE file_name='$fileName'");
                $row = mysqli_fetch_assoc($tmp);
                $parent = $row['id'];
                $folder_name = $file_info['filename'];
                $tmp2 = $save_path.'/'.$folder_name;
                $conn->query("INSERT INTO processed_folders (folder_name, parent_file_id, user_id, uploaded_on, download) VALUES ('$folder_name', $parent, $cur, NOW(), '$tmp2')");
                
                alert("Successful Seperate !!");
            } else {
                alert( "Sorry, there was an error uploading your file.");
            }
        }
    }else alert('No file upload or option selected!!');
}

?>