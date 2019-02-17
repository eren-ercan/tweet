<?php
require_once 'db.php';

class Tweet{

    private $userId;
    private $db;

    function __construct($userId){
        $this->userId = $userId;
        $this->db = new DB();
    }

    function add($tweet){
        $this->db->write(
            'insert into tweets 
            (userId,time,tweet) 
            values 
            ("'.$this->userId.'","'.round(microtime(true) * 1000).'","'.$tweet.'")'
        );
    }

    function delete($tweetId){
        $this->db->write(
            'delete from tweets where userId="'.$this->userId.'" and id="'.$tweetId.'"'
        );
    }

    function get():array{
        return $this->db->read('select * from tweets where userId="'.$this->userId.'" order by time desc');
    }

}

?>
