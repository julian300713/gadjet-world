<?php

class CategoriesController extends \BaseController {

    //csrf request filter to protect our POST requests
    //admin filter will protect actions from categories controller
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('admin');
    }


    /**
     * Display a listing of the resource.
     * GET /categories
     * prefix with GET HTTP ver to make it web accessible
     * @return Response
     */
    public function getIndex()
    {
        //return a view to be displayed from categories folder slash index.php
        //use with method to pass category table details along with the view
        //using the models all method to grab the categories
        return View::make('categories.index')
            ->with('categories', Category::all());


    }

    /**
     * Show the form for creating a new resource.
     * GET /categories/create
     * prefix with POST HTTP ver to make it web accessible
     * @return Response
     */
    public function postCreate()
    {
        //create validator object to use to qualify it for validation rules
        $validator = Validator::make(Input::all(), Category::$rules);

        //run check to see if it passes
        if($validator->passes()){
            //create new category & save it into database
            //create variable to hold new object instance
            $category = new Category();

            //set the objects name to whatever was submitted from the form
            $category->name = Input::get('name');

            //save details into the database using orm's save method
            $category->save();

            //redirect user back to categories admin page & display success message
            return Redirect::to('admin/categories/index')
                ->with('message', '<div class="alert alert-success">Category Created</div>');



        }

        //if not redirect with different flash message
        return Redirect::to('admin/categories/index')
            ->with('message', '<div class="alert alert-danger">Something Went Wrong</div>')
            ->withErrors($validator)
            ->withInput();

    }



    public function postDestroy()
    {
        //for delete button submitting hidden field ofcategory we want to delete
        //retrieve reference to it by using id submitted by the form
        $category = Category::find(Input::get('id'));

        //checking to see if we found category before deleting it
        if($category){
            $category->delete();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category Deleted');
        }

        //if it cant delete redirect with error message
        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong please try again');

    }

}