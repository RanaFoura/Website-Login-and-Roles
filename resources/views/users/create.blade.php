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
                    <div class="card-header">Create User Form</div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Full Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', '') }}" placeholder="Full Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required text-danger small">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', '') }}" placeholder="Email Address" required>
                                    </div>
                                    <br/>
                                    Default Password : password
                                    <br/>
                                </div>
                            </div>
                            <br/>
                            <div class="text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection