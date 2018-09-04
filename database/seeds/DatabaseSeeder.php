<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'marcosa31@gmail.com',
            'password' => '$2y$10$GMGujS4dm7jnc7usKy3dpuKB90F8kKCA6Ts8/mHjRgkN5MORMlHWq', // asd123
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Mesero',
            'email' => 'mesero@mesero.com',
            'password' => '$2y$10$RNUkzPi.0bBzbeqvRwG17.GpzPGvWwIAhxsaP6OIx6qpzdrqKTbvS', // asd123
            'remember_token' => str_random(10),
        ]);

        DB::table('facilities')->insert([
          'name' => 'Demo v1',
          'status' => 1,
          'type' => 2,
          'address' => 'Calle demo 432, Colonia La demostracion, Ciudad Demo',
          'created_by' => 1,
        ]);

        DB::table('questions')->insert([
          'description' => '¿Como fue el trato del mesero?',
          'category' => 1,
          'control' => 1,
          'status' => 1,
          'created_by' => 1,
        ]);

        DB::table('questions')->insert([
          'description' => '¿Como fue el trato del mesero?',
          'category' => 2,
          'control' => 2,
          'status' => 1,
          'created_by' => 1,
        ]);

        DB::table('questions')->insert([
          'description' => '¿Como fue el trato del mesero?',
          'category' => 3,
          'control' => 3,
          'status' => 1,
          'created_by' => 1,
        ]);

        DB::table('questions')->insert([
          'description' => '¿Como fue el trato del mesero?',
          'category' => 4,
          'control' => 4,
          'status' => 1,
          'created_by' => 1,
        ]);

        DB::table('polls')->insert([
          'name' => 'Demo Encuesta',
          'poll_type' => 1,
          'id_facility' => 1,
          'status' => 1,
          'created_by' => 1,
          'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('tables')->insert([
          'table_number' => '1',
          'capacity' => 4,
          'location' => 'Norte',
          'id_facility' => 1,
          'status' => 1,
          'created_by' => 1,
        ]);

        DB::table('waiters')->insert([
          'user_id' => 2,
          'table_number' => 1,
          'employee_number' => '300',
          'status' => 1,
          'created_by' => 1,
        ]);

        DB::table('exclusives')->insert([
          'name' => 'Descuento v1',
          'category' => 1,
          'description' => 'Descuento por consumo',
          'status' => 1,
          'start' => '2018-08-31 00:00:00',
          'end' => '2018-09-30 00:00:00',
          'amount' => '200',
          'amount_type' => 1,
          'availability' => '10',
          'created_by' => 1,
        ]);

        // $this->call(UsersTableSeeder::class);
        DB::table('p_categories')->insert([
            'name' => 'General',
        ]);

        DB::table('p_categories')->insert([
            'name' => 'Calidad',
        ]);

        DB::table('p_categories')->insert([
            'name' => 'Limpieza',
        ]);

        DB::table('p_categories')->insert([
            'name' => 'Servicio',
        ]);

        /*************  facility_type   *****************/
        DB::table('facility_types')->insert([
            'name' => 'Domicilio',
        ]);

        DB::table('facility_types')->insert([
            'name' => 'Sucursal',
        ]);
        /*************  facility_type end  *****************/

        /*************   poll question type  *****************/
        DB::table('p_q_categories')->insert([
            'name' => 'General',
        ]);

        DB::table('p_q_categories')->insert([
            'name' => 'Calidad',
        ]);

        DB::table('p_q_categories')->insert([
            'name' => 'Limpieza',
        ]);

        DB::table('p_q_categories')->insert([
            'name' => 'Servicio',
        ]);
        /*************  poll question end  *****************/

        /*************  Question Control type  *****************/
        DB::table('q_control_types')->insert([
            'name' => 'Abierta',
        ]);

        DB::table('q_control_types')->insert([
            'name' => 'Emoticonos',
        ]);

        DB::table('q_control_types')->insert([
            'name' => 'Rating',
        ]);

        DB::table('q_control_types')->insert([
            'name' => 'RadioButton',
        ]);
        /************* Question Control end  *****************/

        /*************  Exclusive type  *****************/
        DB::table('exclusive_types')->insert([
            'name' => 'Descuento',
        ]);

        DB::table('exclusive_types')->insert([
            'name' => 'Promocion',
        ]);
        /************* Exclusive type end  *****************/

        /*************  Exclusive Amount type  *****************/
        DB::table('ex_amount_types')->insert([
            'name' => 'Pesos',
        ]);

        DB::table('ex_amount_types')->insert([
            'name' => 'Porcentaje',
        ]);
        /************* Exclusive type end  *****************/
        $this->call(PermissionsTableSeeder::class);


        Role::create([
            'name'    => 'Admin',
            'slug'    => 'admin',
            'special' => 'all-access',
            'description' => 'Acceso sin restricciones al sistema'
        ]);

        Role::create([
            'name'    => 'Mesero',
            'slug'    => 'mesero',
            'description' => 'Captura de encuestas'
        ]);
    }
}
