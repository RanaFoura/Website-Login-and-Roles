@extends('include.header')


@section('content')
    <form action="{{ route('user.update', $user) }}" method="POST">
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
                        <div class="card-header">Edit User Form</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Full Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" placeholder="Full Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required text-danger small">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Email Address" required>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card">
                        <div class="card-header">Edit Roles</div>

                        <table class="table">
                            @foreach($roles as $item)
                                <tr>
                                    <td>
                                        @if(in_array($item->id, $role_ids))
                                            <input type="checkbox" name="role_{{ $item->name }}" checked>
                                        @else
                                            <input type="checkbox" name="role_{{ $item->name }}">
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
                        <a href="{{ route('user.show', $user) }}" class="btn btn-secondary"><em class="fa fa-times"></em> Cancel</a>
                        <button class="btn btn-primary" type="submit"><em class="fa fa-save"></em> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection