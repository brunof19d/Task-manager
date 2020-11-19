<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity;

use Exception;

/**
 * @Entity
 */
class Service
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
    private string $text;

    /**
     * @Column (type="integer")
     */
    private int $active;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Service
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if ($name === FALSE) throw new Exception('The name field is required');

        $this->name = $name;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Service
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

    public function setActive(int $active): Service
    {
        $active = filter_var($active, FILTER_VALIDATE_INT);

        if ($active === FALSE) throw new Exception('Field active is invalid');

        $this->active = $active;

        return $this;
    }


}