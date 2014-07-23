<?php

class Category extends \Eloquent {

    //to protect ourselves from mass assignment
    protected $fillable = array('name');

    public static $rules = array('name'=>'required|min:3');

    //creating relationship to specify that a category has many products
    public function products() {
        return $this->hasMany('Product');
    }

}