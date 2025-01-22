<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048',
        ]);

        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->kategori = $request->kategori;
        $product->gender = $request->gender;
        $product->price = $request->price;
        $product->stok = $request->stok;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->back()->with('success', 'Produk Berhasil Ditambah');
    }
    public function show()
{
    // Ambil semua produk dari database
    $products = Product::all();

    // Ambil data pengguna yang sedang login
    $user = Auth::user();

    // Kirimkan data produk dan pengguna ke tampilan partner
    return view('partner', [
        'products' => $products,
        'nama' => $user->name,
        'email' => $user->email,
    ]);
}
public function index()
{
    $products = Product::all(); // Mengambil semua produk
    return view('dashboard', compact('products')); // Mengarahkan ke view dengan data produk
}
public function detail($id){
    $product = Product::find($id);
    return view('show', compact('product'));
}


}
