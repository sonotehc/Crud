@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>New Data</h3>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> there where some problems with your input.<br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('noteview.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Name :</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-12">
                    <strong>Description :</strong>
                    <input type="text" name="des" class="form-control" placeholder="Description">
                </div>

                <div class="col-md-12">
                    <a href="{{route('noteview.index')}}" class="btn btn-sm btn-success">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection
