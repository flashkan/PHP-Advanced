<?php

namespace App\tests;

use App\models\entities\User;
use App\models\repositories\GoodRepository;
use App\models\repositories\Repository;
use App\models\repositories\UserRepository;
use PHPUnit\Framework\TestCase;

class AdminControllerTest extends TestCase
{
    public function testGetUser()
    {
        $admin = (new UserRepository());
        $this->assertTrue(isset($admin));
    }

}