@extends('include.header')

@section('content')
    <div class="container">
        <div class="row">
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
            <!--end error-->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create Type Form</div>
                    <div class="card-body">
                        <form action="{{route('type.store')}}" method="POST" >
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', '') }}" placeholder="Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="display_name">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name', '') }}" placeholder="Display Name">
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <input type="text" name="desc" id="desc" class="form-control" value="{{ old('desc', '') }}" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="text-right">
                                <a href="{{route('types.index')}}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection