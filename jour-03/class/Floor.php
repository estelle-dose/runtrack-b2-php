<?php
class Floor {
    private int $id;
    private string $name;
    private int $building_id;

    public function __construct(
        int $id = 0,
        string $name = "",
        int $building_id = 0
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->building_id = $building_id;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getBuildingId(): int {
        return $this->building_id;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setBuildingId(int $building_id): void {
        $this->building_id = $building_id;
    }

    public function __toString() {
        return "Floor ID: " . $this->id . "<br>" .
            "Name:" . $this->name . "<br>" .
            "Building ID:" . $this->building_id . "<br>" .
            "<br>";
    }

    public function getRooms(): ?array {
        global $servername, $username, $password, $dbname;

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT r.* FROM room r
                    INNER JOIN floor f ON r.floor_id = :floor_id";
            $stmt = $pdo->prepare($sql);

            $floorId = $this->getId();
            $stmt->bindParam(':floor_id', $floorId, PDO::PARAM_INT);

            $stmt->execute();
            $roomData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $rooms = [];
            foreach ($roomData as $data) {
                $rooms[] = new Room(
                    $data['id'],
                    $data['floor_id'],
                    $data['name'],
                    $data['capacity']
                );
            }

            return $rooms;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}

?>