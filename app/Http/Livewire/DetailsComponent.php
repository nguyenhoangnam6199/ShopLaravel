<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

     public function store($product_id,$product_name,$product_price){
        //Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product=Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(3)->get();
        $related_product= Product::where('category_id',$product->category_id)->inRandomOrder()->limit(12)->get();
        return view('livewire.details-component',
        ['product'=>$product,'popular'=>$popular_products,'related'=>$related_product])
        ->layout("layouts.base");
    }
}
