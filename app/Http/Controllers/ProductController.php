<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ProductPhoto;

class ProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(Request $request)
     {
        $data['products'] = Product::all();
        $data['types'] =  Type::all();
        $data['request'] = [];
         if ($request->type || $request->weight)
         {
            $query = Product::get();
            if ($request->type !== 'all')
            {
                $query = $query->where('type_id', $request->type);
            }

            if ($request->weight !== 'all')
            {
                $resut = explode("-", $request->weight);
                $query = $query->where('weight', '>=', (int)$resut[0]);
                $query = $query->where('weight', '<=', (int)$resut[1]);
            }

            if ($request->status !== 'all')
            {
                $query = $query->where('status', $request->status);
            }
            $data['request'] = $request;
            $data['products'] = $query;
         }

         return view('admin.product.index', $data);
     }

     public function add()
     {
        $data['types'] =  Type::all();
        return view('admin.product.add', $data);
     }

     public function save(Request $request)
     {
         $data = Product::create($request->all());
         return redirect()->route('admin.product');
     }

     public function detail($id)
     {
         $data['product'] = Product::find($id);
         return view('admin.product.detail', $data);
     }

     public function addPhoto(Request $request)
     {
        $file = $request->file('img');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $destination = 'storage/app';
        $file->move($destination,$filename);
        ProductPhoto::create([
            'product_id' => $request->product_id,
            'img_url' => $destination.'/'.$filename
        ]);
        return back();
     }
}
