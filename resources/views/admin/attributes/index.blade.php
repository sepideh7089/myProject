@extends('admin.layout.admin')



@section('title')
Index Attributes
@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold"> Attribute list ({{$attribute->total()}})</h5>
            <a  class="btn btn-sm btn-outline-primary"href="{{route('admin.attributes.create')}}">
                <i class="fa fa-plus"></i>

               Aattributes Creation</a>
        </div>

        <div>
           <table class="table rable-bored table-striped text center">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>name</th>
                       <th>operation</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($attribute as $key=>$attributes)
                       <tr>
                           <th>
                               {{$attribute->firstItem() +  $key}}
                           </th>

                           <th>
                            {{$attributes->name}}

                            <a class="btn btn-sm btn-outline-success" href="{{route('admin.attributes.show' , ['attribute'=>$attributes->id])}}" >Show</a>
                            <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.attributes.edit' , ['attribute'=>$attributes->id])}}" >Edit</a>
                           </th>
                       </tr>
                   @endforeach
               </tbody>
           </table>
        </div>
    </div>

@endsection
