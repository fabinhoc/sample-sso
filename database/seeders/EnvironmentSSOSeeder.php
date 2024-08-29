<?php

namespace Database\Seeders;

use App\Enums\ApplicationStatus;
use App\Enums\TenantStatus;
use App\Models\Application;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EnvironmentSSOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = Tenant::create([
            'name' => 'SSO Tenant Environment',
            'status' => TenantStatus::ACTIVE,
        ]);

        $application = Application::create([
            'name' => 'SSO Environment',
            'url' => 'http://localhost',
            'callback_url' => 'http://localhost/auth/callback',
            'status' => ApplicationStatus::ACTIVE,
            'client_id' => 1,
            'client_secret' => Hash::make('password'), //password
            'tenant_id' => $tenant->id,
            'is_sso' => true,
        ]);

        $roleSuper = Role::create([
            'name' => 'Super user',
            'application_id' => $application->id,
            'description' => 'You have the ability to see all tenants and control everything.'
        ]);

        $roleAdmin = Role::create([
            'name' => 'Tenant admin',
            'application_id' => $application->id,
            'description' => 'You have the ability to see all tenants and control everything. You have the ability to see all users and control everything related to the tenant.'
        ]);

        $roleSupervisor = Role::create([
            'name' => 'Tenant supervisor',
            'application_id' => $application->id,
            'description' => 'You have the possibility to create new users and add permissions to the user, for the applications he is authorized to.'
        ]);

        $roleUser = Role::create([
            'name' => 'Tenant user',
            'application_id' => $application->id,
            'description' => 'It has the possibility of login, logout, email verification'
        ]);

        $user = User::create([
            'name'=> 'Fabio Cruz',
            'tenant_id'=> $tenant->id,
            'email' => 'fabio.cruz@gmail.com',
            'password' => Hash::make('password'), // password
            'avatar' => null,
        ]);
        $user->roles()->attach($roleSuper->id);
        $user->applications()->attach($application->id);

        $user = User::create([
            'name'=> 'Tenant admin',
            'tenant_id'=> $tenant->id,
            'email' => 'tenant.admin@gmail.com',
            'password' => Hash::make('password'), // password
            'avatar' => null,
        ]);
        $user->roles()->attach($roleAdmin->id);

        User::create([
            'name'=> 'Tenant supervisor',
            'tenant_id'=> $tenant->id,
            'email' => 'tenant.supervisor@gmail.com',
            'password' => Hash::make('password'), // password
            'avatar' => null,
        ]);
        $user->roles()->attach($roleSupervisor->id);
        $user->applications()->attach($application->id);

        User::create([
            'name'=> 'Tenant User',
            'tenant_id'=> $tenant->id,
            'email' => 'tenant.user@gmail.com',
            'password' => Hash::make('password'), // password
            'avatar' => null,
        ]);
        $user->roles()->attach($roleUser->id);
        $user->applications()->attach($application->id);
    }
}
