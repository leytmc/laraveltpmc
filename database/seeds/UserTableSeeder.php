<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    $role_inconnu = Role::where('niveau', 'name', 'inconnu')->first();
    $role_connecte = Role::where('niveau', 'name', 'connecte')->first();
    $role_moderateur = Role::where('niveau', 'name', 'moderateur')->first();
    $role_admin = Role::where('niveau', 'name', 'admin')->first();

    $inconnu = new User();
    $inconnu->name = 'inconnu';
    $inconnu->email = 'inconnu@example.fr';
    $inconnu->password = bcrypt('secret');
    $inconnu->settings = '{"pagination" : 8}';
    $inconnu->save();
    $inconnu->roles()->attach($role_inconnu);

    $connecte = new User();
    $connecte->name = 'connecte';
    $connecte->email = 'connecte@example.fr';
    $connecte->password = bcrypt('secret');
    $connecte->settings = '{"pagination" : 8}';
    $connecte->save();
    $connecte->roles()->attach($role_connecte);

    $moderateur = new User();
    $moderateur->name = 'moderateur';
    $moderateur->email = 'moderateur@example.fr';
    $moderateur->password = bcrypt('secret');
    $moderateur->settings = '{"pagination" : 8}';
    $moderateur->save();
    $moderateur->roles()->attach($role_moderateur);

    $admin = new User();
    $admin->name = 'admin';
    $admin->email = 'admin@example.fr';
    $admin->password = bcrypt('secret');
    $admin->settings = '{"pagination" : 8}';
    $admin->save();
    $admin->roles()->attach($role_admin);
  }
}