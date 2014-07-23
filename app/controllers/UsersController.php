<?php

class UsersController extends BaseController {

    public function __construct() {
        // parent::__construct();
        //pass array to protect post request
        $this->beforeFilter('csrf', array('on'=>'post'));
        
        //shares category information with all views
        $this->beforeFilter(function() {
            View::share('catnav', Category::all());
        });
    }

    public function getNewaccount() {
        //just to display new account page
        return View::make('users.newaccount');
    }

    //create action to process form submit to save details into database
    public function postCreate() {
        //use validator class to make premade rules against user input
        $validator = Validator::make(Input::all(), User::$rules);

        //if validator passes then insert values into database
        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            //hash password before storing it into the database
            $user->password = Hash::make(Input::get('password'));
            $user->telephone = Input::get('telephone');
            $user->save();

            //redirect to sign page
            return Redirect::to('users/signin')
                ->with('message', '<div class="alert alert-success">Thank you for creating a new account. Please sign in.</div>');
        }

        //if it doesnt work redirect to new account page
        //pass with error method to display error messages
        //pass withinput method to remember users old form input
        return Redirect::to('users/newaccount')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }


    //sign action to display sign in form
    public function getSignin() {
        return View::make('users.signin');
    }

    //signin action to handle form processing
    //if sign in attempt succeeds then
    public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
            return Redirect::to('/')->with('message', '<div class="alert alert-success">Thanks for signing in</div>');
        }
    }


    public function getSignout() {
        Auth::logout();
        return Redirect::to('users/signin')->with('message', '<div class="alert alert-success">You have been signed out.</div>');
    }

}
