@extends('layouts.app', ['activePage' => 'affairList', 'titlePage' => __('Création d\'une affaire')])
@include('pages.affairs.details.material_modal')
@include('pages.affairs.details.importExcelModal')
@section('content')
<div class="content">
  <div class="container-fluid">  
    <div class="row">
      <div class="col-md-12">
        <form>
            <div class="card">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="card-body">
                    <div class="input-group">
                    <span class="input-group-text">Référence</span>
                        <input type="text" name="ref"  id="ref" class="form-control" value="aff_{{ date('dmy_his') }}">
                    </div>
                    <div class="input-group">
                    <span class="input-group-text">Remarque</span>
                        <textarea name="description"  id="description" class="form-control" ></textarea>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <div class="header-table">
                    <h4 class="card-title ">Liste des matériaux: </h4>
                    <i title="Ajouter un élément" class="material-icons" data-toggle="modal" data-target="#editeMaterial">add_circle_outline</i> 
                    <i title="Ajouter via Excel"class="material-icons" data-toggle="modal" data-target="#ImportExcel">post_add</i> 
                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function addData() {

}
</script>
@endsection