<?php

namespace App\models\repositories;

use App\models\entities\Good;

class GoodRepository extends Repository
{
    protected function getColumnNames()
    {
        return $columnNames = ['good_name', 'good_description', 'good_price'];
    }

    protected function getTableName()
    {
        return 'goods';
    }

    protected function getEntityName()
    {
        return Good::class;
    }
}
