<?php 

HTML::macro('avatar', function($user){
  
   $source = $user->avatar 
                  ? 'avatars/' . $user->id . '.' . $user->avatar
                  : 'avatars/default_avatar.png';


    return '<img src="' . asset($source) . '" alt="" />';
});