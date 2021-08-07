<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function adminLogin()
    {
        return view('admin_login');
    }

    public function index(Request $request)
    {
        $pagesize = 5;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            $users = User::orderBy('id', 'desc')->paginate($pagesize);
        } else {
            $users = User::where('name', 'like', "%" . $request->keyword . "%")
                ->orderBy('id', 'desc')
                ->paginate($pagesize)
                ->appends($searchData);
        }
        return view('admin.users.index', compact('users', 'searchData', 'pagesize'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('admin.users.create',compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
            ],
            [
                'name.required' => 'Mời điền họ tên',
                'email.required' => 'Mời điền email',
                'password.required' => 'Mời điền mật khẩu',
                'phone.required' => 'Mời điền số điện thoại',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
                'phone.regex' => 'Số điện thoại không đúng định dạng',
            ]
        );
        $model = new User();
        $model->fill($request->all());
        $model->password = Hash::make($request->password);
        $model->save();
        $model->assignRole($request->input('roles'));
        return redirect(route('admin.users.index'))->with('message', 'Thêm quản trị thành công');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect(route('admin.users.index'));
        }
        $roles = Role::pluck('name')->all();
        $userRole = $user->roles->pluck('name')->all();
        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
            ],
            [
                'name.required' => 'Mời điền họ tên',
                'email.required' => 'Mời điền email',
                'phone.required' => 'Mời điền số điện thoại',
                'email.email' => 'Email không đúng định dạng',
                'phone.regex' => 'Số điện thoại không đúng định dạng',
            ]
        );
        $model = User::find($request->id);
        if (!$model) {
            return redirect(route('admin.users.index'));
        }

        $model->fill($request->all());
        $model->save();

        DB::table('model_has_roles')->where('model_id',$request->id)->delete();
    
        $model->assignRole($request->input('roles'));
        return redirect(route('admin.users.index'))->with('message', 'Cập nhật thông tin quản trị thành công');
    }

    public function delete($id)
    {
        $model = User::find($id);
        if (!$model) {
            return redirect(route('admin.users.index'));
        }
        $model->delete();
        return redirect(route('admin.users.index'))->with('message', 'Xóa quản trị viên thành công');
    }

    public function changePassword_view()
    {
        return view('admin.users.change_password');
    }

    public function changePassword(Request $request)
    {   
        $request->validate(
            [
                'pass_new'=>'required|min:6',
                'pass_old'=>'required|min:6',
            ],
            [
                'pass_new.required'=>"Mời nhập mật khẩu mới",
                'pass_old.required'=>"Mời nhập mật khẩu cũ",
                'pass_new.min'=>"Mật khẩu phải có ít nhất 6 ký tự",
                'pass_old.min'=>"Mật khẩu phải có ít nhất 6 ký tự",
            ]
        );
        $user = User::find(Auth::user()->id);
        if(!Hash::check($request->pass_old, $user->password)){
            return back()->with('message','Mật khẩu cũ không chính xác');
        }        
        $user->password = Hash::make($request->pass_new);
        $user->save();
        return $this->logout();
    }
    public function login(Request $request)
    {   
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => "Hãy nhập tài khoản",
                'email.email' => "Không đúng định dạng email",
                'password.required' => "Hãy nhập mật khẩu"
            ]
        );
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])
            || Auth::attempt(['phone_number' => $request->email, 'password' => $request->password])){
            
            return redirect(route('admin.dashboard'));
        }

        return redirect()->back()->with('message', "Sai thông tin đăng nhập");
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('admin-login'));
    }
}
