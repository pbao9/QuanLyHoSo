<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class GenerateIDoc extends Command
{
    protected $signature = 'generate:idoc {type}';
    protected $description = 'Generate iDoc documentation and manage file locations.';

    public function handle(): int
    {
        $type = $this->argument('type');

        if ($type === 'report') {
            return $this->runGenerateIDocCommand();
        }

        $this->error('Invalid type provided.');
        return Command::FAILURE;
    }

    protected function runGenerateIDocCommand(): int
    {
        $this->info('Generating iDoc documentation...');
        Artisan::call('idoc:generate');
        $this->info('iDoc generation complete.');

        return $this->manageDocumentationFiles();
    }

    protected function manageDocumentationFiles(): int
    {
        $appName = env('APP_NAME');
        $sourcePath = base_path("public/{$appName}/docs/api/v1/openapi.json");
        $destinationPath = base_path('public/docs/api/v1/openapi.json');

        $this->info($sourcePath);

        if (!File::exists($sourcePath)) {
            $this->error('Source file does not exist.');
            return Command::FAILURE;
        }

        File::copy($sourcePath, $destinationPath);
        $this->info('Documentation file has been copied successfully.');

        $this->removeTemporaryDirectory($appName);

        return Command::SUCCESS;
    }

    protected function removeTemporaryDirectory(string $appName): void
    {
        File::deleteDirectory(base_path("public/{$appName}"));
        $this->info('Temporary directory has been removed.');
    }
}
