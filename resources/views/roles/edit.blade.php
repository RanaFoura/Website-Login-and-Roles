@extends('include.header')


@section('content')
    <form action="{{route('role.update',$role)}}" method="POST">
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
                        <div class="card-header">Edit Details</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" placeholder="Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="display_name">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name', $role->display_name) }}" placeholder="Display Name">
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $role->description) }}" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card">
                        <div class="card-header">Edit Permissions</div>

                        <table class="table">
                            @foreach($permissions as $item)
                                <tr>
                                    <td>
                                        @if(in_array($item->id, $permission_ids))
                                            <input type="checkbox" name="permission_{{ $item->name }}" checked>
                                        @else
                                            <input type="checkbox" name="permission_{{ $item->name }}">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->display_name }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <br/>
                    <div class="text-right">
                        <a href="{{route('roles.index')}}" class="btn btn-secondary"><em class="fa fa-times"></em> Cancel</a>
                        <button class="btn btn-primary" type="submit"><em class="fa fa-save"></em> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection