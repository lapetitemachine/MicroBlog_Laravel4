<?php 

HTML::macro('avatar', function($user){
  
   $source = $user->avatar 
                  ? 'avatars/' . $user->id . '.' . $user->avatar
                  : 'img/default_avatar.jpeg';


    return '<img src="' . asset($source) . '" alt="" />';
});