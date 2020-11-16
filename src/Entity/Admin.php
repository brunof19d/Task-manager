<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity;

use Exception;

/**
 * @Entity
 */
class Admin
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;
    /**
     * @Column(type="string")
     */
    private string $email;
    /**
     * @Column(type="string")
     */
    private string $password;
    /**
     * @Column(type="integer")
     */
    private int $active;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === FALSE) throw new Exception('ID User invalid');
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email === FALSE) throw new Exception('Email invalid');
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $password = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if ($password === FALSE) throw new Exception('Password invalid');

        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($hash) === FALSE) {
            $this->password = $hash;
        } else {
            throw new Exception('Password invalid');
        }
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): void
    {
        $active = filter_var($active, FILTER_VALIDATE_INT);

        if ($active === FALSE) throw new Exception('Active value invalid');

        if ($active < 0 && $active > 1) throw new Exception('Active value invalid');

        $this->active = $active;
    }
}