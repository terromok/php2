<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{

    public function getTableName() {
        return 'users';
    }

    public function makeHashAuth() {
        $hash = uniqid(rand(), true);
        //var_dump($hash);
        $this->setHash($hash);
        setcookie("hash", $hash, time() + 36000);
        
    }

    public function setHash($hash) {

        $login = $_SESSION["login"]; //хеш задаем по логину, а не по ID (не получилось...)// оказывается, не задал сессион[id]

        $sql = "UPDATE `users` SET `hash` = '$hash' WHERE `login` = '$login'";
        App::call()->db->execute($sql);//, ["$hash"=>$hash] Параметры надо бы задать чз двоеточие
    }

    public function auth($login, $pass) {
        $user = $this->getWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isLogin($login) {
        $user = $this->getWhere('login', $login);
        if (!$user) {
            return true;
        }
        return false;
    }

    public function isAdmin() {
        return ($_SESSION['login'] == 'admin') ? true: false;
    }

    /*public function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }*/

    public function isAuth()  // пока не получилось реализовать
    {
        //$this->makeHashAuth();
        //var_dump($_COOKIE["hash"]);
            //die();
        if (isset($_COOKIE["hash"])) {
            
            $hash = $_COOKIE["hash"];
            ///$db = getDb();
            //$sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";

            // Массив создается, но по ключу login вытащить не могу

            $user = App::call()->userRepository->getWhere('hash', $hash);
            //$u = $user;
            var_dump($user);

            die(qwe);
            if (!empty($user)) {
                //die(ttt);
                //var_dump($user);
                //var_dump($user["id"]);
                $_SESSION['login'] = $user->login;
                //var_dump($_SESSION['login']) ;
            }
        }
        return isset($_SESSION['login']) ? true : false;
    }

    public function get_user() {
    
        return is_auth() ? $_SESSION['login'] : false;
    }

    public function getName() {
        if (isset($_SESSION['login'])) return $_SESSION['login'];
        else return "Guest";
    }

    public function getEntityClass()
    {
        return User::class;
    }

}