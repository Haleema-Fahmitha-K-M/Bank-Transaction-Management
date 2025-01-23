<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Transaction;

class UserController extends Controller
{
    public function add_user()
    {
        $user_add['url'] = url('/user_check');
        $user_add['customer_id'] = '';
        $user_add['name'] = '';
        $user_add['email'] = '';
        $user_add['password'] = '';
        $user_add['account_no'] = '';
        $user_add['phone'] = '';
        $user_add['balance'] = '';
        $user_add['button_text'] = 'Add User';
        $user_add['heading'] = 'Add User';
        return view('admin/adduser', $user_add);
    }
    public function user_check(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'account_no' => 'required',
            'phone' => 'required',
            'balance' => 'required',
        ]);
        $cus_id = $request->get('customer_id');
        $id_dup = User::duplicate($cus_id);
        if (!$id_dup == '') {
            return back()->with('error', 'Customer Id already exists')->withInput();
        }

        $email_id = $request->get('email');
        $email_dup = User::email_duplicate($email_id);

        if (!$email_dup == '') {
            return back()->with('error', 'Email Id already exists')->withInput();
        }

        $user_add = array(
            'customer_id' => $request->get('customer_id'),
            'from_name' => $request->get('name'),
            'to_name' => 'Initial Deposite',
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'account_no' => $request->get('account_no'),
            'phone' => $request->get('phone'),
            'balance' => $request->get('balance'),
            'from_acc' => $request->get('customer_id'),
            'to_acc' => $request->get('customer_id'),
            'amount' => $request->get('balance'),
            'bank_name' => 'MyBank',
            'from_balance' => $request->get('balance'),
            'to_balance' => $request->get('balance'),
        );

        User::adduser($user_add);
        Transaction::addtransaction($user_add);

        return redirect('viewUser')->with([
            'message' => 'User added successfully',
            'status' => 'success'
        ]);
    }

    public function user_login()
    {
        if (Auth::guard('web')->check()) {
            return redirect('user_dashboard');
        }

        $data['url'] = url('/user_logincheck');
        $data['customer_id'] = '';
        $data['password'] = '';
        $data['button_text'] = 'Login';
        return view('user/userlogin', $data);

    }
    public function user_logincheck(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'password' => 'required',
        ]);
        $data = array(
            'customer_id' => $request->get('customer_id'),
            'password' => $request->get('password'),
        );

        if (Auth::guard('web')->attempt($data)) {
            $request->session()->regenerate();
            return redirect('user_dashboard');
        } else {
            return back()->with('error', 'Wrong Login Details')->withInput();
        }
    }
    public function user_dashboard()
    {
        $id = Auth::guard('web')->id();
        $user_data = User::userDashboard($id);

        $data['id'] = Auth::guard('web')->id();

        $data['customer_id'] = $user_data->customer_id;
        $data['name'] = $user_data->name;
        $data['email'] = $user_data->email;
        $data['account_no'] = $user_data->account_no;
        $data['phone'] = $user_data->phone;
        $data['balance'] = $user_data->balance;

        return view('user/userdashboard', $data)->with(compact('data'));
    }
    public function view_user()
    {
        $us = User::viewUser();
        return view('admin/viewuser', $us)->with(compact('us'));
    }

    public function edituser($id)
    {
        $emp = User::editUser($id);
        $data = array(
            'customer_id' => $emp->customer_id,
            'name' => $emp->name,
            'email' => $emp->email,
            'password' => '',
            'account_no' => $emp->account_no,
            'phone' => $emp->phone,
            'balance' => $emp->balance,
        );
        $data['url'] = url('edituser/' . $id);
        $data['button_text'] = 'Update';
        $data['heading'] = 'Update User';
        return view('admin/adduser', $data);
    }

    public function edituser_data(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);
        $data = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'phone' => $request->get('phone'),
        );
        User::updateUser($id, $data);

        return redirect('viewUser')->with([
            'message' => 'User updated successfully',
            'status' => 'success'
        ]);
    }
    
    public function deleteuser($id)
    {
        $emp = User::editUser($id);
        $cus_id = $emp->customer_id;
        User::deleteUser($id);
        Transaction::deleteTransaction($cus_id);
        return redirect('viewUser')->with([
            'message' => 'User deleted successfully',
            'status' => 'success'
        ]);
    }

    public function User_logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/user_login');
    }

    public function pay()
    {
        $id = Auth::guard('web')->id();
        $user_data = User::userDashboard($id);

        $pay['url'] = url('/pay_check');
        $pay['from_acc'] = $user_data->customer_id;
        $pay['from_name'] = $user_data->name;
        $pay['balance'] = $user_data->balance;
        $pay['to_acc'] = '';
        $pay['to_name'] = '';
        $pay['bank_name'] = '';
        $pay['amount'] = '';
        return view('user/payment', $pay);
    }

    public function pay_check(Request $request)
    {
        $request->validate([
            'from_acc' => 'required',
            'from_name' => 'required',
            'balance' => 'required',
            'to_acc' => 'required',
            'to_name' => 'required',
            'bank_name' => 'required',
            'amount' => 'required',
        ]);
        $old_balance = $request->get('balance');
        $pay_amount = $request->get('amount');
        $to = $request->get('to_acc');
        $from = $request->get('from_acc');

        if ($from == $to) {
            return back()->with('error', 'Please enter the recipient account number')->withInput();
        }
        if ($old_balance < $pay_amount) {
            return back()->with('error', 'Your account balance is not sufficient')->withInput();
        } else {
            $new_balance = $old_balance - $pay_amount;
        }

        $payer = User::userDetails($to);
        if ($payer == '') {
            return back()->with('error', 'Recipient doesn\'t exists. Please, Recheck account number')->withInput();
        } else {

            $to_balance = $payer->balance;
            $added_balance = $to_balance + $pay_amount;

            User::balance_update($to, $added_balance);

            $trans = array(
                'from_acc' => $request->get('from_acc'),
                'from_name' => $request->get('from_name'),
                'to_acc' => $payer->customer_id,
                'to_name' => $payer->name,
                'bank_name' => $request->get('bank_name'),
                'amount' => $request->get('amount'),
                'from_balance' => $new_balance,
                'to_balance' => $added_balance,
            );
            Transaction::addtransaction($trans);
            User::balance_update($from, $new_balance);
        }

        return redirect('/view_transaction')->with([
            'message' => 'Transaction completed successfully',
        ]);
    }

    public function all_transaction()
    {
        $data = Transaction::orderBy('created_at','desc')->paginate(4);
        return view('admin.transaction', compact('data'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query', '');

        $data = Transaction::orderby('created_at', 'desc')->where('from_name', 'like',$query . '%')
            ->paginate(4);

        return response()->json([
            'table' => view('partials.transactionPagination', compact('data'))->render(),
            'pagination' => (string) $data->appends(['query' => $query])->links('pagination::bootstrap-4')
        ]);
    }
    public function view_transaction(Request $request)
    {
        $id = Auth::guard('web')->id();
        $user_data = User::userDashboard($id);
        $cus_id = $user_data->customer_id;
        $ut = Transaction::user_transaction($cus_id);
    
        if ($request->ajax()) {
            return view('partials.userTransaction', compact('ut'))->render();
        }
    
        return view('user.viewtransaction', compact('ut'));
    }
}
