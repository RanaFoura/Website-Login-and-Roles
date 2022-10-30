@extends('include.header')


@section('content')
    <form action="{{ route('type.update', $type) }}" method="POST">
        @csrf
        @method('PUT')

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
                        <div class="card-header">Edit Type</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $type->name) }}" placeholder="Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="display_name">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name', $type->display_name) }}" placeholder="Display Name">
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <input type="text" name="desc" id="desc" class="form-control" value="{{ old('desc', $type->desc) }}" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="text-right">
                        <a href="{{ route('type.show', $type) }}" class="btn btn-secondary"><em class="fa fa-times"></em> Cancel</a>
                        <button class="btn btn-primary" type="submit"><em class="fa fa-save"></em> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection