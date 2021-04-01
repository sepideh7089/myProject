@extends('admin.layout.admin')



@section('title')
ShowAttribute
@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="mb-4">
            <h5 class="font-weight-bold">Show Attribute : {{$attribute->name}}</h5>
        </div>
        <hr>

        <div class="row">
                <div class="form-group  col-md-3">
                    <label >Attribute Name</label>
                    <input  class="form-control" type="text" value=" {{$attribute->name}}" disabled >
                </div>

              <div class="form-group  col-md-3">
                    <label >Date Of Modified</label>
                    <input  class="form-control" type="text" value=" {{$attribute->created_at}}" disabled >
                </div>
            </div>

            <a href="{{route('admin.attributes.index')}}" class="btn btn-dark mt-5">Return</a>

    <div>

</div>
@endsection
