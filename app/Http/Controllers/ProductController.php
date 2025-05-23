<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class ProductController extends Controller
{
 /**
 * Display a listing of the resource.
 */
 public function index() : View
 {
 return view('products.index', [
 'products' => Product::latest()->paginate(4)
 ]);
 }
 /**
 * Show the form for creating a new resource.
 */
 public function create() : View
 {
 return view('products.create');
 }
 /**
 * Store a newly created resource in storage.
 */
<<<<<<< HEAD
 public function store(StoreProductRequest $request) : RedirectResponse
 {
 $data = $request->validated();
 if ($request->hasFile('image')) {
 $imagePath = $request->file('image')->store('products', 'public');
 $data['image'] = $imagePath;
 }
 Product::create($data);
=======
 public function store(StoreProductRequest $request) : 
RedirectResponse
 {
 Product::create($request->validated());
>>>>>>> 2a73ddf4291ce6bd324c82b5a069ad01602649fb
 return redirect()->route('products.index')
 ->withSuccess('New product is added successfully.');
 }
 /**
 * Display the specified resource.
 */
 public function show(Product $product) : View
 {
 return view('products.show', compact('product'));
 }
 /**
 * Show the form for editing the specified resource.
 */
 public function edit(Product $product) : View
 {
 return view('products.edit', compact('product'));
 }
 /**
 * Update the specified resource in storage.
 */
<<<<<<< HEAD
 public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
 {
 $data = $request->validated();
 if ($request->hasFile('image')) {
 $imagePath = $request->file('image')->store('products', 'public');
 $data['image'] = $imagePath;
 }
 $product->update($data);
=======
 public function update(UpdateProductRequest $request, Product
$product) : RedirectResponse
 {
 $product->update($request->validated());
>>>>>>> 2a73ddf4291ce6bd324c82b5a069ad01602649fb
 return redirect()->back()
 ->withSuccess('Product is updated successfully.');
 }
 /**
 * Remove the specified resource from storage.
 */
 public function destroy(Product $product) : RedirectResponse
 {
 $product->delete();
 return redirect()->route('products.index')
 ->withSuccess('Product is deleted successfully.');
 }
}