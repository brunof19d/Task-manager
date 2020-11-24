<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity;

/**
 * @Entity
 */
class Employee
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string", nullable=true)
     */
    private ?string $photo;

    /**
     * @Column(type="string")
     */
    private string $name;

    /**
     * @Column (type="string")
     */
    private string $jobPosition;

    /**
     * @Column (type="string")
     */
    private string $description;
    /**
     * @Column (type="integer")
     */
    private int $active;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): Employee
    {
        $this->photo = $photo;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Employee
    {
        $this->name = $name;
        return $this;
    }

    public function getJobPosition(): string
    {
        return $this->jobPosition;
    }

    public function setJobPosition(string $jobPosition): Employee
    {
        $this->jobPosition = $jobPosition;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Employee
    {
        $this->description = $description;
        return $this;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): Employee
    {
        $active = filter_var($active, FILTER_VALIDATE_INT);
        if ($active === FALSE or $active > 1) {
            throw new \Exception('Active field invalid');
        }

        $this->active = $active;
        return $this;
    }
}