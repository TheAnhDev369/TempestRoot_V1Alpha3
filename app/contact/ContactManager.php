<?php

namespace App\Contact;

use Tempest\Console\Console;
use Tempest\Console\ConsoleCommand;

class ContactManager
{
    private string $storageFile = __DIR__ . '/contacts.json'; // Đường dẫn file lưu trữ
    private array $contacts;

    public function __construct(private Console $console)
    {
        $this->loadContacts();
    }

    private function loadContacts(): void
    {
        if (file_exists($this->storageFile)) {
            $data = file_get_contents($this->storageFile);
            $this->contacts = json_decode($data, true) ?? [];
        } else {
            // Danh bạ mặc định nếu file chưa tồn tại
            $this->contacts = [
                'John Doe' => 'john@example.com',
                'Jane Doe' => 'jane@example.com',
            ];
            $this->saveContacts();
        }
    }

    private function saveContacts(): void
    {
        file_put_contents($this->storageFile, json_encode($this->contacts, JSON_PRETTY_PRINT));
    }

    #[ConsoleCommand]
    public function listContacts(): void
    {
        if (empty($this->contacts)) {
            $this->console->info("No contacts found.");
            return;
        }

        $this->console->info("Listing all contacts:");
        foreach ($this->contacts as $name => $email) {
            $this->console->info("$name: $email");
        }
    }

    #[ConsoleCommand]
    public function addContact(string $name, string $email): void
    {
        $this->contacts[$name] = $email;
        $this->saveContacts();
        $this->console->success("Added $name with email $email.");
    }

    #[ConsoleCommand]
    public function removeContact(string $name): void
    {
        if (isset($this->contacts[$name])) {
            unset($this->contacts[$name]);
            $this->saveContacts();
            $this->console->success("Removed $name.");
        } else {
            $this->console->error("Contact $name not found.");
        }
    }
}
 