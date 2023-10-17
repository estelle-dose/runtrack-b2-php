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

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getGradeId(): int {
        return $this->grade_id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getFullname(): string {
        return $this->fullname;
    }

    public function getBirthdate(): string {
        return $this->birthdate;
    }

    public function getGender(): string {
        return $this->gender;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setGradeId(int $grade_id): void {
        $this->grade_id = $grade_id;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setFullname(string $fullname): void {
        $this->fullname = $fullname;
    }

    public function setBirthdate(string $birthdate): void {
        $this->birthdate = $birthdate;
    }

    public function setGender(string $gender): void {
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
