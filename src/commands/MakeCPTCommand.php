<?php

namespace WPMake\commands;

use WPMake\lib\CPTGenerator;

use function Laravel\Prompts\text;
use function Laravel\Prompts\select;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\multiselect;

class MakeCPTCommand
{
    public static function handle(): void
    {
        $singularName = text(
            label: 'Enter singular custom post type name',
            required: true,
        );

        $pluralName = text(
            label: 'Enter plural custom post type name',
            required: true,
        );

        $slug = strtolower(str_replace(' ', '-', $singularName));

        CPTGenerator::create([
            'singular_name' => $singularName,
            'plural_name' => $pluralName,
            'slug' => $slug,
        ]);

        echo "✅ Custom post type created: {$slug}.php\n";
    }
}
