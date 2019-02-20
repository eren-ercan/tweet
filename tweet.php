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
            'INSERT INTO tweets 
            (userId,time,tweet) 
            values 
            ("'.$this->userId.'","'.round(microtime(true) * 1000).'","'.$tweet.'")'
        );
    }

    function delete($tweetId){
        $this->db->write(
            'DELETE FROM tweets WHERE userId="'.$this->userId.'" and id="'.$tweetId.'"'
        );
    }

    function get():array{
        return $this->db->read('SELECT * FROM tweets WHERE userId="'.$this->userId.'" order by time desc');
    }

}

?>
