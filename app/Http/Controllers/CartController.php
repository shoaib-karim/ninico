<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $product;
    public function index()
    {
        return view('frontend.cart.index', ['products' => Cart::content()]);
    }

    public function store(Request $request, $id)
    {
        $this->product = Product::find($id);

        Cart::add([
            'id' => $id,
            'name' => $this->product->name,
            'qty' => $request->qty,
            'price' => $this->product->sale_price,
            'weight' => 0,
            'options' => [
                'size' => 'large',
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                // 'brand' => $this->product->brand->name
            ]
        ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->route('cart.page');
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        return redirect()->route('cart.page')->with('message', 'Item Updated');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.page')->with('message', 'Item Removed');
    }

    public function cartContent()
    {
        return view('partials.cart-content', [Cart::content(), 'total' => Cart::subtotal()]);
    }
}
