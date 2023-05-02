<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\User;
use App\Models\Group;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Rol::create(['name' => 'Admin']);
        Rol::create(['name' => 'Client']);

        // Creamos algunos usuarios
        $users = User::factory(100)->create();

        // Creamos algunos grupos
        $groups =  Group::factory(5)->create();

    
        // Asignamos cada usuario a un grupo al azar
        $users->each(function ($user) use ($groups) {
            $user->groups()->attach($groups->random());
            $user->save();
        });

        Event::factory(500)->create();

        User::factory()->create([ 'name' => 'Admin', 'email' => 'Admin@dayssist.com', 'password' => bcrypt('11dayssist11'), 
        'role_id' => Rol::where('name', 'admin')->first()->id]);
    }
}
