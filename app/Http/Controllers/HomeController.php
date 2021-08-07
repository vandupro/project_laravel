<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   
    public $cates;
    public $branches;
    public function __construct()
    {
        $this->cates = Category::with('products')->where('status', 1)->orderBy('id', 'desc')->get();
        $this->branches = Branch::with('products')->where('status', 1)->orderBy('id', 'desc')->get();
    }
    public function index(){
        $cates = $this->cates;
        $branches = $this->branches;

        $products = Product::with('category')->where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        return view('pages.home', compact('cates', 'branches', 'products'));
    }

    public function getCate($id){
        $cates = $this->cates;
        $branches = $this->branches;
        $categoryName = Category::find($id);

        $products = Product::with('category')->where('cate_id', $id)->orderBy('id', 'desc')->paginate(6);
        return view('pages.categories.show_product', compact('cates', 'branches', 'products', 'categoryName'));
    }

    public function getBranch($id){
        $cates = $this->cates;
        $branches = $this->branches;
        $branchName = Branch::find($id);

        $products = Product::with('branch')->where('branch_id', $id)->orderBy('id', 'desc')->paginate(6);
        return view('pages.branches.show_product', compact('cates', 'branches', 'products', 'branchName'));
    }

    public function getDetail($id){
        $cates = $this->cates;
        $branches = $this->branches;
        $product = Product::with(['branch', 'category'])->find($id);
        $product_relates = Product::with(['branch', 'category'])->where('status' , 1)
                                                                ->where('cate_id', $product->cate_id)
                                                                ->where('id', '!=', $id)
                                                                ->limit(6)->get();
        return view('pages.products.show_detail', compact('cates', 'branches', 'product', 'product_relates'));
    }

    public function search(Request $request){
        $pagesize = 6;
        $searchData = $request->except('page');
        $products = DB::table('products')->where('name', 'like', '%'. $request->keyword . '%')
                    ->paginate($pagesize)
                    ->appends($searchData);
        $cates = $this->cates;
        $branches = $this->branches;
        $keyword = $request->keyword;
        return view('pages.products.search', compact('products', 'cates', 'branches', 'keyword'));

    }

    

}