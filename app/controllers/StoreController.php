<?php
/**
 *
 * Package: l4_demo
 * Filename: StoreController.php
 * Author: solidstunna101
 * Date: 08/07/14
 * Time: 08:58
 *
 */

class StoreController extends BaseController{

    //constructor to set before csrf filter to be applied on post requests
    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        //apply auth filter to protect selected controller actions
        $this->beforeFilter('auth', array('only'=>array('postAddtocart', 'getCart', 'getRemoveitem')));
        //shares category information with all views
        $this->beforeFilter(function() {
            View::share('catnav', Category::all());
        });
    }

    //index function to make view and also pass a data array of 4 products
    //order them by created at field in datbase then retrieve it as an array
    public function getIndex() {
        return View::make('store.index')
            ->with('products', Product::take(4)
                ->orderBy('created_at', 'DESC')
                ->get());
    }


    //single product display function
    //get view function to make view and pass along product data
    //retrieve id of product along with product
    //url example store/view/5
    public function getView($id) {
        return View::make('store.view')->with('product', Product::find($id));
    }

    //function to retrieve category names
    public function getCategory($cat_id) {
        return View::make('store.category')
            ->with('products', Product::where('category_id', '=', $cat_id)->paginate(6))
            ->with('category', Category::find($cat_id));
    }


    public function getSearch() {
        //get reference to submitted keyword
        $keyword = Input::get('keyword');

        //return a view and chain a with method product
        //get results in an array
        //also keyword input to be used in view page
        return View::make('store.search')
            ->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
            ->with('keyword', $keyword);


    }

    //information comming from form(id & quantity)
    public function postAddtocart() {
        //grab id from form submitted value
        $product = Product::find(Input::get('id'));
        //grab quantity from the form
        $quantity = Input::get('quantity');

        //using method from moltin cart class to insert items
        Cart::insert(array(
            'id'=>$product->id,
            'name'=>$product->title,
            'price'=>$product->price,
            'quantity'=>$quantity,
            'image'=>$product->image
        ));

        //redirect user to cart to see that item was added
        return Redirect::to('store/cart');
    }

    //creating cart view for new updated cart
    //pass along product which will have updated cart contents in it
    public function getCart() {
        return View::make('store.cart')->with('products', Cart::contents());
    }


    //for removing items from the cart
    //takes in item object identifier
    public function getRemoveitem($identifier) {
        //get reference to item object
        $item = Cart::item($identifier);
        //delete it
        $item->remove();
        //go back to the cart
        return Redirect::to('store/cart');
    }

    //linking to contact page
    public function getContact() {
        return View::make('store.contact');
    }


}