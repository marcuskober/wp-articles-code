<?php

namespace MK\MyPlugin\Attributes;

interface HookInterface
{
    public function register(callable|array $method): void;
}