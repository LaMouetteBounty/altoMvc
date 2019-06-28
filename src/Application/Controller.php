<?php

namespace App\Application;

//permet de donner un chemin et eviter les conflit entre deux classe identique dans deux fichiers différent
use App\Application\Template;

class Controller 
{
    /**
     * @var Template
     */
    protected $twig;

    public function __construct()
    {
        $this->twig = new Template();
    }
}
