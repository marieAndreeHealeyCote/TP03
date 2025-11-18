<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Auth;
use App\Models\Log;

class UploadController
{
    public function __construct()
    {
        Auth::session();
        Auth::privilege(1);

        //noter dans journal de bord que l'utilisateur a visité cette page
        $log = new Log;
        $x = $log->insert(['username' => Auth::username(), 'page' => '/index', 'date' => date('Y-m-d H:i:s')]);
    }

    public function form()
    {
        require __DIR__ . '/../views/uploads/create.php';
    }

    public function upload()
    {
        if (!isset($_POST['submit']) || !isset($_FILES['fileToUpload'])) {
            die("Aucun fichier envoyé.");
        }

        // Code original adapté
        $target_dir = __DIR__ . '/../../public/uploads/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $message = "";

        // Vérifier si c'est une image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $message .= "File is an image - " . $check["mime"] . ".<br>";
        } else {
            $message .= "File is not an image.<br>";
            $uploadOk = 0;
        }

        // Fichier existe déjà
        if (file_exists($target_file)) {
            $message .= "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }

        // Taille max : 500Ko
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $message .= "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Formats autorisés
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }

        // Échec ?
        if ($uploadOk == 0) {
            $message .= "Sorry, your file was not uploaded.";
            require __DIR__ . '/../views/uploads/index.php';
            return;
        }

        // Upload OK -> déplacer le fichier
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["fileToUpload"]["name"]);
            $message .= "The file $filename has been uploaded.";
            $imagePath = "/uploads/" . $filename; // pour l'affichage
        } else {
            $message .= "Sorry, there was an error uploading your file.";
        }

        require __DIR__ . '/../views/uploads/index.php';
    }
}
