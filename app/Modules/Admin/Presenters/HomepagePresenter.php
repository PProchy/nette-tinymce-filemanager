<?php

declare(strict_types=1);

namespace App\Modules\Admin\Presenters;

use App\Components\InjectTinyMceControl;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    use InjectTinyMceControl;

}
