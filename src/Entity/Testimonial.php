<?php


namespace App\Entity;


use Exception;

/**
 * @Entity
 */
class Testimonial
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private int $id;

    /**
     * @Column(type="string", nullable=true)
     *
     */
    private ?string $photo;
    /**
     * @Column(type="string")
     */
    private string $name;

    /**
     * @Column(type="string")
     */
    private string $text;

    /**
     * @Column(type="integer")
     */
    private int $active;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Testimonial
    {
        $this->id = $id;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): Testimonial
    {
        $this->photo = $photo;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Testimonial
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if ($name === FALSE) throw new Exception('The name field is required');
        if (strlen($name) > 50) throw new Exception('The name is no possible longer than 50 characters');

        $this->name = $name;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Testimonial
    {
        $text = filter_var($text, FILTER_SANITIZE_STRING);

        if ($text === FALSE) throw new Exception('The text field is required');

        $this->text = $text;
        return $this;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): Testimonial
    {
        $active = filter_var($active, FILTER_VALIDATE_INT);
        if ($active === FALSE) throw new Exception('The active field is required');

        $this->active = $active;
        return $this;
    }
}