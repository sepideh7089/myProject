@extends('admin.layout.admin')



@section('title')
EditBrands
@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="mb-4">
            <h5 class="font-weight-bold"> Edit Brand {{$brand->name}}</h5>
        </div>
        <hr>

        @include('admin.sections.errors')
        <form action="{{route('admin.brands.update' , ['brand'=>$brand->id])}}" method="POST">
            @csrf
            @method('put')

            <div class="form-row">
                <div class="form-group  col-md-3">
                    <label for="name">Brand Name</label>
                    <input  class="form-control" type="text" id="name" name="name" value="{{$brand->name}}">
                </div>


                <div class="form-group  col-md-3">
                    <label for="is_active">Stock Condition</label>
                    <select  class="form-control"  id="is_active" name="is_active" >
                        <option value="1" {{$brand->getRawOriginal('is_active' ? 'Selected' : '')}}>Active</option>
                        <option value="1" {{$brand->getRawOriginal('is_active' ? 'Selected' : '')}}>Deactive</option>

                    </select>
                </div>
            </div>
            <button class="btn btn-outline-primary mt-5"   type="submit">Edit</button>
            <a href="{{route('admin.brands.index')}}" class="btn btn-dark mt-5 mr-3">Return</a>
        </form>
    <div>

</div>
@endsection
