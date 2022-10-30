@extends('include.header')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <a href="{{route('tag.create')}}" class="btn btn-primary"><em class="fa fa-plus"></em> New Tag</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Tags</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="roles-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $item)
                                    <tr>
                                        <td> {{ $item->id }}  </td>
                                        <td> <a href="{{route('tag.show',$item->id)}}">{{ $item->name }} </a></td>
                                        <td> {{ $item->display_name }}</td>
                                        <td> {{ $item->desc }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
