<?php


namespace App\Entity;

use Exception;


class User
{
    private int $id;

    private string $name;

    private string $email;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        if ($name === FALSE) throw new Exception('The name field is required');

        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email === FALSE) throw new Exception('The email field is required');
        $this->email = $email;
    }


}