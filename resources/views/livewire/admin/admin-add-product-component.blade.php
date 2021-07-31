<div>
    <div class="container" style="padding:30px 0;">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="row">
                         <div class="col-md-6">
                             Add New Product
                         </div>
                         <div class="col-md-6">
                             <a href="{{route('admin.products')}}" class="btn btn-success pull-right" 
                             >
                                 All Product
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="panel-body">
                     @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                             {{Session::get('message')}}
                         </div>
                     @endif
                     <form class="form-horizontal" enctype="multipart/form-data" wire:click.prevent="addProduct">
                         <div class="form-group">
                             <label class="col-md-4 control-lable">Product Name</label>
                             <div class="col-md-4">
                                 <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name"
                                  wire:keyup="generateslug"
                                 />
                             </div>
                         </div>
 
                         <div class="form-group">
                            <label class="col-md-4 control-lable">Product Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Short Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Short Description" wire:model="short_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Regular Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Sale Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Stock</label>
                            <div class="col-md-4">
                               <select class="form-control" wire:model="stock_status">
                                   <option value="instock">InStock</option>
                                   <option value="outofstock">Out Of Stock</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Featured</label>
                            <div class="col-md-4">
                               <select class="form-control" wire:model="featured">
                                   <option value="0">No</option>
                                   <option value="1">Yes</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Quantity</label>
                            <div class="col-md-4">
                                <input class="form-control input-md" type="text" placeholder="Quantity" wire:model="quantity"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Product Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" class="input-file" wire:model="image" />
                                @if ($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120" />
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable">Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-lable"></label>
                            <div class="col-md-4">
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
 
                     </form>
                 </div>
             </div>
         </div>
     </div>
        
    </div>
 </div>
 