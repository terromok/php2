<?php


namespace app\controllers;

use app\engine\App;
use app\models\repositories\UserRepository;
use app\models\entities\User;


class UserController extends Controller
{

    public function actionReg() {
        echo $this->render('reg');
//var_dump($_POST);
        if (isset($_POST['button'])) {
            //TODO переделать на request   ПЕРЕДЕЛАЛ
            $name = App::call()->request->getParams()['name'];
            $login = App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            //die($name);//, $login, $pass

            /*$name = $_POST['name'];
            $login = $_POST['login'];
            $pass = $_POST['pass'];*/
           
            if (!(App::call()->userRepository->isLogin($login))) {
                Die("Пользователь с таким логином уже зарегистрирован!");
            } else //echo $name;
                App::call()->userRepository->insert(new User($name, $login, $pass));

                echo "<br>Пользователь успешно зарегистрирован";
                //header("Location: /");
            exit();
        }        
     }

    public function actionLogin() {
        if (isset(App::call()->request->getParams()['submit'])) {
            $qwer = App::call()->request->getParams();
            //var_dump($qwer);
            //die();

            $login = App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            if (!(App::call()->userRepository->auth($login, $pass))) {
                Die("Не верный пароль!");
            } else {
                if (App::call()->request->getParams()['save']) {
                    App::call()->userRepository->makeHashAuth();
                }
                header("Location: /");
            }

                
            exit();
        }
    }
    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}