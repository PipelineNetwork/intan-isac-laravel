<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
                // Reset cached roles and permissions
                app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

                //permissions
                //dahsboard
                Permission::create(['name' => 'dashboard']); //05
                //profil
                Permission::create(['name' => 'profil']); //all
                //pentadbiran pengguna
                Permission::create(['name' => 'kebenaran pengguna']); //01
                Permission::create(['name' => 'pengurusan pengguna']); //01
                //jadual
                Permission::create(['name' => 'pengurusan jadual']); //01 02
                //permohonan penilaian
                Permission::create(['name' => 'senarai permohonan']); // all
                Permission::create(['name' => 'daftar permohonan']); // 03 05
                Permission::create(['name' => 'senarai rayuan blacklist']); //01 02
                //pengurusan penilaian
                Permission::create(['name' => 'pemilihan soalan']); //01 02
                Permission::create(['name' => 'slip']); //01 02 03 05
                Permission::create(['name' => 'sijil']); //01 02 05
                Permission::create(['name' => 'semakan jawapan']); //01 02
                //penilaian
                Permission::create(['name' => 'jawab penilaian']); //05
                Permission::create(['name' => 'pemantauan penilaian']); //04
                Permission::create(['name' => 'semakan keputusan']); //05
                //bank soalan
                Permission::create(['name' => 'bank soalan']); //01 02
                //aduan rayuan
                Permission::create(['name' => 'hantar aduan']); //05
                Permission::create(['name' => 'hantar rayuan']); //05
                Permission::create(['name' => 'balas aduan']); //01 02
                Permission::create(['name' => 'balas rayuan']); // 01 02
                //laporan
                Permission::create(['name' => 'laporan']); //01 02
                //kawalan sistem
                Permission::create(['name' => 'kawalan sistem']); //01

                //roles
                //pentadbir sistem 01
                Role::create(['name' => 'pentadbir sistem'])->givePermissionTo([
                        'dashboard',
                        'profil',
                        'kebenaran pengguna',
                        'pengurusan pengguna',
                        'pengurusan jadual',
                        'senarai permohonan',
                        'senarai rayuan blacklist',
                        'pemilihan soalan',
                        'slip',
                        'sijil',
                        'semakan jawapan',
                        'bank soalan',
                        'balas aduan',
                        'balas rayuan',
                        'laporan',
                        'kawalan sistem'
                ]);
                //pentadbir penilaian 02
                Role::create(['name' => 'pentadbir penilaian'])->givePermissionTo([
                        'dashboard',
                        'profil',
                        'pengurusan pengguna',
                        'pengurusan jadual',
                        'senarai permohonan',
                        'senarai rayuan blacklist',
                        'pemilihan soalan',
                        'slip',
                        'sijil',
                        'semakan jawapan',
                        'bank soalan',
                        'balas aduan',
                        'balas rayuan',
                        'laporan'
                ]);
                //penyelaras 03
                Role::create(['name' => 'penyelaras'])->givePermissionTo([
                        'dashboard',
                        'profil',
                        'senarai permohonan',
                        'daftar permohonan',
                        'senarai rayuan blacklist',
                        'slip',
                ]);
                //pengawas 04
                Role::create(['name' => 'pengawas'])->givePermissionTo([
                        'dashboard',
                        'profil',
                        'pemantauan penilaian'

                ]);
                //calon 05
                Role::create(['name' => 'calon'])->givePermissionTo([
                        'dashboard',
                        'profil',
                        'senarai permohonan',
                        'daftar permohonan',
                        // 'slip',
                        // 'sijil',
                        'jawab penilaian',
                        'semakan keputusan',
                        'hantar aduan',
                        'hantar rayuan'
                ]);
                //pegawai korporat 06
                Role::create(['name' => 'pegawai korporat'])->givePermissionTo([
                        'dashboard',
                        'profil',
                        'laporan'
                ]);
        }
}
