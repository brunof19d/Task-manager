<?php


namespace App\Entity;


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
    private \DateTimeImmutable $date;

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

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): Newsletter
    {
        $this->date = $date;
        return $this;
    }
}