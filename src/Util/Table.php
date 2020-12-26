<?php


namespace App\Util;


class Table
{
    protected string $renderTable = "";
    protected array $rows = [];
    protected array $headers = [];

    /**
     * @param string[] $elements
     */
    public function addRow(array $elements): void
    {
        $this->rows[] = $elements;
    }

    /**
     * @param string[] $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getTable(): string
    {
        $this->renderTable = '<table id="" style="width:100%  border: 1px solid #dddddd; text-align: left; padding: 8px ;">';


        $this->renderTable .= $this->renderRow($this->headers, true);

        $this->renderTable .= $this->getRowsHtml();

        $this->renderTable .= '</table>';

        return $this->renderTable;
    }

    protected function getRowsHtml(): string
    {
        $rowsHtml = '';
        foreach ($this->rows as $row) {
            $rowsHtml .= $this->renderRow($row);
        }

        return $rowsHtml;
    }

    protected function renderRow(array $rowElements, bool $isHeader = false): string
    {
        $rowHtml = '<tr>';

        $elementTag = $isHeader ? 'th ' : 'td';
        foreach ($rowElements as $element) {
            $rowHtml .= '<' . $elementTag . '>' . $element . '</' . $elementTag . '>';
        }
        $rowHtml .= '</tr>';

        return $rowHtml;
    }
}