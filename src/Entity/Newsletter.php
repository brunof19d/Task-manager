<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity;

use DateTime;

/**
 * @Entity
 */
class Newsletter
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column (type="string")
     */
    private string $email;

    /**
     * @Column (type="datetime")
     */
    private DateTime $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Newsletter
    {
        $this->email = $email;
        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): Newsletter
    {
        $this->date = $date;
        return $this;
    }
}