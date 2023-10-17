<?php
class Room {
    private int $id;
    private int $floor_id;
    private string $name;
    private int $capacity;

    public function __construct(
        int $id = 0,
        int $floor_id = 0,
        string $name = "",
        int $capacity = 0
    ) {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getFloorId(): int {
        return $this->floor_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setFloorId(int $floor_id): void {
        $this->floor_id = $floor_id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setCapacity(int $capacity): void {
        $this->capacity = $capacity;
    }

    public function __toString() {
        return  "Room ID: " . $this->id . "<br>" .
                "Floor ID:" . $this->floor_id . "<br>" .
                "Name:" . $this->name . "<br>" .
                "Capacity:" . $this->capacity . "<br>" .
                "<br>";
    }

    public function getGrades(): ?array {
        global $servername, $username, $password, $dbname;

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT g.* FROM grade g
                    INNER JOIN room r ON r.id = :room_id";
            $stmt = $pdo->prepare($sql);

            $roomId = $this->getId();
            $stmt->bindParam(':room_id', $roomId, PDO::PARAM_INT);

            $stmt->execute();
            $gradeData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $grades = [];
            foreach ($gradeData as $data) {
                $grades[] = new Grade(
                    $data['id'],
                    $data['room_id'],
                    $data['name'],
                    $data['year']
                );
            }

            return $grades;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}

?>