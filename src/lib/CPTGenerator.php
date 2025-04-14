<?php

namespace WPMake\lib;

require __DIR__ . '../../utils/helpers.php';

class CPTGenerator
{
    public static function create(array $data): void
    {
        $template = file_get_contents(__DIR__ . '/../templates/cpt.php.stub');

        $replaced = str_replace(
            ['{{ name }}', '{{ slug }}', '{{ singular_name }}'],
            [
                $data['singular_name'],
                $data['plural_name'],
                $data['slug'],
            ],
            $template
        );

        createFolderIfNotExists('cpt');
        file_put_contents("cpt/template-{$data['slug']}.php", $replaced);
    }
}
