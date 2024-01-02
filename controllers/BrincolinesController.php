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
            'brincolines' => $brincolines
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
            $maxFileSize = 1.5 * 1024 * 1024;

            for ($i = 1; $i <= 4; $i++) {
                if (isset($_FILES["photo$i"]) && $_FILES["photo$i"]["error"] == UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES["photo$i"]['tmp_name'];
                    $fileSize = $_FILES["photo$i"]['size'];
                    list($width, $height, $fileType) = getimagesize($fileTmpPath);

                    if ($fileType === false || !in_array(image_type_to_extension($fileType, false), $allowedExtensions)) {
                        Brincolin::setAlert('error', "La Foto $i no es una imagen válida (jpg, jpeg o png).");
                    } elseif ($fileSize > $maxFileSize) {
                        Brincolin::setAlert('error', "La Foto $i excede el tamaño máximo permitido de 1.5 MB.");
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
                        $image = Image::make($_FILES["photo$i"]['tmp_name'])->fit(347, 450);

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
}
