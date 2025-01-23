<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $table = 'user';
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'password',
        'account_no',
        'phone',
        'balance'
    ];
    public static function viewUser()
    {
        $data = User::paginate(4); 
        return $data;
    }

    public static function addUser($request)
    {
        User::create([
            'customer_id' => $request['customer_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'account_no' => $request['account_no'],
            'phone' => $request['phone'],
            'balance' => $request['balance'],
        ]);
    }
    public static function editUser($id)
    {
        $emp = User::where('id', $id)->first();
        return $emp;
    }
    public static function updateUser($id, $data)
    {
        User::where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
        ]);
    }
    public static function deleteUser($id)
    {
        User::where('id', '=', $id)->delete();
    }

    public static function userDashboard($id)
    {
        $a = User::where('id', $id)->first();
        return $a;
    }

    public static function userDetails($to)
    {
        $ud = User::where('account_no', $to)->first();
        return $ud;
    }
    public static function duplicate($cus_id)
    {
        $d = User::where('customer_id', $cus_id)->first();
        return $d;
    }
    public static function email_duplicate( $email_id)
    {
        $d = User::Where('email', '=', $email_id)->first();
        return $d;
    }
    public static function balance_update($id, $amount)
    {
        User::where('customer_id', $id)->update([
            'balance' => $amount
        ]);
    }
}

