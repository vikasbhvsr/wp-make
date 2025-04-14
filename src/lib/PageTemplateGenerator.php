<?php

namespace WPMake\lib;

require __DIR__ . '../../utils/helpers.php';

class PageTemplateGenerator
{
    public static function create(array $data): void
    {
        $template = file_get_contents(__DIR__ . '/../templates/page-template.php.stub');

        $replaced = str_replace(
            ['{{ name }}', '{{ slug }}', '{{ get_header }}', '{{ get_footer }}'],
            [
                $data['name'],
                $data['slug'],
                $data['with_header_footer'] === 'Both - Header & Footer' ? 'get_header();' : ($data['with_header_footer'] === 'Header only' ? 'get_header();' : ''),
                $data['with_header_footer'] === 'Both - Header & Footer' ? 'get_footer();' : ($data['with_header_footer'] === 'Footer only' ? 'get_footer();' : ''),
            ],
            $template
        );

        createFolderIfNotExists('templates');
        createFolderIfNotExists('templates/page-templates');
        file_put_contents("templates/page-templates/template-{$data['slug']}.php", $replaced);
    }
}
