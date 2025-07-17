<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Lang;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        $catalog = Catalog::all();
        return view('app.products.index', compact([
            'products',
            'catalog'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        $catalog = Catalog::all();
        return view('app.products.create', compact([
            'languages',
            'catalog'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title.ru' => 'required',
            'desc.ru' => 'required',
            'catalog' => 'required|numeric',
            'vendor_code' => 'required',
            'img' => 'required',
            'order' => 'required|numeric',
        ]);

        $data = $request->all();

        try {
            DB::beginTransaction();

            $product = new Product;

            $product->title = $data['title'];
            $product->desc = $data['desc'];
            $product->catalog_id = intval($data['catalog']);
            $product->vendor_code = $data['vendor_code'];

            // Category id va order ni birlashtirish: category_id.order formatida
            $categoryId = intval($data['catalog']);
            $orderNumber = intval($data['order']);
            $product->order = "{$categoryId}.{$orderNumber}";

            $product->type = $request->type ?? null;

            if(isset($data['img'])) {
                $path = $request->file('img')->store('upload/images', 'public');
                $product->main_img = $path;
            }

            $product->save();

            if (isset($data['images_hidden'])) {
                foreach ($data['images_hidden'] as $item) {
                    $image = new ProductImage;
                    $image->img = $item;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->with(['error' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with(['message' => 'Successfully added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Lang::all();
        $product = Product::find($id);
        $catalog = Catalog::all();
        return view('app.products.edit', compact([
            'languages',
            'product',
            'catalog'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title.ru' => 'required',
            'desc.ru' => 'required',
            'catalog' => 'required|numeric',
            'vendor_code' => 'required',
            'order' => 'required|numeric',
        ]);

        $data = $request->all();

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $product->title = $data['title'];
            $product->desc = $data['desc'];
            $product->catalog_id = intval($data['catalog']);
            $product->vendor_code = $data['vendor_code'];
            $product->type = $request->type ?? null;

            // Orderni category_id.order formatida birlashtirish
            $categoryId = intval($data['catalog']);
            $orderNumber = intval($data['order']);
            $product->order = "{$categoryId}.{$orderNumber}";

            if(isset($data['img'])) {
                $path = $request->file('img')->store('upload/images', 'public');
                $product->main_img = $path;
            }

            $product->save();

            // Existing product imagesni yangilash
            if (isset($data['images_hidden'])) {

                ProductImage::where('product_id', $product->id)->delete();

                foreach ($data['images_hidden'] as $item) {
                    $image = new ProductImage;
                    $image->img = $item;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->with(['error' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
            DB::beginTransaction();
            $images = ProductImage::where('product_id', $product->id)->get();
            if (!is_null($images)) ProductImage::where('product_id', $product->id)->delete();
            $product->delete();
            DB::commit();
            return redirect()->route('products.index')->with(['message' => 'Successfully deleted!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->with(['message' => $e]);
        }
    }
}
