<?php

namespace Models;

class Furniture extends ActiveRecord
{
    protected static $table = 'furniture';
    protected static $dbColumns = [
        'id',
        'name',
        'description',
        'photo1',
        'photo2',
        'photo3',
        'photo4'
    ];

    public $id;
    public $name;
    public $description;
    public $photo1;
    public $photo2;
    public $photo3;
    public $photo4;
    


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->photo1 = $args['photo1'] ?? '';
        $this->photo2 = $args['photo2'] ?? '';
        $this->photo3 = $args['photo3'] ?? '';
        $this->photo4 = $args['photo4'] ?? '';
    }


    public function validate()
    {
        if (!$this->name) {
            self::$alerts['error'][] = 'El nombre es obligatorio';
        }

        if (!$this->description || strlen($this->description) < 20) {
            self::$alerts['error'][] = 'Ingresa una descripción de al menos 20 caracteres';
        }


        return  self::$alerts;
    }

    public function setImage($image, $order)
    {

        if ($image) {
            switch ($order) {
                case 1:
                    $this->photo1 = $image;
                    break;
                case 2:
                    $this->photo2 = $image;
                    break;
                case 3:
                    $this->photo3 = $image;
                    break;
                case 4:
                    $this->photo4 = $image;
                    break;
                default:
                    return;
                    break;
            }
        }
    }

    public function deletePhotos($images)
    {
        foreach ($images as $order) {
            switch ($order) {
                case 1:
                    $this->deleteImage($this->photo1);
                    break;
                case 2:
                    $this->deleteImage($this->photo2);
                    break;
                case 3:
                    $this->deleteImage($this->photo3);
                    break;
                case 4:
                    $this->deleteImage($this->photo4);
                    break;
                default:
                    return;
                    break;
            }
        }
    }

    public function deleteImage($image)
    {
        $fileExist = file_exists(IMAGES_FOLDER . $image);
        if ($fileExist) {
            unlink(IMAGES_FOLDER . $image);
        }
    }
}
