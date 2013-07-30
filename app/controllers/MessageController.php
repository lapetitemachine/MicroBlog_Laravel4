<?php

class MessageController extends Controller 
{


    public function messages()
    {
        $messages = Message::with('user')
                            ->orderBy('created_at', 'DESC')
                            ->get();
        
        return View::make('messages.all-messages', array(
            'messages' => $messages
        ));
    }





    public function newMessage()
    {
        $input = Input::get();

        $rules = array(
            'message' => 'required|max:140'
        );

        $v = Validator::make($input, $rules);

        if ($v->passes()) {
            $user = Auth::user();

            $message = new Message(array(
                'message' => e(trim($input['message'])),
                'created_at' => date('Y-m-d H:i:s')
            ));
            $message = $user->messages()->save($message);

            Session::flash('alert-success', 'Your message has been posted !');

            return Redirect::route('home');
        }
        else {
            return Redirect::route('new-message')
                            ->withErrors($v)
                            ->withInput();
        }
    }






    public function delete($id)
    {
        $message = Message::find($id);

        $connectedUser = Auth::user();
        $messageAuthor = $message->user;

        if ($connectedUser == $messageAuthor) {
            Message::destroy($id);
            Session::flash('alert-info', 'Your message has been deleted');
            return Redirect::to(URL::previous());
        } 
        else {
           App::abort(401, 'You are not the author of this message');
        }
    }
}