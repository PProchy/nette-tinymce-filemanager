<?php declare(strict_types=1);


namespace App\Forms;


use Nette\Application\UI\Form;

interface FormFactory
{
    public function create(): Form;
}