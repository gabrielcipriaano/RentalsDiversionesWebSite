<?php

namespace Controllers;

use MVC\Router;
use Models\Furniture;
use Intervention\Image\ImageManagerStatic as Image;

class FurnitureController
{
    public static function furniture(Router $router)
    {
        $furnitures = Furniture::all();
        $router->renderView('furniture/index', [
            'main' => false,
            'furnitures' => $furnitures,
            'find' => false
        ]);
    }
    public static function create(Router $router)
    {
        ini_set('memory_limit', '512M');
        $furniture = new Furniture();
        $alerts = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagesUploaded = 0;
            $furniture->sync($_POST);
            if (!is_dir(IMAGES_FOLDER)) {
                mkdir(IMAGES_FOLDER);
            }

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $maxFileSize = 2.4 * 1024 * 1024;

            for ($i = 1; $i <= 4; $i++) {
                if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES["photo$i"]['tmp_name'];
                    $fileSize = $_FILES["photo$i"]['size'];
                    list($width, $height, $fileType) = getimagesize($fileTmpPath);

                    if ($fileType === false || !in_array(image_type_to_extension($fileType, false), $allowedExtensions)) {
                        furniture::setAlert('error', "La Foto $i no es una imagen válida (jpg, jpeg o png).");
                    } elseif ($fileSize > $maxFileSize) {
                        furniture::setAlert('error', "La Foto $i excede el tamaño máximo permitido de 2.4 MB.");
                    } else {
                        $imagesUploaded++;
                    }
                } else {
                    furniture::setAlert('error', "La Foto $i es obligatoria.");
                }
            }


            $alerts = $furniture->validate();

            if (empty($alerts) && $imagesUploaded === 4) {
                for ($i = 1; $i <= 4; $i++) {
                    if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                        $image = Image::make($_FILES["photo$i"]['tmp_name'])->resize(null, 450, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        $imageName = md5(uniqid(rand(), true)) . ".jpg";
                        $furniture->setImage($imageName, $i);
                        $image->encode('jpg', 80)->save(IMAGES_FOLDER . $imageName);
                    }
                }
                $furniture->save() ? header('Location: /admin-furniture?result=4') : die();
            }

            $alerts = furniture::getAlerts();
        }
        $router->renderView('furniture/create', [
            'main' => false,
            'alerts' => $alerts,
            'furniture' => $furniture
        ]);
    }

    public static function update(Router $router)
    {
        $alerts = [];
        $_GET['id'] ? $id = s($_GET['id']) : header('Location: /admin-furniture');
        $furniture = new furniture();
        $furniture = furniture::where('id', $id);

        if (!$furniture) {
            header('Location: /admin-furniture');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagesUploaded = [];
            $furniture->sync($_POST);
            if (!is_dir(IMAGES_FOLDER)) {
                mkdir(IMAGES_FOLDER);
            }

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $maxFileSize = 2.4 * 1024 * 1024;

            for ($i = 1; $i <= 4; $i++) {
                if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES["photo$i"]['tmp_name'];
                    $fileSize = $_FILES["photo$i"]['size'];
                    list($width, $height, $fileType) = getimagesize($fileTmpPath);

                    if ($fileType === false || !in_array(image_type_to_extension($fileType, false), $allowedExtensions)) {
                        furniture::setAlert('error', "La Foto $i no es una imagen válida (jpg, jpeg o png).");
                    } elseif ($fileSize > $maxFileSize) {
                        furniture::setAlert('error', "La Foto $i excede el tamaño máximo permitido de 2.4 MB.");
                    } else {
                        $imagesUploaded[] = $i;
                    }
                }
            }

            $alerts = $furniture->validate();

            if (empty($alerts)) {

                $furniture->deletePhotos($imagesUploaded);
                foreach ($imagesUploaded as $i) {
                    if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                        $image = Image::make($_FILES["photo$i"]['tmp_name'])->resize(null, 450, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        $imageName = md5(uniqid(rand(), true)) . ".jpg";
                        $furniture->setImage($imageName, $i);
                        $image->encode('jpg', 80)->save(IMAGES_FOLDER . $imageName);
                    }
                }
                $furniture->save() ? header('Location: /admin-furniture?result=5') : die();
            }

            $alerts = Furniture::getAlerts();
        }



        $router->renderView('furniture/update', [
            'main' => false,
            'alerts' => $alerts,
            'furniture' => $furniture
        ]);
    }

    public static function delete()
    {

        filter_var($_POST['id'], FILTER_VALIDATE_INT) && $_POST['id']
            ? $id = s($_POST['id']) : header('Location: /admin-furniturees');

        $furniture = furniture::where('id', $id);

        if (!$furniture) {
            header('Location: /admin-furniture');
        }

        if ($furniture->delete()) {
            $images = [1, 2, 3, 4];
            $furniture->deletePhotos($images);
            header('Location: /admin-furniture?result=6');
        }
    }

    public static function find(Router $router)
    {   
        $furnitures = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['brincolin']) {
            $furnitures = Furniture::search($_POST['brincolin']);
        }
        $router->renderView('furniture/index', [
            'main' => false,
            'furnitures' => $furnitures,
            'find' => true
        ]);
    }
}
