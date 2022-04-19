<?php

namespace App\Repositories\Form;

use App\Services\Form\CreateFormRequest;
use App\Services\Form\IndexFormRequest;
use App\Services\Form\ShowFormRequest;
use App\Services\Form\UpdateFormRequest;

interface FormRepository
{
    public function index(IndexFormRequest $request): array;

    public function create(CreateFormRequest $request);

    public function show(ShowFormRequest $request);

    public function update(UpdateFormRequest $request): void;
}