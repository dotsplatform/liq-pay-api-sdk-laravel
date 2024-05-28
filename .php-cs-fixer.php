<?php

use PhpCsFixer\Finder;

$project_path = getcwd();
$finder = Finder::create()
    ->in([
        $project_path . '/src',
        $project_path . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return \ShiftCS\styles($finder, [
    'no_unused_imports' => true,
    'class_attributes_separation' => [
        'elements' => [
            'property' => 'none',
        ],
    ],
]);
