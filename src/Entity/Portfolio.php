<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @Entity
 */
class Portfolio
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private int $id;

    /**
     * @Column (type="string", nullable=true)
     */
    private ?string $photo;

    /**
     * @Column (type="string")
     */
    private string $title;

    /**
     * @Column (type="string")
     */
    private string $description;

    /**
     * @Column (type="datetime")
     */
    private DateTime $date;

    /**
     * @Column (type="integer")
     */
    private int $active;

    /**
     * @ManyToOne(targetEntity="App\Entity\CategoryPortfolio")
     */
    private CategoryPortfolio $category;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): Portfolio
    {
        $this->photo = $photo;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Portfolio
    {
        $title = filter_var($title, FILTER_SANITIZE_STRING);

        if ($title === FALSE) throw new Exception('Title invalid');

        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Portfolio
    {
        $description = filter_var($description, FILTER_SANITIZE_STRING);

        if ($description === FALSE) {
            throw new Exception('Text description invalid');
        } elseif (strlen($description) > 255) {
            throw new Exception('Text description is limit on 255 characters.');
        }

        $this->description = $description;

        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): Portfolio
    {
        $this->date = $date;
        return $this;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): Portfolio
    {
        $active = filter_var($active, FILTER_VALIDATE_INT);

        if ($active === FALSE) throw new Exception('Active value invalid');

        if ($active < 0 && $active > 1) throw new Exception('Active value invalid');

        $this->active = $active;

        return $this;
    }

    public function getCategory(): CategoryPortfolio
    {
        return $this->category;
    }

    public function setCategory(CategoryPortfolio $category): Portfolio
    {
        $this->category = $category;
        return $this;
    }
}