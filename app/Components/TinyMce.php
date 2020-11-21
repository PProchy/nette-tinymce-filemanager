<?php declare(strict_types=1);


namespace App\Components;


use App\Forms\FormFactory;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\ComponentModel\IComponent;
use Nette\Http\FileUpload;
use Nette\Utils\ArrayHash;
use Nette\Utils\Image;
use Nette\Utils\Strings;
use Ramsey\Uuid\Uuid;
use Tracy\ILogger;

class TinyMce extends Control
{
    /** @var FormFactory */
    private $formFactory;
    /**
     * @var ILogger
     */
    private $logger;


    public function __construct(FormFactory $formFactory, ILogger $logger)
    {
        $this->formFactory = $formFactory;
        $this->logger = $logger;
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

        $form->onSuccess[] = function (Form $form, ArrayHash $values) {
            dumpe($values->editor);
        };

        return $form;
    }

    public function handleImageUploadHandler(): void
    {
        $files = $this->presenter->getHttpRequest()->getFiles();

        /** @var FileUpload $file */
        foreach ($files as $file) {
            $uuid = Uuid::uuid4();
            $name = $file->getName();
            $ext = pathinfo($file->getName(), PATHINFO_EXTENSION);
            $filename = sprintf('%s.%s', $uuid, $ext);
            $size = $file->getSize();

            $filesToSave[] = [
                'location' => $filename,
                'uuid' => $uuid,
                'name' => $name,
                'size' => $size,
                'extension' => $ext
            ];

            $location = sprintf('uploads/%s', $filename);
            $file->move($location);

            $this->presenter->sendJson([
                'location' => '/' . $location,
            ]);
        }
    }

}