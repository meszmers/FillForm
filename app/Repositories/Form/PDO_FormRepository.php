<?php

namespace App\Repositories\Form;

use App\Database\DatabasePDO;
use App\Services\Form\CreateFormRequest;
use App\Services\Form\IndexFormRequest;
use App\Services\Form\LastFormRequest;
use App\Services\Form\ShowFormRequest;
use App\Services\Form\UpdateFormRequest;

class PDO_FormRepository implements FormRepository
{

    public function index(IndexFormRequest $request): array
    {
        $person = DatabasePDO::connection()->fetchAssociative('SELECT person_code FROM person_registry where id = ?', [$request->getId()]);
        return DatabasePDO::connection()->fetchAllAssociative('SELECT * FROM person_form where person_code = ? ORDER BY created_at DESC ', [$person['person_code']]);
    }

    public function create(CreateFormRequest $request)
    {
        $DB = DatabasePDO::connection();
        $person = $DB->fetchAssociative('SELECT * FROM person_registry WHERE id = ?', [$request->getId()]);

        $DB->insert('person_form', [
            'person_code' => $person['person_code'],
            'name' => $person['name'],
            'surname' => $person['surname'],
        ]);

        return DatabasePDO::connection()->fetchAssociative('SELECT LAST_INSERT_ID()');

    }

    public function show(ShowFormRequest $request)
    {
        return DatabasePDO::connection()->fetchAssociative('SELECT * FROM person_form WHERE id = ?', [$request->getId()]);
    }

    public function update(UpdateFormRequest $request): void
    {

        DatabasePDO::connection()->update('person_form',
            [
                'one' => $request->getOne(),
                'two' => $request->getTwo(),
                'three' => $request->getThree(),
                'four' => $request->getFour(),
                'five' => $request->getFive(),
                'six' => $request->getSix(),
                'seven' => $request->getSeven(),
                'eight' => $request->getEight(),
                'nine' => $request->getNine(),
                'ten' => $request->getTen(),
                'eleven' => $request->getEleven(),
                'twelve' => $request->getTwelve(),
                'thirteen' => $request->getThirteen(),
            ], ['id' => $request->getId()]);


    }
}