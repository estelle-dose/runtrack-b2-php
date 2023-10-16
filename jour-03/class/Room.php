<?php
class Room {
    private int $id;
    private int $floor_id;
    private string $name;
    private string $capacity;

    public function __construct(
        int $id = 0,
        int $floor_id = 0,
        string $name = "",
        int $capacity = 0,
    ) {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    // Ajoutez les méthodes d'accès (getters) si nécessaire
    public function getId(): int {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFloor_id(): int {
        return $this->floor_id;
    }
    
    public function setFloor_id($floor_id) {
        $this->floor_id = $floor_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }
    
    public function __toString() {
        return  "Grade ID: " . $this->id . "<br>" .
                "Floor ID:" . $this->floor_id . "<br>" .
                "Name:" . $this->name . "<br>" .
                "Capacity:" . $this->capacity . "<br>" .
                "<br>";
    }
    
}

    

?>