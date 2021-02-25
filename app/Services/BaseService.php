<?php


namespace App\Services;


abstract class BaseService
{
    protected $interface;

    public function __construct($interface)
    {
        $this->interface = new $interface;
    }

    public function index()
    {
        $this->interface->getAll();
    }
}
