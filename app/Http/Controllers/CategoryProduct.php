<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {   
        $pagesize = 5;
        $searchData = $request->except('page');

        if(count($request->all()) == 0){
            $categories = Category::orderBy('id', 'desc')->paginate($pagesize);
        }else{
            $categories = Category::where('name', 'like', "%" .$request->keyword . "%")
                                    ->orderBy('id', 'desc')
                                    ->paginate($pagesize)
                                    ->appends($searchData);
        }
        $categories->load('products');
        return view('admin.categories.index', compact('categories', 'searchData', 'pagesize'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|unique:categories',
            ],
            [
                'name.required' => 'Mời điền tên danh mục',
                'name.unique' => 'Tên danh mục đã tồn tại',
            ]
        );
        $model = new Category();

        $model->fill($request->all());
        $model->save();
        return redirect(route('admin.categories.index'))->with('message', 'Thêm danh mục thành công');
    }

    public function active($id)
    {
        $cate = Category::find($id);
        $message = '';
        if (!$cate) {
            return redirect(route('admin.categories.index'));
        }
        if ($cate->status) {
            $cate->status = 0;
            $message = 'Hủy kich hoạt thành công!';
        } else {
            $cate->status = 1;
            $message = 'Kích hoạt thành công!';
        }
        $cate->save();
        return redirect(route('admin.categories.index'))->with('message', $message);
    }

    public function edit(Request $request, $id)
    {
        $cate = Category::find($request->id);
        if (!$cate) {
            return redirect(route('admin.categories.index'));
        }
        return view('admin.categories.edit', compact('cate'));
    }

    public function update(Request $request)
    {
        $request->validate(
            ['name' => 'required'],
            ['name.required' => 'Mời điền tên danh mục']
        );
        $cate = Category::find($request->id);
        if (!$cate) {
            return redirect(route('admin.categories.index'));
        }
        $cate->fill($request->all());
        $cate->save();
        return redirect(route('admin.categories.index'))->with('message', 'Cập nhật danh mục thành công');
    }

    public function delete($id)
    {
        $cate = Category::find($id);
        if (!$cate) {
            return redirect(route('admin.categories.index'));
        }
        $cate->products()->delete();
        $cate->delete();
        return redirect(route('admin.categories.index'))->with('message', 'Xóa danh mục thành công');
    }

    public function checkExist(Request $request)
    {
        $cate_name = Category::all()->where('name', trim($request->name))->first();

        if ($cate_name || trim($request->name) == '') {
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
