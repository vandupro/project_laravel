<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $cates;
    public $branches;
    public function __construct()
    {
        $this->cates = Category::all();
        $this->branches = Branch::all();
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        $pagesize = 5;
        $cates = $this->cates;
        $branches = $this->branches;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            $products = Product::orderBy('id', 'desc')->paginate($pagesize);
        } else {
            $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%");
            if ($request->has('cate_id') && $request->cate_id != "") {
                $productQuery = $productQuery->where('cate_id', $request->cate_id);
            }
            if ($request->has('branch_id') && $request->branch_id != "") {
                $productQuery = $productQuery->where('branch_id', $request->branch_id);

            }
            if ($request->has('status') && $request->status != "all") {
                if ($request->status == 1) {
                    $productQuery = $productQuery->where('status', 1);
                } else if ($request->status == 2) {
                    $productQuery = $productQuery->where('status', 0);
                }
            }
            if ($request->has('order_by') && $request->order_by > 0) {
                if ($request->order_by == 1) {
                    $productQuery = $productQuery->orderBy('name');
                } else if ($request->order_by == 2) {
                    $productQuery = $productQuery->orderByDesc('name');
                } else if ($request->order_by == 3) {
                    $productQuery = $productQuery->orderBy('price');
                } else {
                    $productQuery = $productQuery->orderByDesc('price');
                }
            }

            $products = $productQuery->paginate($pagesize)->appends($searchData);
        }

        $products->load('category', 'branch');
        return view('admin.products.index', compact('products', 'pagesize', 'cates', 'branches', 'searchData'));
    }

    public function create()
    {
        $cates = $this->cates;
        $branches = $this->branches;
        return view('admin.products.create', compact('cates', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required|integer|min:1000',
                'image' => 'required|mimes:jpg,png,bmp',
            ],
            [
                'name.required' => 'M???i ??i???n t??n s???n ph???m',
                'name.unique' => 'T??n s???n ph???m ???? t???n t???i',
                'price.min' => 'Gi?? s???n ph???m ph???i l???n h??n 1000',
                'price.integer' => 'Gi?? s???n ph???m ph???i l?? s???',
                'price.required' => 'B???n ch??a ??i???n gi?? s???n ph???m',
                'image.required' => 'M???i nh???p ???nh s???n ph???m',
                'image.mimes' => '???nh ph???i l?? d???ng jpg, png, bmp',
            ]
        );
        if ($request->has('galleries')) {
            $request->validate(
                [
                    'galleries.*' => 'image|mimes:jpg,png,bmp',
                ],
                [
                    'galleries.mimes' => '???nh ph???i l?? d???ng jpg/png/bmp'
                ]
            );
        }
        $model = new Product();
        if ($request->hasFile('image')) {
            $imageImg = $request->file('image');
            $imageName = $imageImg->getClientOriginalName();
            $imageImg->storeAs('public/uploads/products', $imageName);
            $model->image = 'uploads/products/' . $imageName;
        }
        $model->fill($request->all());
        $model->save();

        //up load multiple related images
        if ($request->has('galleries')) {
            foreach ($request->galleries as $i => $item) {
                $galleryObj = new ProductGallery();
                $galleryObj->product_id = $model->id;
                $imageName = uniqid() . '-' . $item->getClientOriginalName();
                $item->storeAs('public/uploads/products/galleries/' . $model->id, $imageName);
                $galleryObj->image = 'uploads/products/galleries/' . $model->id . '/' . $imageName;
                $galleryObj->save();
            }
        }
        return redirect(route('admin.products.index'))->with('message', 'Th??m s???n ph???m th??nh c??ng');
    }

    public function active($id)
    {
        $product = Product::find($id);
        $message = '';
        if (!$product) {
            return redirect(route('admin.products.index'));
        }
        if ($product->status) {
            $product->status = 0;
            $message = 'H???y kich ho???t th??nh c??ng!';
        } else {
            $product->status = 1;
            $message = 'K??ch ho???t th??nh c??ng!';
        }
        $product->save();
        return redirect(route('admin.products.index'))->with('message', $message);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($request->id);
        $cates = $this->cates;
        $branches = $this->branches;
        if (!$product) {
            return redirect(route('admin.products.index'));
        }
        return view('admin.products.edit', compact('product', 'cates', 'branches'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required|integer|min:1000',
                'image' => 'mimes:jpg,png,bmp',
            ],
            [
                'name.required' => 'M???i ??i???n t??n s???n ph???m',
                'price.min' => 'Gi?? s???n ph???m ph???i l???n h??n 1000',
                'price.integer' => 'Gi?? s???n ph???m ph???i l?? s???',
                'price.required' => 'B???n ch??a ??i???n gi?? s???n ph???m',
                'image.mimes' => '???nh ph???i l?? d???ng jpg, png, bmp',
            ]
        );
        if ($request->has('galleries')) {
            $request->validate(
                [
                    'galleries.*' => 'image|mimes:jpg,png,bmp',
                ],
                [
                    'galleries.mimes' => '???nh ph???i l?? d???ng jpg/png/bmp'
                ]
            );
        }
        $model = Product::find($request->id);
        if ($request->hasFile('image')) {
            $imageImg = $request->file('image');
            $imageName = $imageImg->getClientOriginalName();

            $imageImg->storeAs('public/uploads/products', $imageName);
            $imagePath = public_path() . '/storage/' . $model->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $model->image = 'uploads/products/' . $imageName;
        }
        $model->fill($request->all());
        $model->save();

        // gallery
        // x??a gallery ??c mark l?? b??? x??a ??i
        if ($request->has('removeGalleryIds')) {
            $strIds = rtrim($request->removeGalleryIds, '|');
            $lstIds = explode('|', $strIds);
            // x??a c??c ???nh v???t l??
            $removeList = ProductGallery::whereIn('id', $lstIds)->get();
            foreach ($removeList as $gl) {
                $imagePath = public_path() . '/storage/' . $gl->image;
                if (File::exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            ProductGallery::destroy($lstIds);
        }

        //up load multiple related images
        if ($request->has('galleries')) {
            foreach ($request->galleries as $i => $item) {
                $galleryObj = new ProductGallery();
                $galleryObj->product_id = $model->id;
                $imageName = uniqid() . '-' . $item->getClientOriginalName();
                $item->storeAs('public/uploads/products/galleries/' . $model->id, $imageName);
                $galleryObj->image = 'uploads/products/galleries/' . $model->id . '/' . $imageName;
                $galleryObj->save();
            }
        }
        return redirect(route('admin.products.index'))->with('message', 'C???p nh???t s???n ph???m th??nh c??ng');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect(route('admin.products.index'));
        }
        // $imagePath = public_path().'/storage/'. $product->image;
        // if (File::exists($imagePath)) {
        //     unlink($imagePath);
        // }
        $product->delete();
        return redirect(route('admin.products.index'))->with('message', 'X??a s???n ph???m th??nh c??ng');
    }

    public function checkExist(Request $request)
    {
        $product_name = Product::all()->where('name', trim($request->name))->first();

        if ($product_name || trim($request->name) == '') {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function checkName(Request $request)
    {
        if (trim($request->name) == '') {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function uploads(Request $request){
        if ($request->hasFile('image')) {
            $imageImg = $request->file('image');
            $imageName = $imageImg->getClientOriginalName();
            $imageImg->storeAs('public/uploads/images', $imageName);
        }
    }
}
