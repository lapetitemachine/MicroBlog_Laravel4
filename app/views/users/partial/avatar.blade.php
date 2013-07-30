@if(!empty($user->avatar))
    <img src="{{ asset('avatars/' . $user->id . '.' .  $user->avatar) }}" alt="" /> 
@else
    <img src="{{ asset('img/default_avatar.jpeg') }}" alt="" /> 
@endif