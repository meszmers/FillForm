<?php

namespace App\Services\Form;

use App\Repositories\Form\FormRepository;

class IndexFormService
{

    private FormRepository $repository;

    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(IndexFormRequest $request)
    {
        return $this->repository->index($request);
    }
}
