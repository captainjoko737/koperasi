<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'accounting',
            'email' => 'admin@accounting.com',
            'password' => bcrypt('a'),
            'ttl' => 'bandung, 12 Juli 1993',
            'jenis_kelamin' => 'laki-laki',
            'telepon' => '087722252312',
            'status_user' => 'accounting',
            'status' => 'aktif'
        ]);
    }
}
