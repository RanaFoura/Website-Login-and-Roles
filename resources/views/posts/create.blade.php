@extends('include.header')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>
                <div class="card-body">
                <!-- for error messages-->
                    @if(count($errors)>0)
                        <ul class="navbar-nav mr-auto">
                        @foreach ($errors->all() as $error)
                            <li class="nav-item active">
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                        <hr/>
                    @endif
                 
                            <!-- for picture enctype="multipart/form-data" -->
                <form action="/user/post/store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    @csrf

                    <br/>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title"  placeholder="Enter Title">
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="content">Description</label>
                        <textarea class="form-control" name="content" rows="8" col="8"></textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name ="category_id" id="category">
                       
                        {{-- @foreach ($categories as $category) --}}
                        <!-- it will show the name but will choose and send to server the id (value=id)-->
                        <option value=""></option>
                        {{-- @endforeach --}}
                        </select>
                    </div>
                    <br/>
                    <div class="form-check">
                    <label for="tag">Tag</label>
                    {{-- @foreach ($tags as $tag) --}}
                    <div class="form-check">
                        <!-- the name value is tags[] because we can choose more than one value-->
                        <input class="form-check-input" type="checkbox" name="tags[]" value="" id="tag">
                        <label class="form-check-label" >
                            
                         </label>
                    </div>
                    {{-- @endforeach --}}
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="featured">Photo</label>
                        <input type="file" class="form-control-file" name="featured">
                    </div>
                    <br/>
                    <a href="{{route('posts.index')}}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection