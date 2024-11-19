<?php

namespace App\Config; // Đảm bảo namespace này khớp với cấu trúc thư mục

use Tempest\Core\AppConfig;

final readonly class MyAppConfig implements AppConfig
{
    public function __construct(
        private string $appName = 'TempestApp',
    ) {}

    public function getAppName(): string
    {
        return $this->appName;
    }
}
