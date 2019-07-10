<?php

class Users
{
    public $id;
    protected $userName;
    protected $userPhone;
    protected $userEmail;
    protected $userLog;
    protected $userPass;

    public function __construct($id, $userName, $userPhone, $userEmail, $userLog, $userPass)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->userPhone = $userPhone;
        $this->userEmail = $userEmail;
        $this->userLog = $userLog;
        $this->userPass = $userPass;
    }

    protected function getUserInfo()
    {
        return "<hr><h1>Имя: {$this->userName}</h1>
                <p>Телефон: {$this->userPhone}</p>
                <p>Email: {$this->userEmail}</p>
                <p>Логин: {$this->userLog}</p>";
    }

    public function show()
    {
        $outStr = $this->getUserInfo();
        return $outStr;
    }

    public function __get($name)
    {
        echo "$name не найден.";
    }

    public function __set($name, $value)
    {
        echo "$name не найден. $value не устстоновлен.";
    }
}

class Admins extends Users
{
    protected $isAdmin;

    public function __construct($id, $userName, $userPhone, $userEmail, $userLog, $userPass, $isAdmin)
    {
        parent::__construct($id, $userName, $userPhone, $userEmail, $userLog, $userPass);
        $this->isAdmin = $isAdmin;
    }

    public function show()
    {
        $outStr = $this->getUserInfo();
        $outStr .= "Права администратора: ";
        $outStr .= $this->isAdmin ? 'да' : 'нет'; // к примеру на случай временного ограничения прав.
        return $outStr;
    }
}

$users[] = new Users(1,
    'Nik',
    '+7(999)888-22-22',
    'email@email',
    'user',
    '123');

$users[] = new Users(2,
    'Tom',
    '+7(111)888-22-22',
    'email@email',
    'user2',
    '123');

$users[] = new Admins(3,
    'Ron',
    '+7(222)888-22-22',
    'email@email',
    'admin',
    '123',
    true);

$users[] = new Admins(4,
    'Dik',
    '+7(333)888-22-22',
    'email@email',
    'admin2',
    '123',
    false);

foreach ($users as $user) {
    echo $user->show();
}

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A(); // Так как объекты созданы от одного класаа, то и метод они вызывают один.
//$a2 = new A();
//$a1->foo(); // 1
//$a2->foo(); // 2
//$a1->foo(); // 3
//$a2->foo(); // 4

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A(); // Каждый объекст был создан от своего класса. Даже при том что второй класс наследуется, метод у
//               // каждого свой.
//$b1 = new B();
//$a1->foo(); // 1
//$b1->foo(); // 1
//$a1->foo(); // 2
//$b1->foo(); // 2

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A; // Отличие от пердидущего примера в том, что отсутствуют скобки конструктора. А так как в конструктор
//             // и до этого ничего не предавалось, то результат ни как не поменялся.
//$b1 = new B;
//$a1->foo(); // 1
//$b1->foo(); // 1
//$a1->foo(); // 2
//$b1->foo(); // 2