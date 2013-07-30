<?php 

class SecurityController extends Controller 
{

    public function signIn()
    {
        $input = Input::get();

        $credentials = array('username' => $input['username'],
                             'password' => $input['password']);

        if (Auth::attempt($credentials)) { 
            return Redirect::route('home');
        } 
        else { 
            return Redirect::route('sign-in')
                            ->with('signInFail', true)
                            ->withInput();
        }   
    }





    public function signUp()
    {
        $input = Input::get();

        $rules = array(
            'username' => 'required|alpha_dash|max:30|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password'
        );

        $v = Validator::make($input, $rules);

        if ($v->passes()) {
            $user = User::create(array(
                'username' => $input['username'],
                'password' => Hash::make($input['password'])
            ));

            Auth::login($user);

            Session::flash('alert-success', 'Welcome ' . $input['username']);



            return Redirect::route('home');
        }
        else {
            return Redirect::route('sign-up')
                            ->withErrors($v)
                            ->withInput();
        }

    }

}