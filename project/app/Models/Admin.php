<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = "admin";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static function viewAdmin()
    {
        return Admin::where('name', '!=', 'Fahmitha')->get();
    }

    public static function add(): void
    {
        Admin::create([
            'name' => 'Fahmitha',
            'email' => 'fahmitha@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }

    public static function addAdmin(array $request): void
    {
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    }

    public static function editAdmin(int $id): ?Admin
    {
        return Admin::where('id', $id)->first();
    }

    public static function updateAdmin(int $id, array $data): void
    {
        Admin::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public static function deleteAdmin(int $id): void
    {
        Admin::where('id', $id)->delete();
    }

    public static function adminDashboard(int $id): ?Admin
    {
        return Admin::where('id', $id)->first();
    }
}
