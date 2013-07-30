<?php


//----------------------------------
// All messages
//----------------------------------
    Route::get('/', 
               array(
                    'as' => 'home',
                    'uses' => 'MessageController@messages'
                )
            );




//----------------------------------
// New message
//----------------------------------

    // GET : view with a form
    Route::get('/new-message', 
                array(
                    'as' => 'new-message',
                    'before' => 'auth',
                    function(){
                        return View::make('messages.new-message');
                    }
                )            
            );

    // POST : controller
    Route::post('/new-message', 
               array(
                    'before' => 'auth',
                    'uses' => 'MessageController@newMessage'
                )
            );



//----------------------------------
// Delete a message
//----------------------------------
    Route::get('/delete-message/{messageId}',
                array(
                    'as' => 'delete-message',
                    'before' => 'auth',
                    'uses' => 'MessageController@delete'
                )
            );










//----------------------------------
// All users
//----------------------------------
    Route::get('/users', 
               array(
                    'as' => 'users',
                    'uses' => 'UserController@users'
                )
            );



//----------------------------------
// User's profile
//----------------------------------
    Route::get('/profile/{username}',
                array(
                    'as' => 'see-profile',
                    'uses' => 'UserController@seeProfile'
                )
            );



//-----------------------------------
// Edit profile
//-----------------------------------

    // GET : view with a form
    Route::get('/edit-profile', 
                array(
                    'as' => 'edit-profile',
                    'before' => 'auth',
                    function(){
                        return View::make('users.edit-profile');
                    }
                )            
            );


    // POST : controller
    Route::post('/edit-profile', 
               array(
                    'before' => 'auth',
                    'uses' => 'UserController@editProfile'
                )
            );






//----------------------------------
// Sign In
//----------------------------------
    
    // GET : view with a form
    Route::get('/sign-in', 
                array(
                    'as' => 'sign-in',
                    'before' => 'guest',
                    function(){
                        return View::make('security.sign-in');
                    }
                )            
            );


    // POST : controller
    Route::post('/sign-in', 
               array(
                    'before' => 'guest',
                    'uses' => 'SecurityController@signIn'
                )
            );



//----------------------------------
// Sign Up
//----------------------------------

    // GET : view with a form
    Route::get('/sign-up', 
                array(
                    'as' => 'sign-up',
                    'before' => 'guest',
                    function(){
                        return View::make('security.sign-up');
                    }
                )            
            );



    // POST : controller
    Route::post('/sign-up', 
               array(
                    'before' => 'guest',
                    'uses' => 'SecurityController@signUp'
                )
            );





//----------------------------------
// Sign out
//----------------------------------
Route::get('/sign-out', 
           array(
                'as' => 'sign-out',
                function() {
                    Auth::logout();
                    return Redirect::route('home');
                }
           )
        );





