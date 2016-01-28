<?php

namespace Sergiors\Importing\Loader;

use PHPExcel_Reader_Excel2007;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class Excel2007FileLoader extends ExcelFileLoader
{
    /**
     * @param string $file
     *
     * @return \PHPExcel
     *
     * @throws \PHPExcel_Reader_Exception
     */
    protected function loadFile($file)
    {
        $reader = new PHPExcel_Reader_Excel2007();

        return $reader->load($file);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource)
            && in_array(pathinfo($resource, PATHINFO_EXTENSION), ['xlsx', 'xlsm', 'xltx', 'xltm'], true)
            && (!$type || 'xlsx' === $type);
    }
}
