<?php

namespace App\Models;

use App\Exceptions\InputException;

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
        $this->setBadged($badged);
    }

    // Getter
    public function isBadged(): bool { 
        return $this->badged; 
    }

    // Setter
    public function setBadged(bool $badged): void { 
        if (!is_bool($badged)) {
            throw new InputException("Invalid badged value");
        }
        $this->badged = $badged; 
    }
}
