<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\LazyCollection;

class PlageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::disableQueryLog();

        LazyCollection::make(function(){
            $handle = fopen(public_path('plage.csv'),'r');

            while( ($line = fgetcsv($handle,8096)) != false){
                $dataString = implode(', ',$line);
                $row = explode(',',$dataString);
                yield $row;
            }

            fclose($handle);
        })
        ->skip(1)
        ->chunk(1000)
        ->each(function(LazyCollection $chunk){
            $records = $chunk->map(function($row){
                return [
                    'name' => $row[0],
                    'zip' => $row[1],
                    'description' => $row[2],
                ];
            })->toArray();

            DB::table('plages')->insert($records);
        });

    }
}
