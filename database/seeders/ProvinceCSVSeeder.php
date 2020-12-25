<?php /** @noinspection PhpUndefinedMethodInspection */

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class ProvinceCSVSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'address_provinces';
        $this->filename = base_path().'/database/seeders/csv/province.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'name'
        ];
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();

        parent::run();
    }
}
