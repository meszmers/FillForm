<?php

namespace App\Services\Form;

class UpdateFormRequest
{
    private int $id;
    private ?string $one;
    private ?string $two;
    private ?string $three;
    private ?string $four;
    private ?string $five;
    private ?string $six;
    private ?string $seven;
    private ?string $eight;
    private ?string $nine;
    private ?string $ten;
    private ?string $eleven;
    private ?string $twelve;
    private ?string $thirteen;

    public function __construct(int     $id, ?string $one, ?string $two,
                                ?string $three, ?string $four, ?string $five, ?string $six, ?string $seven, ?string $eight,
                                ?string $nine, ?string $ten, ?string $eleven, string $twelve, ?string $thirteen)
    {
        $this->id = $id;
        $this->one = $one;
        $this->two = $two;
        $this->three = $three;
        $this->four = $four;
        $this->five = $five;
        $this->six = $six;
        $this->seven = $seven;
        $this->eight = $eight;
        $this->nine = $nine;
        $this->ten = $ten;
        $this->eleven = $eleven;
        $this->twelve = $twelve;
        $this->thirteen = $thirteen;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return string|null
     */
    public function getEight(): ?string
    {
        return $this->eight;
    }

    /**
     * @return string|null
     */
    public function getEleven(): ?string
    {
        return $this->eleven;
    }

    /**
     * @return string|null
     */
    public function getFive(): ?string
    {
        return $this->five;
    }

    /**
     * @return string|null
     */
    public function getFour(): ?string
    {
        return $this->four;
    }

    /**
     * @return string|null
     */
    public function getNine(): ?string
    {
        return $this->nine;
    }

    /**
     * @return string|null
     */
    public function getOne(): ?string
    {
        return $this->one;
    }

    /**
     * @return string|null
     */
    public function getSeven(): ?string
    {
        return $this->seven;
    }

    /**
     * @return string|null
     */
    public function getSix(): ?string
    {
        return $this->six;
    }

    /**
     * @return string|null
     */
    public function getTen(): ?string
    {
        return $this->ten;
    }

    /**
     * @return string|null
     */
    public function getThirteen(): ?string
    {
        return $this->thirteen;
    }

    /**
     * @return string|null
     */
    public function getThree(): ?string
    {
        return $this->three;
    }

    /**
     * @return string|null
     */
    public function getTwelve(): ?string
    {
        return $this->twelve;
    }

    /**
     * @return string|null
     */
    public function getTwo(): ?string
    {
        return $this->two;
    }
}
