
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
                   
                    <span></span> Edit Slide
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">Edit Slide</div>
                                <div class="col-md-6"><a href="{{route ('admin.home.slider')}}" class="btn btn-success float-end">All Slides</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert"> {{Session::get('message')}}</div>
                            @endif
                          <form wire:submit.prevent="editSlide">
                            <div class="md-3 mt-3">
                                <label for="name" class="form-label">Top Title</label>
                                <input wire:model = "top_title"   type="text" name="top_title" class="form-control" placeholder="Enter slide top title ">
                                @error('top_title')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label  class="form-label">Title</label>
                                <input wire:model="title" type="text" name="title"  class="form-control" placeholder="Enter slide title">
                                @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label  class="form-label">Sub Title</label>
                                <input wire:model="sub_title" type="text" name="sub_title"  class="form-control" placeholder="Enter slide sub title">
                                @error('sub_title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label  class="form-label">Offer</label>
                                <input wire:model="offer" type="text" name="offer"  class="form-control" placeholder="Enter slide offer">
                                @error('offer')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label  class="form-label">Link</label>
                                <input wire:model="link" type="text" name="link"  class="form-control" placeholder="Enter slide link">
                                @error('link')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label  class="form-label">Status</label>
                                <select wire:model="status" id="" class="form-control">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                             
                                @error('status')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="md-3 mt-3">
                                <label  class="form-label">Image</label>
                                <input wire:model="newImage" type="file" name="image" class="form-control" id="">
                               @if ($newImage)
                                   <img src="{{$newImage->temporaryUrl()}}" width="100">

                                @else 
                                <img src="{{ asset ('assets/imgs/slider')}}/{{$image}}" width="100">
                        
                               @endif
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Edit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>