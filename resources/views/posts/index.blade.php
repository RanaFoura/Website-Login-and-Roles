@extends('include.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-right">
                    <a href="{{route('post.create')}}" class="btn btn-primary"><em class="fa fa-plus"></em> New Post</a>
                </div>
                <br />
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>
                    <div class="card-body ">
                        {{-- @if ($posts->count() > 0) --}}

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!--<th scope="col">No</th>-->
                                    <th scope="col">Title</th>
                                    <th scope="col">Poster</th>
                                    <th scope="col">Created_At</th>
                                    <th scope="col">Updated_At</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($posts as $post) --}}
                                <tr>
                                    <!--<th scope="row">{ {1}}</th>-->
                                    {{-- 1 =$item->id --}}
                                    <td><a href="{{route('post.show',1)}}">Roadmap</a></td>
                                    <td><img src="https://davinci.aimakerlabs.com/assets/images/gallery02/116b0207.jpg?v=3f1585b1"
                                            alt="" class="img-fluid img-thumbnail" width="100px" height="100px">
                                    </td>
                                    <td></td>
                                    <td></td>

                                    <td><a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                            </svg> </a> </td>

                                    <td><a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                            </svg>
                                        </a> </td>

                                    <td><a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                            </svg> </a> </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        {{-- @else --}}
                        <p class="text-center fst-italic"> No Posts</p>

                        {{-- @endif --}}

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
