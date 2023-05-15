<?php

namespace MK\MyPlugin\Main;

use MK\MyPlugin\Attributes\Action;
use MK\MyPlugin\Attributes\Filter;

class Frontend
{
    #[Filter('body_class')]
    public function addBodyClass(array $classes): array
    {
        $classes[] = 'my-added-class';

        return $classes;
    }

    #[Action('wp_enqueue_scripts')]
    public function enqueueAssets(): void
    {
        // Caution! This file doesn't exist - it's just for education purposes!
        wp_enqueue_style('my-plugin', '/style.css');
    }
}