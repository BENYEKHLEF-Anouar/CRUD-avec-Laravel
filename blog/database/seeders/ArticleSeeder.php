<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('seeds/articles.csv');

        if (! file_exists($path)) {
            $this->command->warn("⚠️  Fichier manquant : $path (seed ignoré)");
            return;
        }

        if (($handle = fopen($path, 'r')) === false) {
            $this->command->error('❌ Impossible d’ouvrir le fichier CSV.');
            return;
        }

        $header = fgetcsv($handle, 1000, ';'); // lire la première ligne (en-têtes)
        // Reads the first line of the CSV, which should contain column names (like title, slug, excerpt, views, published).
        // Uses ; as the delimiter.

        while (($row = fgetcsv($handle, 1000, ';')) !== false) {
            $data = array_combine($header, $row);

            $title = trim($data['title'] ?? 'Sans titre');  // Default title: "Sans titre" if missing.
            $slug  = $data['slug'] ?: Str::slug($title);  // If slug is empty, generate one from the title using Laravel’s Str::slug().

            Article::updateOrCreate(
                ['slug' => $slug],
                [
                    'title'     => $title,
                    'excerpt'   => $data['excerpt'] ?? null,
                    'views'     => (int)($data['views'] ?? 0),
                    'published' => filter_var($data['published'] ?? true, FILTER_VALIDATE_BOOL),
                ]
            );
        }

        fclose($handle); // Close the File

        $this->command->info('✅ Articles importés avec succès depuis le CSV.'); // Prints a success message in the console.
    }
}
