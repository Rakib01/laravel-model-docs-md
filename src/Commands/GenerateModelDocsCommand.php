<?php

namespace Rakib01\LaravelModelDocsMd\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Rakib01\LaravelModelDocsMd\Helpers\ModelInspector;

class GenerateModelDocsCommand extends Command
{
    protected $signature = 'model-docs-md:generate';
    protected $description = 'Generate Markdown documentation for all Eloquent models (supports modules & packages)';

    public function handle()
    {
        $outputPath = config('modeldocsmd.output_path');
        $baseModelPaths = config('modeldocsmd.model_paths');
        $inspector = new ModelInspector();

        $markdown = "# 📘 Laravel Model Documentation\n\n";

        // 🧭 Collect model paths
        $modelPaths = $this->discoverModelPaths($baseModelPaths);

        foreach ($modelPaths as $path) {
            foreach (File::allFiles($path) as $file) {
                $class = $this->getClassFromFile($file, $path);

                if (!$class || !class_exists($class)) continue;
                if (!is_subclass_of($class, \Illuminate\Database\Eloquent\Model::class)) continue;

                $markdown .= $inspector->analyze($class) . "\n\n";
            }
        }

        File::put($outputPath, $markdown);
        $this->info("✅ Model documentation generated at: {$outputPath}");
    }

    /**
     * Discover all model directories from app, modules, and packages
     */
    protected function discoverModelPaths(array $basePaths): array
    {
        $paths = $basePaths;

        // 🔹 Legacy module paths
        if (File::isDirectory(base_path('Modules'))) {
            foreach (File::directories(base_path('Modules')) as $module) {
                foreach (['Entities', 'Models', 'app/Models'] as $subDir) {
                    $dir = $module . '/' . $subDir;
                    if (File::isDirectory($dir)) {
                        $paths[] = $dir;
                    }
                }
            }
        }

        // 🔹 Modern modular packages
        if (File::isDirectory(base_path('packages'))) {
            foreach (File::allDirectories(base_path('packages')) as $vendorDir) {
                foreach (File::directories($vendorDir) as $package) {
                    $dir = $package . '/app/Models';
                    if (File::isDirectory($dir)) {
                        $paths[] = $dir;
                    }
                }
            }
        }

        return array_unique($paths);
    }

    /**
     * Resolve full class name from file path
     */
    protected function getClassFromFile($file, $basePath)
    {
        $relativePath = str_replace([$basePath . '/', '/', '.php'], ['', '\\', ''], $file->getPathname());
        $possibleNamespaces = [
            app()->getNamespace() . 'Models\\',
            'Modules\\',
            'App\\',
        ];

        foreach ($possibleNamespaces as $ns) {
            $class = $ns . class_basename($relativePath);
            if (class_exists($class)) {
                return $class;
            }
        }

        // Fallback: try parsing namespace from file
        $contents = File::get($file->getPathname());
        if (preg_match('/^namespace\s+([^;]+);/m', $contents, $matches)) {
            $namespace = trim($matches[1]);
            $className = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            return "{$namespace}\\{$className}";
        }

        return null;
    }
}
