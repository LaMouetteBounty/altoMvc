<?php

namespace App\Application;
use \Twig_Loader_FileSystem;
use \Twig_Environment;

class Template
{
    private const PATH = '../templates';

    /**
     * @var Twig_loader_FileSystem
     */
    private $loader;

    /**
     * @var Twig_Environment 
     */
    private $template;

    public function __construct() {
        $this->loader = new Twig_Loader_FileSystem( self::PATH );
        $this->template = new Twig_Environment( 
            $this->loader, 
            array(
                'cache' => false
            ) 
        );
    }

    public function render( string $path, array $params = [] ):string
    {
        return $this->template->render(
            $path,
            $params
        );
    }
}
