<?php

class Product extends \Eloquent {

    //property specifies which attributes should be mass-assignable.
    protected $fillable = array('category_id', 'title', 'description', 'price', 'availability', 'image');

    //setting up validation rules
    public static $rules = array(
        'category_id'=>'required|integer',
        'title'=>'required|min:2',
        'description'=>'required|min:20',
        'price'=>'required|numeric',
        'availability'=>'integer',
        'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
    );


    //creating relationship to specify that each product belongs to one category
    public function category() {
        return $this->belongsTo('Category');
    }


}