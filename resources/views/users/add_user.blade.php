<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="">
        <button type="button" class="close" style="padding:10px" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="user_form" action="{{ route('user.store') }}" enctype="multipart/form-data" method ="post">
        <div class="modal-body">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <!-- nom de utilisateur -->
            <div class="input-group-prepend">
                <span class="input-group-text">Nom et prénom</span>
            </div>
            <div class="input-group">
                <input type="text" name="name"  id="name"class="form-control">
            </div>
            <!-- email  -->
             <div class="input-group-prepend">
                <span class="input-group-text" >Email</span>
            </div>
             <div class="input-group">
                <input type="mail" class="form-control" name="email" id="email">
             </div>
              <!-- password  -->
            <div class="input-group-prepend">
                <span class="input-group-text" >Mot de passe</span>
            </div>
             <div class="input-group">
                <input type="password" class="form-control" name="password" id="password">
             </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>