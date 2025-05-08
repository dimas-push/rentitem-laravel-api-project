<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'Toyota Corolla',
                'brand' => 'Toyota',
                'serial_number' => 'TC123456',
                'price' => 250000,
                'image_path' => 'images/toyota_corolla.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Honda Civic',
                'brand' => 'Honda',
                'serial_number' => 'HC123456',
                'price' => 300000,
                'image_path' => 'images/honda_civic.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suzuki Swift',
                'brand' => 'Suzuki',
                'serial_number' => 'SS123456',
                'price' => 200000,
                'image_path' => 'images/suzuki_swift.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BMW 320i',
                'brand' => 'BMW',
                'serial_number' => 'BM123456',
                'price' => 450000,
                'image_path' => 'images/bmw_320i.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mercedes-Benz C-Class',
                'brand' => 'Mercedes-Benz',
                'serial_number' => 'MB123456',
                'price' => 600000,
                'image_path' => 'images/mercedes_cclass.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Audi A4',
                'brand' => 'Audi',
                'serial_number' => 'AU123456',
                'price' => 500000,
                'image_path' => 'images/audi_a4.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Honda Accord',
                'brand' => 'Honda',
                'serial_number' => 'HA123456',
                'price' => 350000,
                'image_path' => 'images/honda_accord.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nissan Altima',
                'brand' => 'Nissan',
                'serial_number' => 'NA123456',
                'price' => 270000,
                'image_path' => 'images/nissan_altima.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chevrolet Malibu',
                'brand' => 'Chevrolet',
                'serial_number' => 'CM123456',
                'price' => 290000,
                'image_path' => 'images/chevrolet_malibu.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ford Focus',
                'brand' => 'Ford',
                'serial_number' => 'FF123456',
                'price' => 220000,
                'image_path' => 'images/ford_focus.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
