<?php declare(strict_types=1);


namespace App\Components;


use App\Forms\FormFactory;
use Nette\Application\UI\Control;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Form;

class TinyMce extends Control
{
    /** @var FormFactory */
    private $formFactory;


    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function render(): void
    {
        $this->template->setFile(__DIR__ . '/templates/tinymce.latte');
        $this->template->render();
    }

    protected function createComponentTinyMce(string $name): Form
    {
        $form = $this->formFactory->create();

        $form->addTextArea('editor', 'Editor');

        $form->addTextArea('no_editor', 'No editor')
            ->setHtmlAttribute('class', 'no-editor');
        //v tinymce.init.js je nastaveno, že textarea s třídou 'no-editor' se bude ignorovat

        $form->addSubmit('submit', 'Submit');

        return $form;
    }
}