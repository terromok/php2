<?php


namespace app\controllers;

use app\engine\App;
use app\interfaces\IRenderer;


abstract class Controller
{
    private $action;
    private $defaultAction = "index";
    private $layout = 'main';
    private $useLayouts = true;
    private $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "Controller 404";
            var_dump($this->$method());
        }
    }

    public function render($template, $params = [])
    {
        if ($this->useLayouts) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderTemplate($template, $params),
                'auth' => App::call()->userRepository->isAuth(),
                'username' => App::call()->userRepository->getName(),
                'menu' => $this->renderTemplate('menu', [
                    'count' => App::call()->basketRepository->totalQuantity(),
                    'username' => App::call()->userRepository->getName(),
                    'totalPrice' => App::call()->basketRepository->totalPrice()

                ])
            ]);
        }else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }

}