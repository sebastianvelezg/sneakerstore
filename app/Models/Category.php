<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // Category Attributtes
  // $this->attributes['id'] - int - contains the product primary key
  // $this->attributes['name'] - string - contains the product name 
  // $this->attributes['description'] - string - contains the product description
  // $this->attributes['images'] - string - contains the path of image 

  protected $fillable = ['id', 'name', 'description', 'image', 'type'];

  public static function validate($request)
  {
    $request->validate([
      'name' => 'required|max:255',
      'description' => 'required|max:6000',
      'image' => 'required|image',
      'type' => 'required|max:255'
    ]);
  }

  public function getId()
  {
    return $this->attributes['id'];
  }

  public function setId($id)
  {
    $this->attributes['id'] = $id;
  }

  public function getName()
  {
    return $this->attributes['name'];
  }

  public function setName($name)
  {
    $this->attributes['name'] = $name;
  }

  public function getDescription()
  {
    return $this->attributes['description'];
  }

  public function setDescription($description)
  {
    $this->attributes['description'] = $description;
  }

  public function getImage()
  {
    return $this->attributes['image'];
  }

  public function setImage($image)
  {
    $this->attributes['image'] = $image;
  }

  public function getType()
  {
    return $this->attributes['type'];
  }

  public function setType($type)
  {
    $this->attributes['type'] = $type;
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