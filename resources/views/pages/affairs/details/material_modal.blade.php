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
                <input type="text"  name="reference" id="reference" class="form-control" required>
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
                <input type="text" name="quantity" id="quantity" class="form-control" required>
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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button onclick="addEquipment()" type="button" class="btn btn-primary" data-dismiss="modal">Enregistrer</button>
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<script>
function addEquipment(){
    var array = [];
    var tr="<tr>";
    $("input[class=form-control]").each(function() {
        if ($(this).attr("name") == "reference") {
          tr += '<td><input type="text" name="reference[]" id="reference" class="form-control" value="'+$(this).val()+'" required></td>'  
        }
        if ($(this).attr("name") == "designation") {
          tr += '<td><input type="texterea" id="designation" name="designation[]" class="form-control" value="'+$(this).val()+'"></td>'  
        }
        if ($(this).attr("name") == "quantity") {
          tr += '<td><input type="text" name="quantity[]" id="quantity" class="form-control" value="'+$(this).val()+'" required></td>'  
        }
        if ($(this).attr("name") == "unit_price") {
          tr += '<td><input type="numeric" name="unit_price[]" id="unit_price" class="form-control" value="'+$(this).val()+'"></td>'  
        }
        if ($(this).attr("name") == "note") {
          tr += '<td><input type="texterea" name="note[]" id="note" class="form-control" value="'+$(this).val()+'"></td>'  
        }
    });
    tr += '<td class="action"><i onclick="delete_tr(this)" class="material-icons delete">delete_forever</i></td>';
    tr +="</tr>";
    $('#equipment-table').append(tr);
}

</script>