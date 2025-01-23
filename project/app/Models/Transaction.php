<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = [
        'from_acc',
        'from_name',
        'to_acc',
        'to_name',
        'amount',
        'bank_name',
        'from_balance',
        'to_balance'
    ];

    public static function addtransaction($request)
    {
        Transaction::create([
            'from_acc' => $request['from_acc'],
            'from_name' => $request['from_name'],
            'to_acc' => $request['to_acc'],
            'to_name' => $request['to_name'],
            'amount' => $request['amount'],
            'bank_name' => $request['bank_name'],
            'from_balance' => $request['from_balance'],
            'to_balance' => $request['to_balance'],
        ]);
    }
    
    public static function user_transaction($id)
    {
        $ud = Transaction::orderBy('created_at', 'desc')
            ->where('from_acc', '=', $id)
            ->orWhere('to_acc', '=', $id)->paginate(4);
        return $ud;
    }
    public static function deleteTransaction($id)
    {
        Transaction::where('from_acc', '=', $id)
            ->orWhere('to_acc', '=', $id)
            ->delete();
        
    }

}

