<?php

namespace App\controllers;

use App\models\entities\User;
use App\models\repositories\UserRepository;

class UserController extends Controller
{
    public function userAction()
    {
        $id = $this->request->getId();
        $params = [
            'user' => (new UserRepository)->getOne($id)
        ];
        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
            'users' => (new UserRepository)->getAll()
        ];
        echo $this->render('users', $params);
    }

    public function registrationAction()
    {
        $params = [];
        echo $this->render('registration', $params);
    }

    public function newUserAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new UserRepository();
            $users = (new UserRepository())->getAll();

            // проверка на пустые поля в запросе
            foreach ($_POST as $elem) {
                if (!$elem) header('Location: /user/registration');
                exit;
            }

            // проверка на совпадение существующего логина
            foreach ($users as $elem) {
                $userLog = $elem->getUserLogin();
                if ($_POST['userLogin'] == $userLog) {
                    header('Location: /user/registration');
                    exit;
                }
            }

            // проверка что бы поля с паролями были однинаковы
            if ($_POST['userPassword'] !== $_POST['userPassword2']) {
                header('Location: /user/registration');
                exit;
            }

            $params = [
                'name' => $_POST['userName'],
                'login' => $_POST['userLogin'],
                'password' => $_POST['userPassword'],
                'email' => $_POST['userEmail'],
                'admin' => 0
            ];
            $user->save($params);
            header('Location: /good');
            exit;
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
                        header('Location: /good');
                        exit;
                    }
                }
            }
        }
    }
}