<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Observing\Common;

use ArrayObject;

class CustomArrayObject extends ArrayObject
{
    function delete(mixed $value)
    {
        foreach ($this as $key => $data) {
            if ($value === $data) {
                $this->offsetUnset($key);
            }
        }
    }
}