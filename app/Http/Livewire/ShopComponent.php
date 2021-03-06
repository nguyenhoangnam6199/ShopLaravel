<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

use Livewire\WithPagination;


class ShopComponent extends Component
{

    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize=5;
    }

    public function store($product_id,$product_name,$product_price){
        //Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;

    public function render()
    {
        if($this->sorting=='date'){
            $product = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price'){
            $product = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc'){
            $product = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $product = Product::paginate($this->pagesize);
        }
        
        $categories = Category::all();
        return view('livewire.shop-component',
        ['products'=>$product,'categories'=>$categories])->layout("layouts.base");
    }
}
