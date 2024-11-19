<?php

declare(strict_types=1);

namespace App\Controllers;

use Tempest\Http\Get;

use function Tempest\view;

use Tempest\View\View;

final readonly class HomeController
{
    #[Get('/')]
    public function __invoke(): View
    {
        return view('views/home.view.php'); // Thêm / để phân cách folder tới file trong view
    }
}
