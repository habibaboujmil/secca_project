<!-- Modal -->
<div class="modal fade" id="editeMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="">
        <button type="button" class="close" style="padding:10px" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form id="material_form" action="{{ route('create_equipment') }}" enctype="multipart/form-data" method ="post"> -->
        <div class="modal-body">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input name="affair_id" type="hidden" value="{{(isset($affair))?$affair->id : null}}"/>
            <!-- Référence -->
            <div class="input-group-prepend">
                <span class="input-group-text">Référence</span>
            </div>
            <div class="input-group">
                <input type="text"  name="reference" id="reference" class="form-control">
            </div>
            <!-- Désignation-->
            <div class="input-group-prepend">
                <span class="input-group-text">Désignation</span>
            </div>
            <div class="input-group">
                <input type="texterea" id="designation" name="designation" class="form-control">
            </div>
            <!-- Quantité-->
            <div class="input-group-prepend">
                <span class="input-group-text">Quantité</span>
            </div>
            <div class="input-group">
                <input type="text" name="quantity" id="quantity" class="form-control">
            </div>
            <!-- Prix-->
            <div class="input-group-prepend">
                <span class="input-group-text">Prix</span>
            </div>
            <div class="input-group">
                <input type="numeric" name="unit_price" id="unit_price" class="form-control">
            </div>
            <!-- Remarque-->
            <div class="input-group-prepend">
                <span class="input-group-text">Remarque</span>
            </div>
            <div class="input-group">
                <input type="texterea" name="note" id="note" class="form-control">
            </div>
            <!-- logo de la marque  -->
            <!-- <div class="input-group-prepend">
                <span class="input-group-text" id="brand_logo">logo de la marque</span>
            </div>
            <div class="input-group mb-3">
                <div class="">
                    <input type="file" class="form-control" name="img" id="marque_logo">
                    <label class="custom-file-label" for="marque_logo">Choisir une image</label>
                </div>
            </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button onclick="addEquipment()" type="button" class="btn btn-primary">Enregistrer</button>
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<script>
function addEquipment(){
    var array = [];
    $("input[class=form-control]").each(function() {
        array.push({
            input: $(this).attr("name"),
            value: $(this).val()
        });
    });
    // then to get the JSON string
    var jsonString = JSON.stringify(array);
    console.log(jsonString);
}

</script>