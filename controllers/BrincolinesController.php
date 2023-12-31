<?php

namespace Controllers;

use Models\Brincolin;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class BrincolinesController
{
    public static function brincolines(Router $router)
    {
        $brincolines = Brincolin::all();
        $router->renderView('brincolines/index', [
            'main' => false,
            'brincolines' => $brincolines,
            'find' => false
        ]);
    }
    public static function create(Router $router)
    {
        ini_set('memory_limit', '512M');
        $brincolin = new Brincolin();
        $alerts = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagesUploaded = 0;
            $brincolin->sync($_POST);
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
                        Brincolin::setAlert('error', "La Foto $i no es una imagen válida (jpg, jpeg o png).");
                    } elseif ($fileSize > $maxFileSize) {
                        Brincolin::setAlert('error', "La Foto $i excede el tamaño máximo permitido de 2.4 MB.");
                    } else {
                        $imagesUploaded++;
                    }
                } else {
                    Brincolin::setAlert('error', "La Foto $i es obligatoria.");
                }
            }


            $alerts = $brincolin->validate();

            if (empty($alerts) && $imagesUploaded === 4) {
                for ($i = 1; $i <= 4; $i++) {
                    if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                        $image = Image::make($_FILES["photo$i"]['tmp_name'])->resize(null, 450, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        $imageName = md5(uniqid(rand(), true)) . ".jpg";
                        $brincolin->setImage($imageName, $i);
                        $image->encode('jpg', 80)->save(IMAGES_FOLDER . $imageName);
                    }
                }
                $brincolin->save() ? header('Location: /admin-brincolines?result=1') : die();
            }

            $alerts = Brincolin::getAlerts();
        }
        $router->renderView('brincolines/create', [
            'main' => false,
            'alerts' => $alerts,
            'brincolin' => $brincolin
        ]);
    }

    public static function update(Router $router)
    {
        $alerts = [];
        $_GET['id'] ? $id = s($_GET['id']) : header('Location: /admin-brincolines');
        $brincolin = new Brincolin();
        $brincolin = Brincolin::where('id', $id);

        if (!$brincolin) {
            header('Location: /admin-brincolines');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagesUploaded = [];
            $brincolin->sync($_POST);
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
                        Brincolin::setAlert('error', "La Foto $i no es una imagen válida (jpg, jpeg o png).");
                    } elseif ($fileSize > $maxFileSize) {
                        Brincolin::setAlert('error', "La Foto $i excede el tamaño máximo permitido de 2.4 MB.");
                    } else {
                        $imagesUploaded[] = $i;
                    }
                }
            }

            $alerts = $brincolin->validate();

            if (empty($alerts)) {

                $brincolin->deletePhotos($imagesUploaded);
                foreach ($imagesUploaded as $i) {
                    if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                        $image = Image::make($_FILES["photo$i"]['tmp_name'])->resize(null, 450, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        $imageName = md5(uniqid(rand(), true)) . ".jpg";
                        $brincolin->setImage($imageName, $i);
                        $image->encode('jpg', 80)->save(IMAGES_FOLDER . $imageName);
                    }
                }
                $brincolin->save() ? header('Location: /admin-brincolines?result=2') : die();
            }

            $alerts = Brincolin::getAlerts();
        }



        $router->renderView('brincolines/update', [
            'main' => false,
            'alerts' => $alerts,
            'brincolin' => $brincolin
        ]);
    }

    public static function delete()
    {

        filter_var($_POST['id'], FILTER_VALIDATE_INT) && $_POST['id']
            ? $id = s($_POST['id']) : header('Location: /admin-brincolines');

        $brincolin = Brincolin::where('id', $id);

        if (!$brincolin) {
            header('Location: /admin-brincolines');
        }

        if ($brincolin->delete()) {
            $images = [1, 2, 3, 4];
            $brincolin->deletePhotos($images);
            header('Location: /admin-brincolines?result=3');
        }
    }

    public static function find(Router $router)
    {   
        $brincolines = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['brincolin']) {
            $brincolines = Brincolin::search($_POST['brincolin']);
        }
        $router->renderView('brincolines/index', [
            'main' => false,
            'brincolines' => $brincolines,
            'find' => true
        ]);
    }
}
