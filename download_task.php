<?php
    require_once ("controller.php");

    if(isset($_GET['IDTarea']))
    {
        $file=CrudController::downloadTask();
        $_SESSION['rol']='profesor';
        $file=$file['Documento'];
        echo var_dump($file);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
        header("Location: index.php");
    }

?>