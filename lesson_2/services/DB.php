<?php

namespace App\services;
class DB implements IDB
{
    /**
     * Временная функции. В дальнейшем будет переделана и будет выполнять запрос в БД.
     * Получает готовый SQL запрос и возвращает его.
     * @param string $sql Готовый SQL запрос.
     * @return string $sql Готовый SQL запрос.
     */
    public function find($sql)
    {
        return $sql;
    }

    /**
     * Временная функции. В дальнейшем будет переделана и будет выполнять запрос в БД.
     * Получает готовый SQL запрос и возвращает его.
     * @param string $sql Готовый SQL запрос.
     * @return string $sql Готовый SQL запрос.
     */
    public function findAll($sql)
    {
        return $sql;
    }
}