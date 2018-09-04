<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Usuarios
      Permission::create([
        'name'=>'Navegar Usuarios',
        'slug'=>'usuarios.index',
        'description'=>'Lista y navega todos los usuarios del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle Usuarios',
        'slug'=>'usuarios.show',
        'description'=>'Ver en detalle cada usuario del sistema',
      ]);
      Permission::create([
        'name'=>'Editar Usuarios',
        'slug'=>'usuarios.edit',
        'description'=>'Editar usuarios del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar Usuarios',
        'slug'=>'usuarios.destroy',
        'description'=>'Eliminar usuarios del sistema',
      ]);

      //Roles
      Permission::create([
        'name'=>'Navegar roles',
        'slug'=>'roles.index',
        'description'=>'Lista y navega todos los roles del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle roles',
        'slug'=>'roles.show',
        'description'=>'Ver en detalle cada rol del sistema',
      ]);
      Permission::create([
        'name'=>'Crear roles',
        'slug'=>'roles.create',
        'description'=>'Crear roles del sistema',
      ]);
      Permission::create([
        'name'=>'Editar roles',
        'slug'=>'roles.edit',
        'description'=>'Editar roles del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar roles',
        'slug'=>'roles.destroy',
        'description'=>'Eliminar roles del sistema',
      ]);

      //Sucursales INICIO
      Permission::create([
        'name'=>'Navegar sucursales',
        'slug'=>'sucursales.index',
        'description'=>'Lista y navega todas las sucursales del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle sucursales',
        'slug'=>'sucursales.show',
        'description'=>'Ver en detalle cada sucursal del sistema',
      ]);
      Permission::create([
        'name'=>'Crear sucursales',
        'slug'=>'sucursales.create',
        'description'=>'Crear sucursales del sistema',
      ]);
      Permission::create([
        'name'=>'Editar sucursales',
        'slug'=>'sucursales.edit',
        'description'=>'Editar sucursales del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar sucursales',
        'slug'=>'sucursales.destroy',
        'description'=>'Eliminar sucursales del sistema',
      ]);
      //Sucursales FIN

      //Mesas INICIO
      Permission::create([
        'name'=>'Navegar mesas',
        'slug'=>'mesas.index',
        'description'=>'Lista y navega todas las mesas del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle mesas',
        'slug'=>'mesas.show',
        'description'=>'Ver en detalle cada mesa del sistema',
      ]);
      Permission::create([
        'name'=>'Crear mesas',
        'slug'=>'mesas.create',
        'description'=>'Crear mesas del sistema',
      ]);
      Permission::create([
        'name'=>'Editar mesas',
        'slug'=>'mesas.edit',
        'description'=>'Editar mesas del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar mesas',
        'slug'=>'mesas.destroy',
        'description'=>'Eliminar mesas del sistema',
      ]);
      //Mesas FIN

      //Meseros INICIO
      Permission::create([
        'name'=>'Navegar meseros',
        'slug'=>'meseros.index',
        'description'=>'Lista y navega todas las meseros del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle meseros',
        'slug'=>'meseros.show',
        'description'=>'Ver en detalle cada mesero del sistema',
      ]);
      Permission::create([
        'name'=>'Crear meseros',
        'slug'=>'meseros.create',
        'description'=>'Crear meseros del sistema',
      ]);
      Permission::create([
        'name'=>'Editar meseros',
        'slug'=>'meseros.edit',
        'description'=>'Editar meseros del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar meseros',
        'slug'=>'mesas.destroy',
        'description'=>'Eliminar meseros del sistema',
      ]);
      //Meseros FIN

      //Encuestas INICIO
      Permission::create([
        'name'=>'Navegar encuestas',
        'slug'=>'encuestas.index',
        'description'=>'Lista y navega todas las encuestas del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle encuestas',
        'slug'=>'encuestas.show',
        'description'=>'Ver en detalle cada encuesta del sistema',
      ]);
      Permission::create([
        'name'=>'Crear encuestas',
        'slug'=>'encuestas.create',
        'description'=>'Crear encuestas del sistema',
      ]);
      Permission::create([
        'name'=>'Editar encuestas',
        'slug'=>'encuestas.edit',
        'description'=>'Editar encuestas del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar encuestas',
        'slug'=>'encuestas.destroy',
        'description'=>'Eliminar encuestas del sistema',
      ]);
      //Encuestas FIN

      //Preguntas INICIO
      Permission::create([
        'name'=>'Navegar preguntas',
        'slug'=>'preguntas.index',
        'description'=>'Lista y navega todas las preguntas del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle preguntas',
        'slug'=>'preguntas.show',
        'description'=>'Ver en detalle cada pregunta del sistema',
      ]);
      Permission::create([
        'name'=>'Crear preguntas',
        'slug'=>'preguntas.create',
        'description'=>'Crear preguntas del sistema',
      ]);
      Permission::create([
        'name'=>'Editar preguntas',
        'slug'=>'preguntas.edit',
        'description'=>'Editar preguntas del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar preguntas',
        'slug'=>'preguntas.destroy',
        'description'=>'Eliminar preguntas del sistema',
      ]);
      //Preguntas FIN

      //Exclusivos INICIO
      Permission::create([
        'name'=>'Navegar exclusivos',
        'slug'=>'exclusivos.index',
        'description'=>'Lista y navega todas las exclusivos del sistema',
      ]);
      Permission::create([
        'name'=>'Ver detalle exclusivos',
        'slug'=>'exclusivos.show',
        'description'=>'Ver en detalle cada exclusivo del sistema',
      ]);
      Permission::create([
        'name'=>'Crear exclusivos',
        'slug'=>'exclusivos.create',
        'description'=>'Crear exclusivos del sistema',
      ]);
      Permission::create([
        'name'=>'Editar exclusivos',
        'slug'=>'exclusivos.edit',
        'description'=>'Editar exclusivos del sistema',
      ]);
      Permission::create([
        'name'=>'Eliminar exclusivos',
        'slug'=>'exclusivos.destroy',
        'description'=>'Eliminar exclusivos del sistema',
      ]);
      //Exclusivos FIN

      //Dashboard INICIO
      Permission::create([
        'name'=>'Navegar Panel',
        'slug'=>'home',
        'description'=>'Lista y navega el panel',
      ]);
      //Dashboard INICIO

      //Encuesta Captura
      Permission::create([
        'name'=>'Capturar Encuesta',
        'slug'=>'encuesta.index',
        'description'=>'Captura encuesta',
      ]);

      Permission::create([
        'name'=>'Guardar Encuesta',
        'slug'=>'encuesta.store',
        'description'=>'Guardar encuesta',
      ]);

    }
}
