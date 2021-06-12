
<?php
    abstract class Item{
        #Название объекта
        private string $name;
        #Ценность объекта
        private int $value;
        /**
         * Конструктор объекта
         * @param value ценность объекта
         * @param name название объекта
         */
        public function __construct(int $value,string $name) {$this->name = $name; $this->value = $value;}

        /**
        * Взаимодействие с объектом комнаты
        */
        abstract public function action();
        
        public function getValue() : int{
            return $this->value;
        }
    }
    class nullItem extends Item{
        private static $instance;
        public function __construct(){parent::__construct(0,"null_object");}
        public function action(){}
        /**
         * Синглтон объект для всех нулевых объектов
         */    
        public static function getInstance(){
            if(!self::$instance){
               self::$instance = new self();     
            }
            return self::$instance;
        }
        private function __clone(){}
    }
?>