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
            'f_name' => 'Kaushal',
            'l_name' => 'Wagle',
            'phone' => '963852741',
            'address' => 'Bhaktapur, Nepal',
            'gender' => 'M',
        	'email' => 'admin@docassist.com',
        	'password' => bcrypt('kaushal')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
