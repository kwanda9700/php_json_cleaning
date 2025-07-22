<?php

namespace Kwanda\JsonCleaner;

class JsonCleaner {
    public function clean(string $input): string {
        $stack = [];
        $inString = false;
        $result = '';

        foreach (str_split($input) as $char) {
            if ($char === '"' && (empty($stack) || end($stack) !== '\\')) {
                $inString = !$inString;
            }

            if (!$inString && ($char === '}' || $char === ']')) {
                if (!empty($stack)) array_pop($stack);
            }

            $result .= $char;

            if (!$inString && ($char === '{' || $char === '[')) {
                $stack[] = $char;
            }
        }

        return $result;
    }
}
