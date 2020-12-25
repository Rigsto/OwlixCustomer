<?php /** @noinspection PhpUndefinedMethodInspection */

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CityCSVSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = 'database/seeders/csv/city.csv';
        $this->delimiter = ',';
        $this->header = true;
        $this->tablename = 'address_cities';
        $this->skipper = '%';
    }

    public function run()
    {
        parent::run();
    }
}
