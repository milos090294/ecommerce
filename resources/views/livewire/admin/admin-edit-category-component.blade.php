

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
                   
                    <span></span> Edit Category
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">Edit Category</div>
                                <div class="col-md-6"><a href="{{route ('admin.categories')}}" class="btn btn-success float-end">All Categories</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert"> {{Session::get('message')}}</div>
                            @endif
                          <form wire:submit.prevent="updateCategory">
                            <div class="md-3 mt-3">
                                <label for="name" class="form-label">Name</label>
                                <input wire:model = "name" wire:keyup = "generateSlug"  type="text" name="name" class="form-control" placeholder="Enter category name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input wire:model="slug" type="text" name="slug" class="form-control" placeholder="Enter category slug">
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label for="newImage" class="form-label">Image</label>
                              <input wire:model="newImage" type="file" name="newImage" class="form-control">
                                @error('newImage')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            @if ($newImage)
                                <img src="{{$newImage->temporaryUrl()}}" width="120" >

                                @else
                                <img src="{{asset ('assets/imgs/categories')}}/{{$image}}" width="120">
                            
                            @endif
                            </div>
                            <div class="md-3 mt-3">
                                <label for="is_popular" class="form-label">Is Popular</label>
                            <select wire:model="is_popular" name="is_popular" id="" class="form-control">
                                <option value="0">no</option>
                                <option value="1">yes</option>
                            </select>
                                @error('is_popular')
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