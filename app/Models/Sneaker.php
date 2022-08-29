<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    protected $table = 'sneakers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'colorway', 'brand', 'description', 'releasedate', 'retailprice', 'price'];

  public function getId()
  {
    return $this->attributes['id'];
  }
  public function setId($id)
  {
    return $this->attributes['id'] = $id;
  }

  public function getName()
  {
    return $this->attributes['name'];
  }
  public function setName($name)
  {
    return $this->attributes['name'] = $name;
  }

  public function getColorway()
  {
    return $this->attributes['colorway'];
  }
  public function setColorway($colorway)
  {
    return $this->attributes['colorway'] = $colorway;
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

  public function getReleasedate()
  {
    return $this->attributes['releasedate'];
  }
  public function setReleasedate($releasedate)
  {
    return $this->attributes['releasedate'] = $releasedate;
  }

  public function getRetailprice()
  {
    return $this->attributes['retailprice'];
  }
  public function setRetailprice($retailprice)
  {
    return $this->attributes['retailprice'] = $retailprice;
  }

  public function getPrice()
  {
    return $this->attributes['price'];
  }
  public function setPrice($price)
  {
    return $this->attributes['price'] = $price;
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
