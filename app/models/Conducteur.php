<?php 
class Conducteur extends User {
    private bool $badged;

    public function __construct(
        int $id,
        string $fname,
        string $lname,
        string $email,
        string $password,
        string $role,
        bool $badged
    ) {
        parent::__construct($id, $fname, $lname, $email, $password, $role);
        $this->badged = $badged;
    }

    // Getter
    public function isBadged(): bool { return $this->badged; }

    // Setter
    public function setBadged(bool $badged): void { $this->badged = $badged; }
}
