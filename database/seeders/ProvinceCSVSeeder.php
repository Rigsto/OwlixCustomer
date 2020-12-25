<?php /** @noinspection PhpUndefinedMethodInspection */

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class ProvinceCSVSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeders/csv/province.csv';
        $this->delimiter = ',';
        $this->header = true;
        $this->tablename = 'address_provinces';
    }

    public function run()
    {
        parent::run();
    }
}
