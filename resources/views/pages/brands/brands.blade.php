@extends('layouts.app', ['activePage' => 'brands', 'titlePage' => __('Marques'), 'page'=>'brands'])

@section('content')
@include('pages.brands.details.brand_modal')
@include('pages.brands.details.delete_modal')
  <div class="content">
    <div class="container-fluid">
        <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ajouter</button>
        </div>
      <div class="row">
        @foreach($brands as $index => $brand)
            @php
            if(($index) %4 == 0 ) {$card_color = 'card-header-warning';}
            elseif(($index) %4 == 1 ) {$card_color = 'card-header-success';}
            elseif(($index) %4 == 2 ) {$card_color = 'card-header-danger';}
            else {$card_color = 'card-header-primary';}
            @endphp
           
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href={{route('brand_details', ['id'=>$brand->id])}}>
                    <div class="card-header {{$card_color}} card-header-icon">
                        <div class="card-icon">{{$brand->name[0]}}{{$brand->name[1]}}
                        </div>
                    </div>
                    <h3 class="card-title margin-top-40">{{$brand->name}}</h3>
                </a>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>
                        {{$brand->materials_count}} Equipements
                    </div>
                    <div class=text-right> 
                        <i onclick="showDetails(this)" class="material-icons edit" data-toggle="modal" data-target="#exampleModalCenter" 
                            data-id="{{$brand->id}}" data-name="{{$brand->name}}">edit</i>
                        <i onclick="deleteItem(this,'/brands/')" class="material-icons delete" data-toggle="modal" data-target="#deleteModal" 
                        data-id="{{$brand->id}}" data-item="{{$brand->name}}">delete_forever</i>
                    </div>
                </div>
            </div>
         </div>
        @endforeach
      </div>
    </div>
</div>

<script>
function showDetails(element) {
  var brandID = element.getAttribute("data-id");
  var brandName = element.getAttribute("data-name");
    document.getElementById("brand_name").value = brandName;
    document.getElementById("brand_form").action = window.location.origin+'/brands/'+brandID;
}

</script>
@endsection