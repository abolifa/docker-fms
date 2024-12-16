<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456'),
        ]);


        DB::table('maintenance_types')->insert([
            ['name' => 'زيت محرك', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'فلتر زيت', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'فلتر هواء', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'عجلات', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'بطارية', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'فلتر وقود', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'فرامل', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'شماعي', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'صيانة مكيف', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'صيانة صالة', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'صيانة محرك', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'صيانة كمبيو', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'زيت كمبيو', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ميكانيكا', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'كهرباء', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'سمكرة', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'غير ذلك', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
