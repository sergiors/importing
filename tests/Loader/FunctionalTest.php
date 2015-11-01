<?php
namespace Sergiors\Importing\Loader;

use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\FileLocator;

class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    private $loader;

    public function setUp()
    {
        $loaders = [
            new Excel2007FileLoader(new FileLocator()),
            new Excel5FileLoader(new FileLocator()),
            new CsvFileLoader(new FileLocator())
        ];

        $resolver = new LoaderResolver($loaders);
        $this->loader = new DelegatingLoader($resolver);
    }
    /**
     * @test
     */
    public function loadXlsx()
    {
        $data = $this->loader->load(__DIR__.'/Fixture/Oct-31-2015.xlsx');
        $this->assertCount(101, $data);
    }

    /**
     * @test
     */
    public function loadXls()
    {
        $data = $this->loader->load(__DIR__.'/Fixture/Oct-31-2015.xls');
        $this->assertCount(101, $data);
    }

    /**
     * @test
     */
    public function loadXlt()
    {
        $data = $this->loader->load(__DIR__.'/Fixture/Oct-31-2015.xlt');
        $this->assertCount(101, $data);
    }

    /**
     * @test
     */
    public function loadCsv()
    {
        $data = $this->loader->load(__DIR__.'/Fixture/Oct-31-2015.csv');
        $this->assertCount(101, $data);
    }
}
