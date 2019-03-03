<?php

namespace Test\TemplateMethod;

use App\TemplateMethod\HtmlTable;
use PHPUnit\Framework\TestCase;

class HtmlTableTest extends TestCase
{
    public function testImplementsTable()
    {
        $table = new HtmlTable();
        $this->assertTrue(is_subclass_of($table, 'App\TemplateMethod\Table'));
    }

    public function testDisplayWithEmptyHeader()
    {
        $table = new HtmlTable();
        $table->setBody([['Banana', 100], ['Apple', 200]]);

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Table header must be set.');
        $table->display();
    }

    public function testDisplayWithEmptyBody()
    {
        $table = new HtmlTable();
        $table->setHeader(['Name', 'Price']);

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Table body must be set.');
        $table->display();
    }

    public function testDisplay()
    {
        $table = new HtmlTable();
        $table->setHeader(['Name', 'Price']);
        $table->setBody([['Banana', 100], ['Apple', 200]]);

        $expected = <<<EOT
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Banana</td>
      <td>100</td>
    </tr>
    <tr>
      <td>Apple</td>
      <td>200</td>
    </tr>
  </tbody>
</table>
EOT;
        $this->expectOutputString($expected);
        $table->display();
    }
}