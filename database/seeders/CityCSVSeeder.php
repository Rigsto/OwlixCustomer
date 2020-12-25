<?php /** @noinspection PhpUndefinedMethodInspection */

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class CityCSVSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'address_cities';
        $this->filename = base_path().'/database/seeders/csv/city.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'province_id',
            3 => 'type',
            4 => 'name',
            5 => 'postal_cde'
        ];
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();

        parent::run();
    }
}
