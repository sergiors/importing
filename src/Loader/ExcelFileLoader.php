<?php

namespace Sergiors\Importing\Loader;

use Symfony\Component\Config\Loader\FileLoader;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
abstract class ExcelFileLoader extends FileLoader
{
    /**
     * @param string $file
     * @param string $type
     *
     * @return array
     */
    public function load($file, $type = null)
    {
        $rows = [];

        $worksheet = $this->loadFile($file)->getActiveSheet();
        $highestRow = $worksheet->getHighestDataRow();
        $highestColumn = $worksheet->getHighestDataColumn();

        for ($i = 0; $i <= $highestRow; ++$i) {
            $rowData = $worksheet->rangeToArray("A{$i}:{$highestColumn}{$i}", null, false, false);
            $rowData = $this->cellIterator($rowData[0]);
            if (false === $rowData) {
                continue;
            }

            $rows[] = $rowData;
        }

        return $rows;
    }

    /**
     * @param array $iterator
     *
     * @return array|bool
     */
    private function cellIterator(array $iterator)
    {
        foreach ($iterator as $key => $value) {
            if (empty($value)) {
                unset($iterator[$key]);
            }
        }

        if (empty($iterator)) {
            return false;
        }

        return $iterator;
    }

    /**
     * @param string $file
     *
     * @return \PHPExcel
     *
     * @throws \PHPExcel_Reader_Exception
     */
    abstract protected function loadFile($file);
}
