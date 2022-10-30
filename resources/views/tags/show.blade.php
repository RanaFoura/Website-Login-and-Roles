@extends('include.header')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <form action="{{route('tag.destroy', $tag->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('tag.edit', $tag) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role? You will not be able to recover this data.');"><em class="fa fa-trash-o"></em> Delete</button>
                    </form>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <b>Name: </b> {{ $tag->name }}<br>
                        <b>Display Name: </b> {{ $tag->display_name }}<br>
                        <b>Description: </b> {{ $tag->desc }}<br>
                        <br>
                        <b>Created At: </b> {{ $tag->created_at->format('m/d/Y') }}<br>
                        <b>Updated At: </b> {{ $tag->updated_at->format('m/d/Y') }}<br>
                    </div>
                </div>
                <br/><br/>
            </div>
        </div>
    </div>
@endsection