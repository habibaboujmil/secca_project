@extends('layouts.app', ['activePage' => 'brands', 'titlePage' => __('  ')])
@section('content')
@include('pages.details.material_modal')
<div class="content">
  <div class="container-fluid">
    <div>
      <button style="margin-left:17px"class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ajouter</button>
    </div>  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Marque: {{$brand->name}}</h4>
            <p class="card-category"> Liste des matériaux</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Ref</th>
                  <th>Désignation</th>
                  <th>Quantitie</th>
                  <th> Remarque</th>
                  <th> Action</th>
                </thead>
                <tbody>
                  @foreach($brand->materials as $item)
                  <tr>
                    <td> 1</td>
                    <td>{{$item->reference}}</td>
                    <td>{{$item->designation}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->note}}</td>
                    <td class="action">
                      <i class="material-icons edit">edit</i>
                      <form action="{{route('material_delete', ['id'=>$item->id])}}" method="post">
                          <input class="material-icons delete" type="submit" value="delete_forever" />
                          @method('delete')
                          @csrf
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection