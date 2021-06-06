@extends('layouts.app', ['activePage' => 'affairList', 'titlePage' => __('  ')])
@include('pages.affairs.details.delete_modal')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div>
      <a  href="{{route('create_affairs')}}" style="margin-left:17px"class="btn btn-primary">Ajouter</a>
    </div>  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Liste des affaires</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Num</th>
                  <th>Ref</th>
                  <th>Remarque</th>
                  <th>date de création</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($affairs as $index => $item)
                  <tr>
                    <td>{{$index+1}} </td>
                    <td>{{$item->reference}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="action">
                      <a href="{{route('affair_details',['id' => $item->id])}}" class="material-icons edit">content_paste</a>
                      <i onclick="deleteItem(this,'/affairs/')" class="material-icons delete" data-toggle="modal" data-target="#deleteModal" 
                      data-id="{{$item->id}}" data-item="{{$item->reference}}">delete_forever</i>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="pagination">
          {{ $affairs->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script>
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