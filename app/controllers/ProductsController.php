<?php

class ProductsController extends BaseController {

    //csrf request filter to protect our POST requests
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('admin');

        //shares category information with all views
        $this->beforeFilter(function() {
            View::share('catnav', Category::all());
        });
    }


    /**
     * Display a listing of the resource.
     * GET /categories
     * prefix with GET HTTP ver to make it web accessible
     * @return Response
     */
    public function getIndex()
    {
        //return a view to be displayed from products folder slash index.php
        //use with method to pass product table details along with the view
        //using the models all method to grab the categories


        //create array of categories contaning category id & its name for use with select menu
        $categories = array();

        //store id as key name as value
        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        //chain another with method to make categories available

        return View::make('products.index')
            ->with('products', Product::all())
            ->with('categories', $categories);

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
        $validator = Validator::make(Input::all(), Product::$rules);

        //run check to see if it passes
        if($validator->passes()){
            //create new product & save it into database
            //create variable to hold new object instance
            $product = new Product();

            //set the objects id, title, description, & price
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $product->price = Input::get('price');


            //get reference to image and set it to uploaded file
            $image = Input::file('image');
            //prepend date & time to original file name
            $filename  = time() . '-' . $image->getClientOriginalExtension();
            $path = public_path('img/products/' . $filename);
            //use image intervention to resize image & save it into /img/products folder
            Image::make($image->getRealPath())->resize(468, 249)->save($path);
            //save details into the database using orm's save method
            $product->image = 'img/products/'.$filename;
            $product->save();

            //redirect user back to categories admin page & display success message
            return Redirect::to('admin/products/index')
                ->with('message', '<div class="alert alert-success">Product Created</div>');

        }

        //if not redirect with different flash message
        return Redirect::to('admin/products/index')
            ->with('message', '<div class="alert alert-danger">Something Went Wrong</div>')
            ->withErrors($validator)
            ->withInput();

    }



    public function postDestroy()
    {
        //for delete button submitting hidden field ofcategory we want to delete
        //retrieve reference to it by using id submitted by the form
        $product = Product::find(Input::get('id'));

        //checking to see if we found product before deleting it
        if($product){
            File::delete('public/'.$product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                ->with('message', '<div class="alert alert-info">Product Deleted.</div>');
        }

        //if it cant delete redirect with error message
        return Redirect::to('admin/products/index')
            ->with('message', '<div class="alert alert-danger">Something Went Wrong.</div>');

    }


    public function postToggleAvailability() {
        $product = Product::find(Input::get('id'));

        if ($product) {
            $product->availability = Input::get('availability');
            $product->save();
            return Redirect::to('admin/products/index')->with('message', '<div class="alert alert-success">Product Updated.</div>');
        }

        return Redirect::to('admin/products/index')->with('message', '<div class="alert alert-info">Invalid Product.</div>');
    }

}