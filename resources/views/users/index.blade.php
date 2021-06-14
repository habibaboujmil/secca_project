@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('  '), 'page'=>'user'])
@include('users.add_user')
@include('pages.brands.details.delete_modal')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div>
      <button style="margin-left:17px"class="btn btn-primary" data-toggle="modal" data-target="#add_user">Ajouter</button>
    </div>  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">GESTION DES UTILISATEURS:</h4>
            <p class="card-category"> Liste des utilisateurs</p>
          </div>      
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Nom et prénom</th>
                  <th>Email</th>
                  <th>Ajouté le</th>
                  <th> Modifié le</th>
                  <th> Action</th>
                </thead>
                <tbody>
                  @foreach($users as $index => $item)
                  <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class="action">
                      <i onclick="showDetails(this)" class="material-icons edit" data-toggle="modal" data-target="#add_user" 
                          data-id="{{$item->id}}" data-name="{{$item->name}}"
                          data-password="{{$item->password}}"data-email="{{$item->email}}">edit</i>
                      <i onclick="deleteItem(this,'/user/')" class="material-icons delete" data-toggle="modal" data-target="#deleteModal" 
                      data-id="{{$item->id}}" data-item="{{$item->name}}">delete_forever</i>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="pagination">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function showDetails(element) {
    var id = element.getAttribute("data-id");
    var name = element.getAttribute("data-name");
    var email = element.getAttribute("data-email");
    // var password = element.getAttribute("data-password");
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    // document.getElementById("password").value = password;
    console.log(password);
    document.getElementById("user_form").action = window.location.origin+'/user/'+id;
  }
  (function() {
    var elem = document.getElementById("search");
    elem.remove();
  })();
</script>
@endsection