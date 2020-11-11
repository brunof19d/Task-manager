<?php


namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;

/**
 * @Entity
 */
class Contact
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private int $id;

    /**
     * @Column (type="string")
     */
    private string $name;

    /**
     * @Column (type="string")
     */
    private string $email;

    /**
     * @Column (type="string")
     */
    private string $text;

    /**
     * @Column (type="date_immutable")
     */
    private DateTimeImmutable $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if ($name === FALSE) throw new Exception('The name field is required');
        if (strlen($name) > 50) throw new Exception('The name is no possible longer than 50 characters');

        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email === FALSE) throw new Exception('The email field is required');
        $this->email = $email;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $text = filter_var($text, FILTER_SANITIZE_STRING);

        if ($text === FALSE) throw new Exception('The message field is required');
        if (strlen($text) > 255) throw new Exception('The message is no possible longer than 255 characters');

        $this->text = $text;
        return $this;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(DateTimeImmutable $date): self
    {
        $this->date = $date;
        return $this;
    }
}