<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Thêm quyền cho bảng permission
        DB::table('permissions')->insert(
            [
                'name' => 'permissions_view',
                'label' => 'Xem danh sách permissions'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'permissions_create',
                'label' => 'Thêm mới permissions'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'permissions_edit',
                'label' => 'Chỉnh sửa permissions'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'permissions_delete',
                'label' => 'Xóa permissions'
            ]
        );

        //Thêm quyền cho bảng users
        DB::table('permissions')->insert(
            [
                'name' => 'users_view',
                'label' => 'Xem danh sách users'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'users_create',
                'label' => 'Thêm mới users'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'users_edit',
                'label' => 'Chỉnh sửa users'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'users_delete',
                'label' => 'Xóa users'
            ]
        );

        //Thêm quyền cho bảng role
        DB::table('permissions')->insert(
            [
                'name' => 'roles_view',
                'label' => 'Xem danh sách roles'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'roles_create',
                'label' => 'Thêm mới roles'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'roles_edit',
                'label' => 'Chỉnh sửa roles'
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => 'roles_delete',
                'label' => 'Xóa roles'
            ]
        );

        //Thêm mới role Administrator
        DB::table('roles')->insert(
            [
                'name' => 'administrator',
                'label' => 'Quản trị viên'
            ]
        );

        //Gắn quyền cho user admin đã tạo trước đó
        DB::table('role_user')->insert(
            [
                'role_id' => 1,
                'user_id' => 1
            ]
        );

    }
}
