<?php

namespace App;

use Config\App;
use Tempest\Console\Console;
use Tempest\Console\ConsoleCommand;
use Tempest\Core\AppConfig;

readonly class Package
{
    final public function __construct(
        private Console $console, // Dependency tự động được inject
        private AppConfig $config
    ) {}


    #[ConsoleCommand]
    public function all(): void
    {
        $this->console->info('Listing all packages...');
    }


    #[ConsoleCommand]
    public function info(string $name): void
    {
        $this->console->info("Information for package: $name");
    }

    
    // Command để liệt kê tất cả các package
    #[ConsoleCommand]
    public function list(): void
    {
        //   Thực hiện logic
        //   Gắn cờ cho method all để nó có thể được gọi thông qua lệnh console.
        $this->console->success("List of all packages part 2");
    }
}
