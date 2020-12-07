<?php

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            'Cement',
            'Sand',
            'Bricks',
            'Iron',
            'Marble',
            'Tile',
        ];
        foreach ($materials as $material) {
            Material::updateOrCreate([
                'name' => $material
            ], [
                'name' => $material
            ]);
        }
    }
}
