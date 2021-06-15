<?php
    if(isset($_GET['folder_path_download']))
    {
        $folder_path = $_GET['folder_path_download'];
        $zipname = $_GET['folder_name_download'].'.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        if ($handle = opendir($folder_path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." ){
                    $zip->addFile($entry);
                }
            }
            closedir($handle);
        }

        $zip->close();

        header('Content-Type: application/zip');
        header("Content-Disposition: attachment; filename=$zipname");
        header('Content-Length: ' . filesize($zipname));
        header("Pragma: no-cache"); 
        header("Expires: 0"); 
        readfile("$zipname");

    }
?>