<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'f_name' => 'Smart',
            'l_name' => 'Admin',
            'phone' => '963852741',
            'address' => 'Bhaktapur, Nepal',
            'gender' => 'M',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('Admin')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $user = User::create([
            'f_name' => 'Wise',
            'l_name' => 'Doctor',
            'phone' => '963852741',
            'address' => 'Bhaktapur, Nepal',
            'gender' => 'F',
        	'email' => 'doctor@gmail.com',
        	'password' => bcrypt('Doctor')
        ]);

        $role = Role::create(['name' => 'Doctor']);
        $user->assignRole([$role->id]);
    }
}
