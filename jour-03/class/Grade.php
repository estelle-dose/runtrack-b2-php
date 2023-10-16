<?php
class Grade {
    private int $id;
    private int $room_id;
    private string $name;
    private string $year;

    public function __construct(
        int $id = 0,
        int $room_id = 0,
        string $name = "",
        string $year = "",
    ) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

    // Ajoutez les méthodes d'accès (getters) si nécessaire
    public function getId(): int {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRoomId(): int {
        return $this->room_id;
    }
    
    public function setRoomId($room_id) {
        $this->room_id = $room_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getYear(): string {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }
    
    public function __toString() {
        return  "Grade ID: " . $this->id . "<br>" .
                "Room ID:" . $this->room_id . "<br>" .
                "Name:" . $this->name . "<br>" .
                "Year:" . $this->year . "<br>" .
                "<br>";
    }
    
}

    

?>