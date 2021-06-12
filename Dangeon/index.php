
<?php
require_once('user.php');
require_once('dangeon.php');
require_once('db.php');

session_start();

if(!(isset($_SESSION['Dangeon']) || isset($_SESSION['User']))){
    $Dangeon = new Dangeon();
    $User = new User($_GET['name']);
    
    $_SESSION['Dangeon'] = $Dangeon;
    $_SESSION['User'] = $User;
}
else {
    $Dangeon = $_SESSION['Dangeon'];
    $User = $_SESSION['User'];
}

if(!isset($_GET['action'])){
    $action = $_GET['action'];

    switch($action){
        case "start_game" :
            newGame();
            break;
        case "save_score" :
            saveScore();
            break;
        case "enter_room" :
            $room = $_GET['room'];
            $room->enterRoom();
            break;
        case "set_info":
            //parse json
            $json = $_GET['info'];
            $rooms = json_decode($json);
            setInfo($rooms);
            break;
        default : echo "default";    
    }
    function setInfo($rooms){
        global $Dangeon;
        $Dangeon->setRooms($rooms);
    }
    function saveScore(){
        global $Dangeon;
        $Dangeon->saveScore();
    }
    function newGame(){
        global $Dangeon;
        
        $Dangeon = new Dangeon();
        $Dangeon->startDangeon();

        $User = new User($_GET['name']);
        
        $_SESSION['Dangeon'] = $Dangeon;
        $_SESSION['User'] = $User;

        
    }
    
}
?>