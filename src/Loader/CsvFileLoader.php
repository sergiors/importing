<?php
namespace Sergiors\Importing\Loader;

use PHPExcel_Reader_CSV;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class CsvFileLoader extends ExcelFileLoader
{
    /**
     * {@inheritdoc}
     */
    protected function loadFile($file)
    {
        $reader = new PHPExcel_Reader_CSV();
        return $reader->load($file);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource)
            && 'csv' === pathinfo($resource, PATHINFO_EXTENSION)
            && (!$type || 'csv' === $type);
    }
}
