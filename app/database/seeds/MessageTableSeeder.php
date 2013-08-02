<?php
 
class MessageTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('messages')->delete();

        $seed = [
            'Abraham_Lincoln' => [
                [
                    'message' => 'Give me six hours to chop down a tree and I will spend the first four sharpening the axe',
                    'created_at' => '2013-05-24 11:00:00'
                ], 
                [
                    'message' => 'The best thing about the future is that it comes one day at a time',
                    'created_at' => '2013-08-02 16:38:00'
                ],
            ],
            'Albert_Einstein' => [
                [
                    'message' => "When you are courting a nice girl an hour seems like a second.When you sit on a red-hot cinder a second seems like an hour.That's relativity",
                    'created_at' => '2013-07-07 21:30:00'
                ], 
                [
                    'message' => 'A question that sometimes drives me hazy: am I or are the others crazy?',
                    'created_at' => '2013-01-18 15:00:00'
                ],
            ],
            'Edgar_Allan_Poe' => [
                [
                    'message' => 'I became insane, with long intervals of horrible sanity',
                    'created_at' => '2013-05-28 20:00:00'
                ], 
                [
                    'message' => 'All that we see or seem is but a dream within a dream',
                    'created_at' => '2013-02-21 19:00:00'
                ],
            ],
            'Emily_Dickinson' => [
                [
                    'message' => 'Forever is composed of nows.',
                    'created_at' => '2013-04-23 12:00:00'
                ], 
                [
                    'message' => "I'm nobody, who are you?",
                    'created_at' => '2013-05-02 17:00:00'
                ],
            ]
        ];

        foreach ($seed as $author => $quotes) {
            foreach ($quotes as $quote) {
                $message = new Message($quote);
                $user = User::where('username', $author)->first();
                $message = $user->messages()->save($message);
            }
        }
    }
 
}