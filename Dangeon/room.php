
<?php
require_once('monster.php');
require_once('chest.php');
abstract class Room{
  private Item $item;
  private $rooms = array();
  /**
   * Конструктор комнаты
   * @param item объект комнаты
   */
  public function __construct(Item $item){$this->item = $item;}
  /**
   * Функция добавления комнат
   * @param room Комната
   */
  public function addRoom(Room $room){
    array_push($this->rooms,$room);
    //$room->addRoom($this);
    }
  /**
   * Функция получения комнат
   */
  public function getRooms(){
      return $this->rooms;
  }
  /**
   * Функция установки комнат
   * @param rooms Комнаты
   */
  public function setRooms(array $rooms){
      $this->rooms =  $rooms;
  }
  /**
   * Функция взаимодействия с комнатой
   */
  public function enterRoom(){
    $this->item->action();
    $this->item = nullItem::getInstance();
  }
}

class monsterRoom extends Room{
    public function __construct(Monster $item){parent::__construct($item);}
}

class chestRoom extends Room{
    public function __construct(Chest $item){parent::__construct($item);}
}

class emptyRoom extends Room{
    public function __construct(){parent::__construct(nullItem::getInstance());}
}

?>