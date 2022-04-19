<?php

namespace App\Services\Form;

use App\Repositories\Form\FormRepository;

class CreateFormService
{
    private FormRepository $repository;

    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateFormRequest $request)
    {
        return $this->repository->create($request);
    }
}
