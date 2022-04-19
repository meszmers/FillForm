<?php

namespace App\Services\Registry;


use App\Repositories\Registry\RegistryRepository;

class GetLastRegistryService
{

    private RegistryRepository $RegistryRepository;

    public function __construct(RegistryRepository $RegistryRepository)
    {
        $this->RegistryRepository = $RegistryRepository;
    }

    public function execute(GetLastRegistryRequest $request)
    {

        return $this->RegistryRepository->getLast($request);
    }
}
