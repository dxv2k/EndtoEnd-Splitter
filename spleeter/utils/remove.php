<?php
    if(isset($_GET['file_path_remove']))
    {
        $file_id = $_GET['file_id_remove'];
        if($conn->query("DELETE FROM files where id = '$file_id'"))
        {
            unlink($_GET['file_path']);
            echo "<script type='text/javascript'>window.alert('Remove Successfully !!'); window.location.href='../users_UI/my_files.php';</script>";
        }
    }

    if(isset($_GET['folder_path_remove']))
    {
        $folder_id = $_GET['folder_id_remove'];
        $dirname = $_GET['folder_path_remove'];
        if($conn->query("DELETE FROM processed_folders where id = '$folder_id'"))
        {
            array_map('unlink', glob("$dirname/*.*")); //remove all contains befor remove folder
            rmdir($dirname);
            echo "<script type='text/javascript'>window.alert('Remove Successfully !!'); window.location.href='../users_UI/my_files.php';</script>";
        }
    }
?>