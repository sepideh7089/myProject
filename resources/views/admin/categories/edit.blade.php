@extends('admin.layout.admin')



@section('title')
EditAttributes
@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="mb-4">
            <h5 class="font-weight-bold"> Edit Attributes {{$attribute->name}}</h5>
        </div>
        <hr>

        @include('admin.sections.errors')
        <form action="{{route('admin.attributes.update' , ['attribute'=>$attribute->id])}}" method="POST">
            @csrf
            @method('put')

            <div class="form-row">
                <div class="form-group  col-md-3">
                    <label for="name">Attribute Name</label>
                    <input  class="form-control" type="text" id="name" name="name" value="{{$attribute->name}}">
                </div>

            </div>
            <button class="btn btn-outline-primary mt-5"   type="submit">Edit</button>
            <a href="{{route('admin.attributes.index')}}" class="btn btn-dark mt-5 mr-3">Return</a>
        </form>
    <div>

</div>
@endsection
