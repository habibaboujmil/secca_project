@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Tableau de bord'),'page'=>'home'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Nombre des affaires</p>
              <h3 class="card-title">{{$affairNumber}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">post_add</i>
                <a href="{{route('create_affairs')}}"> Céer une affaire</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">construction</i>
              </div>
              <p class="card-category">Total des matériaux</p>
              <h3 class="card-title">{{$materialNumber}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">receipt_long</i> <a href="{{route('brands')}}"> Consulter</a> 
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Repture de stock</p>
              <h3 class="card-title">{{$outOfStockNum}}  {{($outOfStockNum > 1) ? 'matériaux' : 'matériel'}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i><a href="#outOfStock"> Vérifier</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
              <i class="material-icons">people_alt</i>
              </div>
              <p class="card-category">Utilisateurs</p>
              <h3 class="card-title">{{$users}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">person_add</i><a href="/user">Ajouter un utilisateur</a> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12" ></div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Derniers affaires effectuées</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>
                    @foreach($lastAffair as $item)
                      <tr>
                        <td><a href="{{route('affair_details',['id'=> $item->id])}}">{{$item->reference}}</a></td>
                        <td>{{$item->created_at}}</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Modifier" class="btn btn-primary btn-link btn-sm">
                            <a style="color: orange;" href="{{route('affair_details',['id'=> $item->id])}}">
                              <i class="material-icons">edit</i>
                            </a>
                          </button>
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
        <div class="col-lg- col-md-2 col-sm-12"></div>
      </div>
      <div class="row" id="outOfStock">
        <div class="col-lg-2 col-md-2 col-sm-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Repture du stock</h4>
              <p class="card-category">Liste des matériaux</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Référence</th>
                  <th>Marque</th>
                  <th>Editer</th>
                </thead>
                <tbody>
                @foreach($outOfStock as $index => $item)
                  <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$item->reference}}</td>
                    <td>{{$item->brand->name}}</td>
                    <td>
                      <button type="button" rel="tooltip" title="Modifier" class="btn btn-primary btn-link btn-sm">
                        <a style="color: orange;" href="{{route('outOfStock',['id'=> $item->id])}}">
                          <i class="material-icons">edit</i>
                        </a>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                  
                  <div class="pagination">
                    {{ $outOfStock->links()}}
                  </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12"></div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
  (function() {
    var elem = document.getElementById("search");
    elem.remove();
    var page = location.search.split('page=')[1];
console.log(page);
    if (page != undefined) {
      window.location.hash = 'outOfStock';
    }
  })();
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush