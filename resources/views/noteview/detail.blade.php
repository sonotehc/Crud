@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Data</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name : </strong> {{$kuycheck->name}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Description : </strong> {{$kuycheck->des}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('noteview.index')}}" class="btn btn-sm btn-success">Back</a>
            </div>
        </div>
    </div>
@endsection
