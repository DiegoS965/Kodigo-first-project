<?php
    require_once ("controller.php");

    if(isset($_GET['IDTarea']))
    {
        $file=new FileController(new Connection);
        $file->downloadTask();
        
        $_SESSION['rol']='profesor';
/*         header("Content-type: " . "pdf");
        ob_clean();
        flush();
        echo $file->Documento; */
        //$file=$file['Documento'];
        $size=filesize($file->Documento);
        header("Content-length: $size");
        $type=explode(".",$file->Documento);
        $typeF=".".$type[1];
        header("Content-type: $typeF");
        header("Content-Type: application/force-download"); 
        header("Content-Disposition: attachment; filename=$type[0]");
        header("Content-Type: application/octet-stream;");
        echo $file->Documento;
        //header("Location: index.php");
    }

?>