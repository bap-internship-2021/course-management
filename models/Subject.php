<?php

require_once 'connection.php';
class Subject
{
    // Những field của model tương tác với database (The fields of model that contract with database)
    public int $id;
    public string $name;
    public int $credit_number;

    public function index()
    {

    }
}