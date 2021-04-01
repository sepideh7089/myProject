@extends('admin.layout.admin')



@section('title')
CreatCategory
@endsection


@section('script')
<script>
$('#attributeSelect').selectpicker({

'title':'choose attribute'

});


$('#attributeSelect').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {

    let attributesSelected=$(this).val();
    let attributes= @json($attribute);
    let attributeForFilter=[];

    attribute.map((attribute)=>{
        $.each(attributesSelected , function(i , element){


            if(attribute.id==element) {
                attributeForFilter.push(attribute);
            }
        });
    });
    $("#attributeIsFilterSelect").find("option").remove();
    $("#variationSelect").find("option").remove();
    attributeForFilter.forEach((element)=>{
        let attributeFilterOption=$("<option/>" , {

            value : element.id,
            text : element.name

        });

        let variationOption=$("<option/>" , {


              value : element.id,
               text : element.name

});
        $("#attributeIsFilterSelect").append(attributeFilterOption);
        $("#attributeIsFilterSelect").selectpicker('refresh');
        $("#variationSelect").append(variationOption);
        $("#variationSelect").selectpicker('refresh');

    });

});

$("#attribteIsFilterSelect").selectpicker({

'title':'choose attribute';


</script>

@endsection


@section('content')

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">

        <div class="mb-4">
            <h5 class="font-weight-bold"> Create Category</h5>
        </div>
        <hr>

        @include('admin.sections.errors')
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group  col-md-3">
                    <label for="name">Category Name</label>
                    <input  class="form-control" type="text" id="name" name="name" >
                </div>



                    <div class="form-group  col-md-3">
                        <label for="slug">slug</label>
                        <input  class="form-control" type="text" id="slug" name="slug" >
                    </div>


                    <div class="form-group  col-md-3">
                        <label for="parent_id">parent</label>
                        <select  class="form-control"  id="parent_id" name="parent_id" >
                            <option value="0">No Parent</option>
                            @foreach ($parentCategories as $parentCategory)
                                 <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group  col-md-3">
                        <label for="is_active">Stock Condition</label>
                        <select  class="form-control"  id="is_active" name="is_active" >
                            <option value="1" selected>Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>




                    <div class="form-group col-md-3">
                        <label for="attribute_ids">Attribute</label>
                        <select id="attributeSelect" name="attribute_ids[]" class="form-control"
                            data-live-search="true">
                            @foreach ($attribute as $attributes)
                                <option value="{{ $attributes->id }}">{{ $attributes->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="attribute_is_filter_ids">filter</label>
                        <select id="attributeIsFilterSelect" name="attribute_is_filter_ids[]" class="form-control" multiple
                            data-live-search="true">
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="attribute_is_filter_ids">variation</label>
                        <select id="variationSelect" name="variation_id" class="form-control" data-live-search="true">
                        </select>
                    </div>

                    <div class="form-group  col-md-3">
                    <label for="icon">Icon</label>
                    <input  class="form-control" type="text" id="icon" name="icon" >
                    </div>

                    <div class="form-group  col-md-12">
                    <label for="description">Descriptoin</label>
                    <textarea  class="form-control"  id="description" name="description" ></textarea>
                    </div>




            </div>

            <button class="btn btn-outline-primary mt-5"   type="submit">Confirm</button>
            <a href="{{route('admin.attributes.index')}}" class="btn btn-dark mt-5 mr-3">Return</a>
        </form>
    <div>

</div>
@endsection
