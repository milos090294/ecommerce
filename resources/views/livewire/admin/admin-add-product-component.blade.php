<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">

        
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                   
                    <span></span> Add New Product
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">Add New Product</div>
                                <div class="col-md-6"><a href="{{route ('admin.products')}}" class="btn btn-success float-end">All Products</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert"> {{Session::get('message')}}</div>
                            @endif
                          <form wire:submit.prevent="addProduct">
                            <div class="md-3 mt-3">
                                <label for="name" class="form-label">Name</label>
                                <input wire:model = "name" wire:keyup = "generateSlug"  type="text" name="name" class="form-control" placeholder="Enter product name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input wire:model="slug" type="text" name="slug" class="form-control" placeholder="Enter product slug">
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea wire:model="short_description" name="short_description" class="form-control" placeholder="Enter Short Description"></textarea>
                                @error('short_description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea wire:model="description" name="description" class="form-control" placeholder="Enter  Description"></textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="regular_price" class="form-label">Regular Price</label>
                                <input wire:model="regular_price" type="text" name="regular_price" class="form-control" placeholder="Enter Regular Price">
                                @error('regular_price')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="sale_price" class="form-label">Sale Price</label>
                                <input wire:model="sale_price" type="text" name="sale_price" class="form-control" placeholder="Enter Sale Price">
                                @error('regular_price')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input wire:model="sku" type="text" name="sku" class="form-control" placeholder="Enter SKU">
                                @error('sku')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="color" class="form-label">Color</label>
                                <input wire:model="color" type="text" name="color" class="form-control" placeholder="Enter color">
                                @error('color')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>



                            <div class="md-3 mt-3">
                                <label for="stock_status" class="form-label">Stock Status</label>
                                <select wire:model="stock_status" name="stock_status" class="form-control">
                                    <option value="instock">In stock</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                                @error('stock_status')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="featured" class="form-label">Featured</label>
                                <select wire:model="featured" name="featured" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('featured')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            
                            <div class="md-3 mt-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input wire:model="quantity" type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
                                @error('quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="image" class="form-label">Image</label>
                               <input wire:model="image" type="file" name="image" class="form-control">
                               @if ($image)
                                   <img src="{{$image->temporaryUrl()}}" width="120" srcset="">
                               @endif
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="image1" class="form-label">Image1</label>
                               <input wire:model="image1" type="file" name="image1" class="form-control">
                               @if ($image1)
                                   <img src="{{$image1->temporaryUrl()}}" width="120" srcset="">
                               @endif
                                @error('image1')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="image2" class="form-label">Image2</label>
                               <input wire:model="image2" type="file" name="image2" class="form-control">
                               @if ($image2)
                                   <img src="{{$image2->temporaryUrl()}}" width="120" srcset="">
                               @endif
                                @error('image2')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="md-3 mt-3">
                                <label for="image3" class="form-label">Image3</label>
                               <input wire:model="image3" type="file" name="image3" class="form-control">
                               @if ($image3)
                                   <img src="{{$image3->temporaryUrl()}}" width="120" srcset="">
                               @endif
                                @error('image3')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>


                            <div class="md-3 mt-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select wire:model="category_id" name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                   @foreach ($categories as $category)
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                </select>
                                @error('category_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>