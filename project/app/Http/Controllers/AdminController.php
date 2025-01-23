<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function add_admin()
    {
        $admin_add['url'] = url('/admin_check');
        $admin_add['name'] = '';
        $admin_add['email'] = '';
        $admin_add['password'] = '';
        $admin_add['button_text'] = 'Add Admin';
        $admin_add['heading'] = 'Add Admin';
        return view('admin/addadmin', $admin_add);
    }
    public function admin_check(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin_add = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        Admin::addAdmin(request: $admin_add);
        return redirect(to: 'viewAdmin')->with([
            'message' => 'Admin added successfully',
            'status' => 'success'
        ]);
    }

    public function admin_login()
    {
        if(Auth::guard('admin')->check()){
            return redirect('admin_dashboard');
        }

        $data['url'] = url('/admin_logincheck');
        $data['name'] = '';
        $data['email'] = '';
        $data['password'] = '';
        $data['button_text'] = 'Login';
        return view('admin/adminlogin', $data);
    }
    public function admin_logincheck(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (Auth::guard('admin')->attempt($data)) {
            $request->session()->regenerate();
            return redirect('admin_dashboard');
        } else {
            return back()->with('error', 'Wrong Login Details')->withInput();
        }
    } 

    public function admin_dashboard() 
    {
        $id = Auth::guard('admin')->id();
        $admin_data = Admin::adminDashboard($id);
    
        $data['id'] = Auth::guard('admin')->id();
        $data['name'] = $admin_data->name;
        $data['email'] = $admin_data->email; 
        $data['user_count'] = User::get()->count();
        $data['admin_count'] = Admin::get()->count()-1;

        return view('admin.admindashboard', $data)->with(compact('data'));
    }
     public function view_admin()
    {
        $ad = Admin::viewAdmin();
        return view('admin/Viewadmin', $ad)->with(compact('ad'));
    }

    public function editadmin($id)
    {
        $emp = Admin::editAdmin($id);
        $data = array(
            'name' => $emp->name,
            'email' => $emp->email,
            'password' => "",
        );
        $data['url'] = url('editadmin/' . $id);
        $data['button_text'] = 'Update';
        $data['heading'] = 'Update Admin';
        return view('admin/addadmin', $data);
    }
     public function editadmin_data(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        );
        Admin::updateAdmin($id,$data);
        return redirect('viewAdmin')->with([
            'message' => 'Admin updated successfully',
            'status' => 'success'
        ]);
    }

    public function deleteadmin($id)
    {
        Admin::deleteAdmin($id);
        return redirect('viewAdmin')->with([
            'message' => 'Admin deleted successfully',
            'status' => 'success'
        ]);
    }
    
    function admin_logout(Request $request) {
        
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
