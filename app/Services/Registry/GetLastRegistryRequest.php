<?php

namespace App\Services\Registry;

class GetLastRegistryRequest
{
    private ?string $input;

    public function __construct(?string $input)
    {
        $this->input = $input;
    }

    /**
     * @return ?string
     */
    public function getInput(): ?string
    {
        return $this->input;
    }
}
