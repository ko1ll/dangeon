
<?php
require_once("room.php");
require_once("user.php");
session_start();
    class Dangeon{
        
        private $rooms = array();
        public function getRooms() : array{
            return $this->rooms;
        }
        public function setRooms(array $rooms) : void{
            $this->rooms =  $rooms;
        }
        public function startDangeon() : array{
            $startRoom = new emptyRoom();
            $startRoom->addRoom($this->rooms[0]);
            return $startRoom->getRooms();
        }
        public function saveScore() : void {
            $User = $_SESSION['User'];
            dbConnection::getInstance()->getConnection()->query("insert into users(Name,Score) values ('{$User->getName()}','{$User->getScore()}')");
        }
    }
    
?>