<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOperationSeeder extends Seeder
{
    static $types = [
        'Dépôt de caisse',
        'Remise en banque',
        'Retrait'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (self::$types as $type) {
            DB::table('type_operations')->insert([
                'title' => $type,
            ]);
        }
    }
}
