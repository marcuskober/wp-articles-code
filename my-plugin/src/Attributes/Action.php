<?php

namespace MK\MyPlugin\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Action extends Filter
{
}