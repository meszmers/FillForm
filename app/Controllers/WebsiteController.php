<?php

namespace App\Controllers;

use App\Redirect;
use App\View;
use Psr\Container\ContainerInterface;

class WebsiteController
{

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index(): Redirect
    {
        return new Redirect('/registry');
    }

    public function test(): View
    {
        return new View('test.html');
    }
}