<!-- Modal -->
<div class="modal fade" id="ImportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('createViaExcel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ref"  id="ref" class="form-control" value="aff_{{ date('dmy_his') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajout des matériaux par Excel </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="file">Choisir un fichier</label>
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