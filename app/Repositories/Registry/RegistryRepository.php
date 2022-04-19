<?php

namespace App\Repositories\Registry;

use App\Services\Registry\GetLastRegistryRequest;

interface RegistryRepository
{
    public function getLast(GetLastRegistryRequest $request);
}