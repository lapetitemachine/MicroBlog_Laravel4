<?php
 
class MessageTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('messages')->delete();

        $messages = [
            'Steven' => [
                'content' => 'Just setting up my db',
                'created_at' => '2013-05-24 11:00:00'
            ], 
            'John' => [
                'content' => 'Nothing wrong with a man taking pleasure in his work',
                'created_at' => '2013-05-24 13:00:00'
            ],
            'Jane' => [
                'content' => "If you don't like what's being said, change the conversation",
                'created_at' => '2013-07-21 09:00:00'
            ],
            'Nobody' => [
                'content' => "I don't know what to say",
                'created_at' => '2013-05-25 18:00:00'
            ]
        ];

        
        foreach ($messages as $author => $message) {
            $message = new Message(array(
                    'message' => $message['content'],
                    'created_at' => $message['created_at']
                )
            );
            $user = User::where('username', $author)->first();
            $message = $user->messages()->save($message);
        }
    }
 
}