<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    $role_inconnu = Role::where('niveau', 'name', 'inconnu')->first();
    $role_connecte = Role::where('niveau', 'name', 'connecte')->first();
    $role_moderateur = Role::where('niveau', 'name', 'moderateur')->first();
    $role_admin = Role::where('niveau', 'name', 'admin')->first();

    $inconnu = new User();
    $inconnu->name = 'Inconnu';
    $inconnu->email = 'inconnu@example.fr';
    $inconnu->password = bcrypt('secret');
    $inconnu->save();
    $inconnu->roles()->attach($role_inconnu);

    $connecte = new User();
    $connecte->name = 'Connecté';
    $connecte->email = 'connecte@example.fr';
    $connecte->password = bcrypt('secret');
    $connecte->save();
    $connecte->roles()->attach($role_connecte);

    $moderateur = new User();
    $moderateur->name = 'Modérateur';
    $moderateur->email = 'moderateur@example.fr';
    $moderateur->password = bcrypt('secret');
    $moderateur->save();
    $moderateur->roles()->attach($role_moderateur);

    $admin = new User();
    $admin->name = 'Admin';
    $admin->email = 'admin@example.fr';
    $admin->password = bcrypt('secret');
    $admin->save();
    $admin->roles()->attach($role_admin);
  }
}