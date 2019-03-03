<?php

namespace App\TemplateMethod;

class MarkdownTable extends Table
{
    private const NEW_LINE = "\n";

    public function outputHeader(): string
    {
        if (empty($this->header)) {
            throw new \LogicException('Table header must be set.');
        }

        $output = "|";
        foreach ($this->header as $header) {
            $output .= sprintf(" %s |", $header);
        }
        $output .= self::NEW_LINE;

        $output .= "|";
        for ($i = 0; $i < count($this->header); $i++) {
            $output .= sprintf(" %s |", str_repeat("-", 4));
        }
        $output .= self::NEW_LINE;

        return $output;
    }

    public function outputBody(): string
    {
        if (empty($this->body)) {
            throw new \LogicException('Table body must be set.');
        }

        $output = "";
        foreach ($this->body as $row) {
            $output .= "|";
            foreach ($row as $value) {
                $output .= sprintf(" %s |", $value);
            }
            $output .= self::NEW_LINE;
        }

        // remove last new line character
        $output = rtrim($output, self::NEW_LINE);

        return $output;
    }
}