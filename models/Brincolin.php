<?php

namespace Models;

class Brincolin extends ActiveRecord
{
    protected static $table = 'brincolines';
    protected static $dbColumns = [
        'id',
        'name',
        'description',
        'capacity',
        'length',
        'height',
        'width',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
    ];

    public $id;
    public $name;
    public $description;
    public $capacity;
    public $length;
    public $height;
    public $width;
    public $photo1;
    public $photo2;
    public $photo3;
    public $photo4;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->capacity = $args['capacity'] ?? '';
        $this->length = $args['length'] ?? '';
        $this->height = $args['height'] ?? '';
        $this->width = $args['width'] ?? '';
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

        if (!$this->capacity) {
            self::$alerts['error'][] = 'La capacidad está vacía';
        }

        if (!$this->length) {
            self::$alerts['error'][] = 'Ingresa el largo del brincolín';
        }

        if (!$this->height) {
            self::$alerts['error'][] = 'Ingresa la altura del brincolín';
        }

        if (!$this->width) {
            self::$alerts['error'][] = 'Ingresa el ancho del brincolín';
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

    public function deleteImagen($image)
    {
        $fileExist = file_exists(IMAGES_FOLDER . $image);
        if ($fileExist) {
            unlink(IMAGES_FOLDER . $image);
        }
    }
}
