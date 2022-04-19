<?php

namespace App\Controllers;


use App\Services\Form\IndexFormRequest;
use App\Services\Form\IndexFormService;
use App\Services\Registry\GetLastRegistryRequest;
use App\Services\Registry\GetLastRegistryService;
use App\View;
use Psr\Container\ContainerInterface;

class RegistryController
{

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function home()
    {
        return new View('registry.html', ['name' => $_GET['name']]);
    }

    public function personList()
    {
        $data = [];
        $forms = [];
        if (strlen($_GET['search']) > 1) {
            if (!empty($_GET['search'])) {
                $data = $this->container->get(GetLastRegistryService::class)->execute(new GetLastRegistryRequest($_GET['search']));
                foreach ($data as $index => $each) {
                    $forms[$index] = $this->container->get(IndexFormService::class)->execute(new IndexFormRequest($each['id']));
                }
            }
            return new View('personList.html', ['data' => $data, 'forms' => $forms]);
        }
        return "";
    }

}
