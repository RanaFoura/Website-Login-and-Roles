@extends('include.header')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body ">
                    @if ($users->count()>0)

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!--<th scope="col">No</th>-->
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created_At</th>
                        <th scope="col">Updated_At</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                    <tr>
                        <!--<th scope="row">{ {1}}</th>-->
                        <td>{{$user->name}}</td>
                        {{-- {{assest($user->profile->avatar)}} --}}
                        <td><img src="https://www.pngall.com/wp-content/uploads/12/Avatar-Profile-PNG-Image-File.png" alt="" class="img-fluid img-thumbnail" width="50px" height="50px" ></td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>

                        <td>
                            @if ($user->role)
                            <a href="{{route('users.removeadmin',['id'=>$user->id])}}" class="link-dark"> Remove Admin</a>
                            @else
                            <a href="{{route('users.makeadmin',['id'=>$user->id])}}" class="link-dark"> Make Admin</a>

                            @endif

                        </td>
                        <td>
                            @if ($user->status)
                            <a href="{{route('users.removeban',['id'=>$user->id])}}" class="link-dark"> Remove Ban</a>
                            @else
                            <a href="{{route('users.ban',['id'=>$user->id])}}" class="link-dark">Ban</a>

                            @endif

                        </td>   
                        <td><a href="{{route('users.delete', ['id'=> $user->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>                        </a> </td>
 
                        </tr>
                        @endforeach
                    </tbody>
            </table>
                    @else
                    <p class="text-center fst-italic"> No user</p>

                    @endif
                
                 <!--           
                <form action="/category/store" method="POST" >
                    { { csrf_field() }} 
                    @ csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
-->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
