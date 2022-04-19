<?php

namespace App\Controllers;

use App\Redirect;
use App\Services\Form\CreateFormRequest;
use App\Services\Form\CreateFormService;
use App\Services\Form\IndexFormRequest;
use App\Services\Form\IndexFormService;
use App\Services\Form\ShowFormRequest;
use App\Services\Form\ShowFormService;
use App\Services\Form\UpdateFormRequest;
use App\Services\Form\UpdateFormService;
use App\View;
use Psr\Container\ContainerInterface;

class FormController
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index($vars)
    {
        $forms = $this->container->get(IndexFormService::class)->execute(new IndexFormRequest($vars['id']));
        return new View('forms.html', ['forms' => $forms, 'id' => $vars['id']]);
    }

    public function create($vars)
    {
        $insert = $this->container->get(CreateFormService::class)->execute(new CreateFormRequest($vars['id']));

        return new Redirect('/form/' . $insert['LAST_INSERT_ID()']);
    }

    public function show($vars)
    {
        $form = $this->container->get(ShowFormService::class)->execute(new ShowFormRequest($vars['id']));
        $form[6] = explode('+', $form[6]);
        $form[7] = explode('+', $form[7]);
        $form[10] = explode('+', $form[10]);
        $form[11] = explode('+', $form[11]);
        return new View('form.html', ['form' => $form]);
    }

    public function update($vars)
    {
        $this->container->get(UpdateFormService::class)->execute(new UpdateFormRequest(
            $vars['id'],
            $_GET['1'],
            $_GET['2'],
            $_GET['3'],
            $_GET['4'],
            $_GET['5'],
            implode("+", $_GET['6']),
            implode("+", $_GET['7']),
            $_GET['8'],
            $_GET['9'],
            implode("+", $_GET['10']),
            implode("+", $_GET['11']),
            $_GET['12'],
            $_GET['13'],
        ));
        return new Redirect('/form/' . $vars['id']);
    }
}