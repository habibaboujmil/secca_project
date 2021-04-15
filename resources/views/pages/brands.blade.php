@extends('layouts.app', ['activePage' => 'brands', 'titlePage' => __('Marques')])

@section('content')
@include('pages.details.brand_modal')
  <div class="content">
    <div class="container-fluid">
        <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ajouter</button>
        </div>
      <div class="row">
        @foreach($brands as $brand)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href={{route('brand_details', ['id'=>$brand->id])}}>
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <img class="card-img" sizes="60*60" src="{{Storage::url($brand->logo)}}"></img>
                        </div>
                        <h3 class="card-title">{{$brand->name}}
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>
                            {{$brand->materials_count}} Equipements
                        </div>
                        <div class=text-right> 
                          <i class="material-icons edit" >edit</i>
                          <form action="{{route('brand_delete', ['id'=>$brand->id])}}" method="post">
                              <input class="material-icons delete" type="submit" value="delete_forever" />
                              @method('delete')
                              @csrf
                          </form>
                        </div>
                    </div>
                </div>
            </a>
         </div>
        @endforeach
      </div>
    </div>
</div>
@endsection