<?php
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
class PermissionTableSeeder extends Seeder
{   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
       $permissions = [
        
        'role list',
        'role create',
        'role edit',
        'role delete',
        'user list',
        'user create',
        'user edit',
        'user delete'
       ];
     // create roles and assign existing permissions
     $role1 = Role::create(['name' => 'writer']);
     $role1->givePermissionTo('permission list');
     $role1->givePermissionTo('role list');
     $role1->givePermissionTo('user list');
     $role2 = Role::create(['name' => 'admin']);
     foreach ($permissions as $permission) {
         $role2->givePermissionTo($permission);
     }
     $role3 = Role::create(['name' => 'super-admin']);
     // gets all permissions via Gate::before rule; see AuthServiceProvider
     // create demo users
     $user = \App\Models\User::factory()->create([
         'name' => 'Super Admin',
         'email' => 'superadmin@example.com',
     ]);
     $user->assignRole($role3);
     $user = \App\Models\User::factory()->create([
         'name' => 'Admin User',
         'email' => 'admin@example.com',
     ]);
     $user->assignRole($role2);
     $user = \App\Models\User::factory()->create([
         'name' => 'Example User',
         'email' => 'test@example.com',
     ]);
     $user->assignRole($role1);
   }
}