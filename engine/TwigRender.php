<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class TwigRender implements IRenderer
{
    protected $twig;

    /**
     * TwigRender constructor.
     * @param $twig
     */
    public function __construct()
    {
        $loader = new FilesystemLoader('../twigtemplates');
        $this->twig = new Environment($loader);
    }

    public function renderTemplate($template, $params = [])
    {
        $filename = $template . ".twig";
        return $this->twig->render($filename, $params);
    }
}