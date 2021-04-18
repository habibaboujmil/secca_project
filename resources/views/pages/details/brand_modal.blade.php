<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une marque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('new_brand') }}" enctype="multipart/form-data" method ="post">
        <div class="modal-body">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <!-- nom de la marque -->
            <div class="input-group-prepend">
                <span class="input-group-text" id="brand_name">Nom de la marque</span>
            </div>
            <div class="input-group">
                <input type="text" name="brand_name" class="form-control">
            </div>
            <!-- logo de la marque  -->
            <!-- <div class="input-group-prepend">
                <span class="input-group-text" id="brand_logo">logo de la marque</span>
            </div> -->
            <!-- <div class="input-group mb-3"> -->
                <!-- <div class=""> -->
                    <!-- <input type="file" class="form-control" name="brand_logo" id="marque_logo"> -->
                    <!-- <label class="custom-file-label" for="marque_logo">Choisir une image</label>
                </div> -->
            <!-- </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>