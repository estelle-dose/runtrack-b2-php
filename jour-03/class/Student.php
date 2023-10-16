<?php
class Student {
    private int $id;
    private int $grade_id;
    private string $email;
    private string $fullname;
    private string $birthdate;
    private string $gender;

    public function __construct(
        int $id = 0,
        int $grade_id = 0,
        string $email = "",
        string $fullname = "",
        string $birthdate = "",
        string $gender = ""
    ) {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    // Ajoutez les méthodes d'accès (getters) si nécessaire
    public function getId(): int {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getGradeId(): int {
        return $this->grade_id;
    }
    
    public function setGradeId($grade_id) {
        $this->grade_id = $grade_id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getFullname(): string {
        return $this->fullname;
    }

    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    public function getBirthdate(): string {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }
    
    public function __toString() {
        return  "Student ID: " . $this->id . "<br>" .
                "Grade ID:" . $this->grade_id . "<br>" .
                "Email:" . $this->email . "<br>" .
                "Full Name:" . $this->fullname . "<br>" .
                "Birthdate:" . $this->birthdate . "<br>" .
                "Gender:" . $this->gender . "<br>" .
                "<br>";
    }
    
}

    

?>
