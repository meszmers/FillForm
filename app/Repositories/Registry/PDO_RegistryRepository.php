<?php

namespace App\Repositories\Registry;

use App\Database\DatabasePDO;
use App\Services\Registry\GetLastRegistryRequest;

class PDO_RegistryRepository implements RegistryRepository
{

    public function getLast(GetLastRegistryRequest $request)
    {
        return DatabasePDO::connection()->fetchAllAssociative("SELECT * FROM person_registry WHERE person_code LIKE '%" . $request->getInput() . "%' LIMIT 10");
    }
}