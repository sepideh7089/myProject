@extends('admin.layout.admin')



@section('title')
Index Brands
@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold"> Brands list ({{$brand->total()}})</h5>
            <a  class="btn btn-sm btn-outline-primary"href="{{route('admin.brands.create')}}">
                <i class="fa fa-plus"></i>

                Brands Creation</a>
        </div>

        <div>
           <table class="table rable-bored table-striped text center">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>name</th>
                       <th>situation</th>
                       <th>operation</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($brand as $key=>$brands)
                       <tr>
                           <th>
                               {{$brand->firstItem() +  $key}}
                           </th>

                           <th>
                            {{$brands->name}}
                           </th>

                           <th>

                            <span class="{{$brands->getRawOriginal('is_active') ? 'text-success' : 'text-danger'}}" >
                                {{$brands->is_active}}
                            </span>
                           </th>

                           <th>
                            <a class="btn btn-sm btn-outline-success" href="{{route('admin.brands.show' , ['brand'=>$brands->id])}}" >Show</a>
                            <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.brands.edit' , ['brand'=>$brands->id])}}" >Edit</a>
                           </th>
                       </tr>
                   @endforeach
               </tbody>
           </table>
        </div>
    </div>

@endsection
