<?php

namespace Sergiors\Importing\Loader;

use PHPExcel_Reader_Excel5;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class Excel5FileLoader extends ExcelFileLoader
{
    /**
     * @param string $file
     *
     * @return \PHPExcel
     */
    protected function loadFile($file)
    {
        $reader = new PHPExcel_Reader_Excel5();

        return $reader->load($file);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource)
            && in_array(pathinfo($resource, PATHINFO_EXTENSION), ['xls', 'xlt'], true)
            && (!$type || 'xls' === $type);
    }
}
