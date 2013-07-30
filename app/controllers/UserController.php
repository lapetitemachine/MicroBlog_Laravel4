<?php

use Mvc\Images\ImageResizer;


class UserController extends Controller 
{


    public function users()
    {
        $users = User::orderBy('username')
                     ->get();
                
        
        return View::make('users.all-users', array(
            'users' => $users
        ));
    }






    public function seeProfile($username)
    {
        $user = User::where('username', $username)
                    ->with('messages')
                    ->first();

        if (null === $user) {
            App::abort(404, 'User not found');
        }


        return View::make('users.see-profile', array(
            'user' => $user
        ));
    }







    public function editProfile()
    {
        $input = Input::all();
       
        $rules = array(
            'bio' => 'max:255',
            'avatar' => 'mimes:jpeg,gif,png|max:2000'
        );

        $v = Validator::make($input, $rules);

        if ($v->passes()) {
           
           $user = Auth::user();

            if (Input::hasFile('avatar')) {            

                if ($user->avatar !== null) {
                    $previousAvatar = $this->getAvatarDir() . '/' . $user->id . '.' . $user->avatar;
                    if (file_exists($previousAvatar)) {
                        unlink($previousAvatar); 
                    }
                    $user->avatar = null;
                }

                $file = Input::file('avatar');
                $destinationPath = 'avatars/';
                $extension = $file->getClientOriginalExtension();
                $filename = $user->id . '.' . $extension;
               
                $uploadSuccess = Input::file('avatar')->move($destinationPath, $filename);
                 
                if ($uploadSuccess) {

                    $resizer = new ImageResizer;
                    $resizer->crop($this->getAvatarDir() . '/' . $filename, 50, 50); 

                    $user->avatar = $extension;
                }
            }

            $user->bio = e(trim($input['bio']));
            $user->save();
            
            return Redirect::route('see-profile', array('username' => $user->username));
        }
        else {
            return Redirect::route('edit-profile')
                            ->withErrors($v)
                            ->withInput();
        }
    }






    private function getAvatarDir()
    {
        return __DIR__.'/../../public/avatars';
    }




}