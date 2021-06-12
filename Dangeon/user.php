
<?php

class User{
    private string $name;
    private int  $score = 0;

    public function __construct(string $name){}

    public function addScore(int $score) : void{
        $this->score += $score;
        if($this->score < 0){$this->score = 0;}
    }
    public function getScore() : int{return $this->score;}
    public function getName() : string{return $this->name;}
    public function setName(string $name) : void{$this->name = $name; }
}
?>