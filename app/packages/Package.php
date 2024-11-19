<?php

namespace App\Packages;

use App\Contact\ContactManager;
use Tempest\Console\Console;
use Tempest\Console\ConsoleCommand;
use Tempest\Core\AppConfig;

readonly class Package
{
    final public function __construct(
        private Console $console, // Dependency tự động được inject
        private AppConfig $config,
        private ContactManager $contacts,
    ) {}
    //    Command để liệt kê tất cả các package
    //   Thực hiện logic
    #[ConsoleCommand]
    //   Gắn cờ cho method all để nó có thể được gọi thông qua lệnh console.
    public function all(): void
    {
        $this->console->info('Listing all packages...');
    }

    #[ConsoleCommand]
    public function info(string $name): void
    {
        $this->console->info("Information for package: $name");
    }

    #[ConsoleCommand]
    public function list(): void
    {
        $this->console->success("List of all packages part 2");
    }
}
