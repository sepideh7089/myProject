@extends('admin.layout.admin')



@section('title')
CreatBrands
@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="mb-4">
            <h5 class="font-weight-bold"> Create Brand</h5>
        </div>
        <hr>

        @include('admin.sections.errors')
        <form action="{{route('admin.brands.store')}}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group  col-md-3">
                    <label for="name">Brand Name</label>
                    <input  class="form-control" type="text" id="name" name="name" >
                </div>


                <div class="form-group  col-md-3">
                    <label for="is_active">Stock Condition</label>
                    <select  class="form-control"  id="is_active" name="is_active" >
                        <option value="1" selected>Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-primary mt-5"   type="submit">Confirm</button>
            <a href="{{route('admin.brands.index')}}" class="btn btn-dark mt-5 mr-3">Return</a>
        </form>
    <div>

</div>
@endsection
