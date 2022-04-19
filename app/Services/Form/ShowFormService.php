<?php

namespace App\Services\Form;

use App\Repositories\Form\FormRepository;

class ShowFormService
{
    private FormRepository $repository;

    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(ShowFormRequest $request)
    {
        return $this->repository->show($request);
    }
}