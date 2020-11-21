<?php declare(strict_types = 1);

namespace App\Components;

trait InjectTinyMceControl
{

    /** @var TinyMceFactory */
    protected $tinyMceFactory;

    public function injectTinyMceFactory(TinyMceFactory $tinyMceFactory): void
    {
        $this->tinyMceFactory = $tinyMceFactory;
    }

    protected function createComponentTinyMceControl(): TinyMce
    {
        return $this->tinyMceFactory->create();
    }

}
