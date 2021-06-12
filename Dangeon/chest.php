<?php 
require_once('item.php');
abstract class Chest extends Item {
    public function __construct(int $value,string $name){  
        parent::__construct($value,$name);
    }
    /**
     * Взаимодействие с объектом комнаты
     */
    public function action(){ return $this->getValue(); }
}

abstract class smallChest extends Chest {
    public function __construct(){  
        parent::__construct(mt_rand(1,10),"Маленький сундук");
    }
}

abstract class bigChest extends Chest {
    public function __construct(){  
        parent::__construct(mt_rand(10,20),"Большой сундук");
    }
}
abstract class enormousChest extends Chest {
    public function __construct(){  
        parent::__construct(mt_rand(50,100),"Огромный сундук сундук");
    }
}

?>