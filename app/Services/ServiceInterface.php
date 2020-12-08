<?php


namespace App\Services;


interface ServiceInterface
{
    public function __call($name, $arguments);
}
