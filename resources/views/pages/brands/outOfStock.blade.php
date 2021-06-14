@extends('layouts.app', ['activePage' => 'brands', 'titlePage' => __('Matériaux'), 'page'=>'materials'])
@section('content')
@include('pages.brands.details.material_modal')
@include('pages.brands.details.delete_modal')
<div class="content">
  <div class="container-fluid"> 
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Marque: {{$brand->name}}</h4>
            <p class="card-category"> Matériel en repture du stock: </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Ref</th>
                  <th>Désignation</th>
                  <th>Quantitie</th>
                  <th>Prix</th>
                  <th> Remarque</th>
                  <th> Action</th>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$item->reference}}</td>
                    <td>{{$item->designation}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->unit_price}}</td>
                    <td>{{$item->note}}</td>
                    <td class="action">
                      <i onclick="showDetails(this)" class="material-icons edit" data-toggle="modal" data-target="#editeMaterial" 
                          data-id="{{$item->id}}" data-reference="{{$item->reference}}" data-price="{{$item->unit_price}}"
                          data-designation="{{$item->designation}}" data-quantity="{{$item->quantity}}"
                          data-note="{{$item->note}}">edit</i>
                      <i onclick="deleteItem(this,'/materials/')" class="material-icons delete" data-toggle="modal" data-target="#deleteModal" 
                      data-id="{{$item->id}}" data-item="{{$item->reference}}">delete_forever</i>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  (function() {
    var elem = document.getElementById("search");
    elem.remove();
  })();
  function showDetails(element) {
    var id = element.getAttribute("data-id");
    var reference = element.getAttribute("data-reference");
    var designation = element.getAttribute("data-designation");
    var quantity = element.getAttribute("data-quantity");
    var unit_price = element.getAttribute("data-price");
    var note = element.getAttribute("data-note");
    document.getElementById("reference").value = reference;
    document.getElementById("designation").value = designation;
    document.getElementById("quantity").value = quantity;
    document.getElementById("unit_price").value = unit_price;
    document.getElementById("note").value = note;
    document.getElementById("material_form").action = window.location.origin+'/materials/'+id;
  }

</script>
@endsection