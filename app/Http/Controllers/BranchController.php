<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:branch-list|branch-create|branch-edit|branch-delete', ['only' => ['index']]);
        $this->middleware('permission:branch-create', ['only' => ['create','store']]);
        $this->middleware('permission:branch-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:branch-delete', ['only' => ['delete']]);
    }
    public function index(Request $request){
        $pagesize = 5;
        $searchData = $request->except('page');

        if(count($request->all()) == 0){
            $branches = Branch::orderBy('id', 'desc')->paginate($pagesize);
        }else{
            $branches = Branch::where('name', 'like', "%" .$request->keyword . "%")
                                    ->orderBy('id', 'desc')
                                    ->paginate($pagesize)
                                    ->appends($searchData);
        }
        $branches->load('products');
        return view('admin.branches.index', compact('branches', 'searchData', 'pagesize'));
    }

    public function create(){
        return view('admin.branches.create');
    }

    public function store(Request $request){

        $request->validate(
            [
                'name'=>'required|unique:branches',
            ],
            [
                'name.required'=>'Mời điền tên thương hiệu',
                'name.unique'=>'Tên thương hiệu đã tồn tại'
            ]
        );
        $model = new Branch();

        $model->fill($request->all());
        $model->save();
        return redirect(route('admin.branches.index'))->with('message', 'Thêm thương hiệu thành công');
    }

    public function active($id){
        $branch = Branch::find($id);
        $message = '';
        if(!$branch){
            return redirect(route('admin.branches.index'));
        }
        if($branch->status){
            $branch->status = 0;
            $message = 'Hủy kich hoạt thành công!';
        }else{
            $branch->status = 1;
            $message = 'Kích hoạt thành công!';
        }
        $branch->save();
        return redirect(route('admin.branches.index'))->with('message', $message);
    }

    public function edit(Request $request, $id){
        $branch = Branch::find($request->id);
        if(!$branch){
            return redirect(route('admin.branches.index'));
        }
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request){
        $request->validate(
            ['name'=>'required'],
            ['name.required'=>'Mời điền tên thương hiệu']
        );
        $branch = Branch::find($request->id);
        if(!$branch){
            return redirect(route('admin.branches.index'));
        }
        $branch->fill($request->all());
        $branch->save();
        return redirect(route('admin.branches.index'))->with('message', 'Cập nhật thương hiệu thành công');
    }

    public function delete($id){
        $branch = Branch::find($id);
        if(!$branch){
            return redirect(route('admin.branches.index'));
        }
        $branch->products()->delete();
        $branch->delete();
        return redirect(route('admin.branches.index'))->with('message', 'Xóa thương hiệu thành công');
    }

    public function checkExist(Request $request)
    {
        $branch_name = Branch::all()->where('name', trim($request->name))->first();

        if ($branch_name || trim($request->name) == '') {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function checkName(Request $request){
        if (trim($request->name) == '') {
            echo "false";
        } else {
            echo "true";
        }
    }
}
