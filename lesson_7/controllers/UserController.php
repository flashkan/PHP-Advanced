<?php

namespace App\controllers;

use App\models\entities\User;
use App\models\repositories\UserRepository;

class UserController extends Controller
{
    public function userAction()
    {
        $id = $this->request->getSession('userId');
        $this->params += [
            'user' => (new UserRepository)->getOne($id),
            'currentUrl' => '/user/user'
        ];
        echo $this->render('user', $this->params);
    }

    public function usersAction()
    {
        $this->params += [

            'users' => (new UserRepository)->getAll()
        ];
        echo $this->render('users', $this->params);
    }

    public function registrationAction()
    {
        $this->params += [
            'currentUrl' => '/user/registration',
        ];
        echo $this->render('registration', $this->params);
    }

    public function newUserAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new UserRepository();
            $users = (new UserRepository())->getAll();
            // проверка на пустые поля в запросе
            foreach ($_POST as $elem) {
                if (!$elem) {
                    return $this->redirect();
                }
            }

            // проверка на совпадение существующего логина
            foreach ($users as $elem) {
                $userLog = $elem->getUserLogin();
                if ($_POST['userLogin'] == $userLog) {
                    return $this->redirect();
                }
            }

            // проверка что бы поля с паролями были однинаковы
            if ($_POST['userPassword'] !== $_POST['userPassword2']) {
                return $this->redirect();
            }

            $params = [
                'name' => $_POST['userName'],
                'login' => $_POST['userLogin'],
                'phone' => $_POST['userPhone'],
                'password' => $_POST['userPassword'],
                'email' => $_POST['userEmail'],
                'admin' => 0
            ];
            $user->save($params);
            return $this->redirect('/good');
        }
    }

    public function loginUserAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $users = (new UserRepository)->getAll();
            foreach ($users as $user) {
                $login = $user->getUserLogin();
                if ($login === $_POST['userLog']) {
                    $pass = $user->getUserPass();
                    if ($pass === $_POST['userPass']) {
                        $userId = $user->getId();
                        $_SESSION['userId'] = $userId;
                        $_SESSION['userLog'] = $login;
                        $_SESSION['auth'] = true;
                        $this->userInit();
                        return $this->redirect('/good');
                    }
                }
            }
        }
        return $this->redirect('/good');
    }

    public function logoutAction()
    {
        session_destroy();
        $this->userInit();
        return $this->redirect('/good');
    }
}