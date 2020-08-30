<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['title', 'category', 'detail','price',
    'designer','pg', 'keyword'
        // This is the category of game, for example pg +18 'stock',
        /* The others fillable labels are not enable 'cause these are not primitive data fields 
        'comments', 'items', 'videos', 'wishList'*/
    ];
    
    /* id */
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    /* Title */
    public function getTitle()
    {
        return $this->attributes['title'];
    }
    public function setTitle($title)
    {
        $this->attributes['name'] = $title;
    }
    /* Category */
    public function getCategory()
    {
        return $this->attributes['category'];
    }
    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }
    /* Details */
    public function getDetails()
    {
        return $this->attributes['detail'];
    }
    public function setDetails($detail)
    {
        $this->attributes['detail'] = $detail;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }
    public function setPrice( $price)
    {
        $this->attributes['price'] = $price;
    }
    /* Designer */
    public function getDesigner()
    {
        return $this->attributes['designer'];
    }
    public function setDesigner($designer)
    {
        $this->attributes['designer'] = $designer;
    }
    /* PG */
    public function getPg()
    {
        return $this->attributes['pg'];
    }
    public function setPg($pg)
    {
        $this->attributes['pg'] = $pg;
    }
    /* Keyword */
    public function getKeyword()
    {
        return $this->attributes['keyword'];
    }
    public function setKeyword($keyword)
    {
        $this->attributes['keyword'] = $keyword;
    }
    
}
