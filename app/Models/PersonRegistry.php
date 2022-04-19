<?php

namespace App\Models;

class PersonRegistry
{
    private int $id;
    private string $personCode;
    private string $name;
    private string $surname;
    private string $createdAt;

    public function __construct(int $id, string $personCode, string $name, string $surname, string $createdAt)
    {
        $this->id = $id;
        $this->personCode = $personCode;
        $this->name = $name;
        $this->surname = $surname;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getPersonCode(): string
    {
        return $this->personCode;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}