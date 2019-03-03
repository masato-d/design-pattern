<?php

namespace App\TemplateMethod;

class HtmlTable extends Table
{
    private const NEW_LINE = "\n";
    private const INDENT = "  ";

    protected function outputHeader(): string
    {
        if (empty($this->header)) {
            throw new \LogicException('Table header must be set.');
        }

        $output = "<table>" . self::NEW_LINE;
        $output .= sprintf("%s<thead>%s", str_repeat(self::INDENT, 1), self::NEW_LINE);
        $output .= sprintf("%s<tr>%s", str_repeat(self::INDENT, 2), self::NEW_LINE);
        foreach ($this->header as $header) {
            $output .= sprintf("%s<th>%s</th>%s", str_repeat(self::INDENT, 3), $header, self::NEW_LINE);
        }
        $output .= sprintf("%s</tr>%s", str_repeat(self::INDENT, 2), self::NEW_LINE);
        $output .= sprintf("%s</thead>%s", str_repeat(self::INDENT, 1), self::NEW_LINE);

        return $output;
    }

    protected function outputBody(): string
    {
        if (empty($this->body)) {
            throw new \LogicException('Table body must be set.');
        }

        $output = sprintf("%s<tbody>%s", str_repeat(self::INDENT, 1), self::NEW_LINE);
        foreach ($this->body as $row) {
            $output .= sprintf("%s<tr>%s", str_repeat(self::INDENT, 2), self::NEW_LINE);
            foreach ($row as $value) {
                $output .= sprintf("%s<td>%s</td>%s", str_repeat(self::INDENT, 3), $value, self::NEW_LINE);
            }
            $output .= sprintf("%s</tr>%s", str_repeat(self::INDENT, 2), self::NEW_LINE);
        }
        $output .= sprintf("%s</tbody>%s", str_repeat(self::INDENT, 1), self::NEW_LINE);
        $output .= "</table>";

        return $output;
    }
}