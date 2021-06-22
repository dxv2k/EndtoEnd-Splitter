<?php 

include '../database/config.php';
session_start();

function alert($msg){
    echo "<script type='text/javascript'>window.alert('$msg'); window.location.href='../users_UI/separator.php';</script>";
}

function check_dir($dir)
{
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

function check_valid($file_size, $file_type)
{
    if ($file_size > 50*1024*1024) {
        alert("Sorry, your file is too large.");
    }
        
    // Allow certain file formats
    else if(!in_array($file_type, ["mp3", "mp4", "wav", "mpeg"])) {
        alert("Sorry only MP3, MP4, WAV, MPEG files are allowed.");
    }
    else
        return TRUE;

}

function separate_model($folder_name, $stems_option, $cur, $uploadFilePath, $conn, $fileName)
{
    // $stems_option = $_POST['stems'];
    // $folder_name = $file_info['filename'];
    $save_path = '../user_files/'.$_SESSION['username'].'/separate'.'/'.$stems_option.'/';
    if(!is_dir($save_path.$folder_name)) // check if file already seperate with this stems option
    {
        $err_code = null;
        system("python st.py $stems_option $uploadFilePath $save_path 2>&1", $err_code);
    
        //insert processed folder to db
        $tmp = $conn->query("SELECT * FROM files WHERE file_name='$fileName'");
        $row = mysqli_fetch_assoc($tmp);
        $parent = $row['id'];
        $tmp2 = $save_path.$folder_name;
        if($conn->query("INSERT INTO processed_folders (folder_name, parent_file_id, user_id, stem_option, uploaded_on, download) VALUES ('$folder_name', $parent, $cur, '$stems_option', NOW(), '$tmp2')"))
        {
        alert("Successful Separate !! Please check and download zip at My Files");
        } else alert("Sorry, there was an error separate your file.");
    } else alert("The file already separated with this stem option !!");
}

// Check file valid then seperate and insert into database
if (isset($_POST['submit']) && $_POST['submit'] == 'upload')
{
    if ($_FILES['audio_in']['size'] > 0 && $_FILES['audio_in']['error'] == 0 && isset($_POST['stems']))
    {        
        check_dir('../user_files/'.$_SESSION['username'].'/uploaded');

        check_dir('../user_files/'.$_SESSION['username'].'/separate');

        // File path configuration
        $cur = $_SESSION['id'];
        $uploadDir = '../user_files/'.$_SESSION['username'].'/uploaded'.'/'; 
        $fileName = basename($_FILES['audio_in']['name']);
        $uploadOk = 1;
        $uploadFilePath = $uploadDir.$fileName;
        $file_info = pathinfo($fileName);
        $imageFileType = strtolower($file_info['extension']);
        // Check if $uploadOk is set to 0 by an error

        // Check file size and type
        if(check_valid($_FILES["audio_in"]["size"], $imageFileType))
        {
            if ($uploadOk == 0) {
                alert("Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
            } else 
            {
                if (!file_exists($uploadFilePath)) // check if file already uploaded in uploaded folder
                {
                    if (move_uploaded_file($_FILES["audio_in"]["tmp_name"], $uploadFilePath)) {
                        //insert file to db
                        $size = round(($_FILES["audio_in"]["size"]/1024/1024),2);
                        $conn->query("INSERT INTO files (file_name, user_id, size_Mb, uploaded_on, download) VALUES ('$fileName', $cur, $size, NOW(), '$uploadFilePath')");
        
                        //seperate model
                        separate_model($file_info['filename'], $_POST['stems'], $cur, $uploadFilePath, $conn, $fileName);
                    } else alert( "Sorry, there was an error uploading your file.");
                }
                else
                {
                    //seperate model
                    separate_model($file_info['filename'], $_POST['stems'], $cur, $uploadFilePath, $conn, $fileName);
                }
            }
        }
    } else alert('No file upload or option selected!!');
}

?>