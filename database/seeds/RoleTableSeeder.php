<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $role_inconnu = new Role();
    $role_inconnu->niveau = 0;
    $role_inconnu->name = 'Inconnu';
    $role_inconnu->description = 'Utilisateur non connecté';
    $role_inconnu->save();

    $role_connecte = new Role();
    $role_connecte->niveau = 1;
    $role_connecte->name = 'Connecté';
    $role_connecte->description = 'Utilisateur connecté';
    $role_connecte->save();

    $role_moderateur = new Role();
    $role_moderateur->niveau = 2;
    $role_moderateur->name = 'Modérateur';
    $role_moderateur->description = 'Régulateur du site';
    $role_moderateur->save();

    $role_admin = new Role();
    $role_admin->niveau = 3;
    $role_admin->name = 'Admin';
    $role_admin->description = 'Gérant du site';
    $role_admin->save();

  }
}