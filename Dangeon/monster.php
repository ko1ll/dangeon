<?php 
require_once('item.php');
abstract class Monster extends Item {
    #Сила монстра
    private int $power;
    public function __construct(int $value,string $name){  
        parent::__construct($value,$name);
        $this->power = $value; 
    }
    /**
     * Взаимодействие с объектом комнаты
     */
    public function action(){
        $round_counter = 1;
        while($this->power > 0){
            $this->power -= mt_rand(1,100);
            $round_counter++;
            
        }
        echo $round_counter;
        return $this->getValue();
     }
}
class littleMonster extends Monster{
    public function __construct(){  
        parent::__construct(mt_rand(1,10),"Маленький монстр");
    }
}

class middleMonster extends Monster{
    public function __construct(){  
        parent::__construct(mt_rand(5,15),"Средний монстр");
    }
}

class bigMonster extends Monster{
    public function __construct(){  
        parent::__construct(mt_rand(10,30),"Большой монстр");
    }
}
    
class godMonster extends Monster{
    public function __construct(){  
        parent::__construct(mt_rand(50,100),"Слишком сильный, чтобы быть правдой");
    }
}

?>