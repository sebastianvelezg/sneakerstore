<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $table = 'accessories';
    protected $primaryKey = 'id';
    protected $fillable = ['type', 'brand', 'description', 'material', 'price','image', 'id_category'];

    public static function validate($request)
    {
        $request->validate([
        'type' => 'required|max:255',
        'brand' => 'required:max:6000',
        'description' => 'required:number',
        'material' => 'required|max:255',
        'price' => 'required|max:2000',
        'idCategory' => 'required:number',
        'image' => 'required|image'
      ]);
    }

    public static function validateUpdate($request)
    {
        $request->validate([
        'type' => 'required|max:255',
        'brand' => 'required:max:6000',
        'description' => 'required:number',
        'material' => 'required|max:255',
        'price' => 'required|max:2000',
        'idCategory' => 'required:number',
        'image' => 'required|image'
      ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        return $this->attributes['id'] = $id;
    }

    public function getType()
    {
        return $this->attributes['type'];
    }
    public function setType($type)
    {
        return $this->attributes['type'] = $type;
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }
    public function setBrand($brand)
    {
        return $this->attributes['brand'] = $brand;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }
    public function setDescription($description)
    {
        return $this->attributes['description'] = $description;
    }

    public function getMaterial()
    {
        return $this->attributes['material'];
    }
    public function setMaterial($material)
    {
        return $this->attributes['material'] = $material;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }
    public function setPrice($price)
    {
        return $this->attributes['price'] = $price;
    }

    public function getIdCategory()
    {
        return $this->attributes['id_category'];
    }
    public function setIdCategory($id_category)
    {
        return $this->attributes['id_category'] = $id_category;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {
        return $this->attributes['image'] = $image;
    }

    public function getCreateAt()
    {
        return $this->attributes['created_at'];
    }
    public function getUpdateAt()
    {
        return $this->attributes['updated_at'];
    }
}
