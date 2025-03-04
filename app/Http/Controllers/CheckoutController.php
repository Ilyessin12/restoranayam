<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @method void middleware(string $middleware, array $options = [])
 */

class CheckoutController extends Controller
{
    public function __construct() //use auth middleware to protect the checkout page
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $cartItems = session()->get('cart', []);
        
        if(count($cartItems) == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        
        $total = 0;
        foreach($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('checkout.index', compact('cartItems', 'total'));
    }
    
    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
        
        $cartItems = session()->get('cart', []);
        
        if(count($cartItems) == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        
        DB::beginTransaction();
        
        try {
            // Calculate total
            $total = 0;
            foreach($cartItems as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            
            // Create order
            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_date = now();
            $order->total = $total;
            $order->status = 'pending';
            $order->save();
            
            // Create order details and update stock
            foreach($cartItems as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item['id'];
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->price = $item['price'];
                $orderDetail->subtotal = $item['price'] * $item['quantity'];
                $orderDetail->save();
                
                // Update stock
                $product = Product::find($item['id']);
                $product->stock -= $item['quantity'];
                $product->save();
                
                // Record stock movement
                $stockMovement = new StockMovement();
                $stockMovement->product_id = $item['id'];
                $stockMovement->quantity = $item['quantity'];
                $stockMovement->movement_type = 'out';
                $stockMovement->movement_date = now();
                $stockMovement->save();
            }
            
            // Clear the cart
            session()->forget('cart');
            
            DB::commit();
            
            return redirect()->route('orders.show', $order->id)
                ->with('success', 'Your order has been placed successfully!');
                
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error placing order: ' . $e->getMessage());
        }
    }
}