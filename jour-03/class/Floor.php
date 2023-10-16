<?php
class Floor {
    private int $id;
    private string $name;
    private int $level;

    public function __construct(
        int $id = 0,
        string $name = "",
        int $level = 0,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    // Ajoutez les méthodes d'accès (getters) si nécessaire
    public function getId(): int {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLevel(): int {
        return $this->level;
    }

    public function setLevel($level) {
        $this->level = $level;
    }
    
    public function __toString() {
        return  "Grade ID: " . $this->id . "<br>" .
                "Name:" . $this->name . "<br>" .
                "Level:" . $this->level . "<br>" .
                "<br>";
    }
    
}

    

?>