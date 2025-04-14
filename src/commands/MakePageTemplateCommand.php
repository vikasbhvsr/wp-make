<?php

namespace WPMake\commands;

use WPMake\lib\PageTemplateGenerator;

use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

class MakePageTemplateCommand
{
    public static function handle(): void
    {
        $name = text(
            label: 'Enter template name',
            required: true,
            placeholder: 'My Template',
        );

        $slug = strtolower(str_replace(' ', '-', $name));

        $withHeaderFooter = select(
            label: 'Do you want to include header and footer?',
            options: ['Both - Header & Footer', 'Header only', 'Footer only', 'No'],
            default: 'Both - Header & Footer',
        );

        PageTemplateGenerator::create([
            'name' => $name,
            'slug' => $slug,
            'with_header_footer' => $withHeaderFooter,
        ]);

        echo "✅ Template created: template-{$slug}.php\n";
    }
}
