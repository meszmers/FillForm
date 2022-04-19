<?php

namespace App\Services\Form;

use App\Repositories\Form\FormRepository;

class UpdateFormService
{
    private FormRepository $repository;

    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(UpdateFormRequest $request)
    {
        $this->repository->update($request);
    }
}
