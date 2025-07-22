<?php

namespace Kwanda\JsonCleaner\Tests;

use PHPUnit\Framework\TestCase;
use Kwanda\JsonCleaner\JsonCleaner;

require_once __DIR__ . '/../vendor/autoload.php';

class CleanupTest extends TestCase {
    public function testValidJsonReturnsSame() {
        $cleaner = new JsonCleaner();
        $input = '{"name":"John","age":30}';
        $this->assertEquals($input, $cleaner->clean($input));
    }

    public function testTruncatesUnclosedObject() {
        $cleaner = new JsonCleaner();
        $input = '{"name":"John","age":30';
        $expected = '{"name":"John","age":30';
        $this->assertEquals($expected, $cleaner->clean($input));
    }

    public function testHandlesNestedStructures() {
        $cleaner = new JsonCleaner();
        $input = '{"data":{"items":[1,2,3';
        $expected = '{"data":{"items":[1,2,3';
        $this->assertEquals($expected, $cleaner->clean($input));
    }
}
