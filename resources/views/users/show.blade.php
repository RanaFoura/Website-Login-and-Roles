@extends('include.header')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user? You will not be able to recover this data.');"><em class="fa fa-trash-o"></em> Ban</button>
                    </form>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <b>Full Name: </b> {{ $user->name }}<br>
                        <b>Email: </b> {{ $user->email }} {!! isset($user->email_verified_at) ? '<span class="badge badge-pill badge-success"><em class="fa fa-check"></em> Verified</span>' : '' !!}
                        <br><br>
                        <b>Created At: </b> {{ $user->created_at->format('m/d/Y') }}<br>
                        <b>Updated At: </b> {{ $user->updated_at->format('m/d/Y') }}<br>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">Roles</div>
                    <div class="card-body">
                        <table class="table" id="roles-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $item)
                                <tr>

                                    <td>
                                        <span style="display:none">
                                            {!! in_array($item->id, $role_ids) ? '1' : '0' !!} es
                                        </span>
                                        {!! in_array($item->id, $role_ids) ? '<em class="fa fa-check text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="green"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
                                            </em>' : '<em class="fa fa-times text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="red"><path d="M0 0h24v24H0z" fill="none"/><path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                            </em>' !!}
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->display_name }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection