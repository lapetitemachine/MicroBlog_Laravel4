<?php
 
class Message extends Eloquent {
 

    public $timestamps = false;
 

    protected $fillable = array('message', 'created_at');

    public function user() 
    {
        return $this->belongsTo('User');
    }   

}