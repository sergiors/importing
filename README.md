Importing
---------

Install
-------
```bash
composer require sergiors/importing
```

How to use
----------
```php
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\FileLocator;

$loaders = [
    new Excel2007FileLoader(new FileLocator()),
    new Excel5FileLoader(new FileLocator()),
    new CsvFileLoader(new FileLocator())
];

$resolver = new LoaderResolver($loaders);
$loader = new DelegatingLoader($resolver);

$data = $loader->load('your_file.xls'); // return an array
// print_r($data);
```
Be Happy!

License
-------
MIT