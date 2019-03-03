<?php

namespace Test\TemplateMethod;

use App\TemplateMethod\MarkdownTable;
use PHPUnit\Framework\TestCase;

class MarkdownTest extends TestCase
{
    public function testImplementsTable()
    {
        $table = new MarkdownTable();
        $this->assertTrue(is_subclass_of($table, 'App\TemplateMethod\Table'));
    }

    public function testDisplayWithEmptyHeader()
    {
        $table = new MarkdownTable();
        $table->setBody([['Banana', 100], ['Apple', 200]]);

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Table header must be set.');
        $table->display();
    }

    public function testDisplayWithEmptyBody()
    {
        $table = new MarkdownTable();
        $table->setHeader(['Name', 'Price']);

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Table body must be set.');
        $table->display();
    }

    public function testDisplay()
    {
        $table = new MarkdownTable();
        $table->setHeader(['Name', 'Price']);
        $table->setBody([['Banana', 100], ['Apple', 200]]);

        $expected = <<<EOT
| Name | Price |
| ---- | ---- |
| Banana | 100 |
| Apple | 200 |
EOT;
        $this->expectOutputString($expected);
        $table->display();
    }
}