<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //role
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            //patient
            'patient-list',
            'patient-create',
            'patient-edit',
            'patient-delete',

            //doctor
            'doctor-list',
            'doctor-create',
            'doctor-edit',
            'doctor-delete',

            //lab_report
            'lab_report-list',
            'lab_report-create',
            'lab_report-edit',
            'lab_report-delete',

            //prescription
            'prescription-list',
            'prescription-create',
            'prescription-edit',
            'prescription-delete',

         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
