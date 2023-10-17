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

    public function getStudents(): ?array {
        global $servername, $username, $password, $dbname;
    
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "SELECT id, grade_id, email, fullname, birthdate, gender FROM student WHERE grade_id = :grade_id";
            $stmt = $pdo->prepare($sql);
            $gradeId = $this->getId();
            $stmt->bindParam(':grade_id', $gradeId, PDO::PARAM_INT);
            $stmt->execute();
            $studentData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $students = [];
            foreach ($studentData as $data) {
                $students[] = new Student(
                    $data['id'],
                    $data['grade_id'],
                    $data['email'],
                    $data['fullname'],
                    $data['birthdate'],
                    $data['gender']
                );
            }
    
            return $students;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    
}
?>