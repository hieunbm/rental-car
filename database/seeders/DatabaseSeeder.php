<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Users
        DB::table('users')->insert([
            [
                'name' => 'Khach Hang',
                'email' => 'chuduchoang@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '0987654321',
                "role" => null,
                'status' => "0",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '0123456789',
                "role" => 'admin',
                'status' => "0",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //Driving Licenses
        DB::table('driving_licenses')->insert([
            [
                'user_id' => 1,
                'license_number' => '083947193757',
                'thumbnail_1' => 'uploadLicenses/mattruoc.jpg',
                'thumbnail_2' => 'uploadLicenses/matsau.jpg',
                'issue_date' => "2023-07-12",
                'expiration_date' => "2030-07-12",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'license_number' => '083947193999',
                'thumbnail_1' => 'uploadLicenses/mattruoc.jpg',
                'thumbnail_2' => 'uploadLicenses/matsau.jpg',
                'issue_date' => "2020-07-12",
                'expiration_date' => "2028-07-12",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //Brands
        DB::table('brands')->insert([
            [
                'name' => 'Audi',
                'slug' => Str::slug('Audi'),
                'icon' => 'images/icons/Audi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BMW',
                'slug' => Str::slug('bmw'),
                'icon' => 'images/icons/BMW.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //Car Type
        DB::table('carTypes')->insert([
            [
                'name' => 'Sedan',
                'slug' => Str::slug('sedan'),
                'icon' => 'images/select-form/sedan.png',
                'description' => 'Loai xe ...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coupe',
                'slug' => Str::slug('coupe'),
                'icon' => 'images/select-form/coupe.png',
                'description' => 'Loai xe ...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //Cars
        DB::table('cars')->insert([
            [
                'license_plate' => '30A-11111',
                'model' => 'Audi A6',
                'slug' => Str::slug('audia6'),
                'price' => '120',
                'desposit' => '1000',
                'brand_id' => 1,
                'carType_id' => 1,
                'thumbnail' => 'images/cars/lexus.jpg',
                'fuelType' => 'Diozen',
                'transmission' => 'Auto',
                'km_limit' => '300',
                'modelYear' => '2022',
                'reverse_sensor' => '1',
                'airConditioner' => '0',
                'driverAirbag' => '0',
                'cDPlayer' => '1',
                'brakeAssist' => '1',
                'seats' => '5',
                'status' => '0',
                'description' => 'Mot loai xe sang rat dep ...',
                'rate' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'license_plate' => '29A-99999',
                'model' => 'BMW X6',
                'slug' => Str::slug('bmwx6'),
                'price' => '150',
                'desposit' => '1500',
                'brand_id' => 2,
                'carType_id' => 2,
                'thumbnail' => 'images/cars/bmw-m5.jpg',
                'fuelType' => 'Electri',
                'transmission' => 'Floor',
                'km_limit' => '200',
                'modelYear' => '2018',
                'reverse_sensor' => '1',
                'airConditioner' => '1',
                'driverAirbag' => '1',
                'cDPlayer' => '1',
                'brakeAssist' => '1',
                'seats' => '7',
                'status' => '0',
                'description' => 'Mot loai xe dien ...',
                'rate' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //gallery
        DB::table('gallery')->insert([
            [
                'thumbnail' => 'images/gallery/ferrari-1.jpg',
                'car_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'thumbnail' => 'images/gallery/ferrari-2.jpg',
                'car_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'thumbnail' => 'images/gallery/ferrari-3.jpg',
                'car_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'thumbnail' => 'images/gallery/ferrari-4.jpg',
                'car_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //car Review
//        DB::table('carReview')->insert([
//            [
//                'message' => 'Xe rat moi',
//                'score' => '4',
//                'user_id' => 1,
//                'car_id' => 1,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'message' => 'Xe rat moi',
//                'score' => '5',
//                'user_id' => 2,
//                'car_id' => 2,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//        ]);

        //rentalRate
        DB::table('rentalRate')->insert([
            [
                'car_id' => 1,
                'rental_type' => 'rent by day',
                'price' => '120',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => 1,
                'rental_type' => 'rent by hours',
                'price' => '12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => 2,
                'rental_type' => 'rent by day',
                'price' => '150',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => 2,
                'rental_type' => 'rent by hours',
                'price' => '15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //service
        DB::table('service')->insert([
            [
                'title' => 'Trang tri',
                'description' => 'Trang tri cho xe dam cuoi ...',
                'price' => '15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Goi dau',
                'description' => 'Tren xe trang bi san goi dau ...',
                'price' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
