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
        string $year = ""
    ) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getRoomId(): int {
        return $this->room_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getYear(): string {
        return $this->year;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoomId(int $room_id): void {
        $this->room_id = $room_id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setYear(string $year): void {
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