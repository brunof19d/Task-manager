<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity;

/**
 * @Entity
 */
class CategoryPortfolio
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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CategoryPortfolio
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CategoryPortfolio
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if ($name === FALSE) throw new \Exception('The field name category invalid');

        $this->name = $name;

        return $this;
    }
}