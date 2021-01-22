@extends('layout.master')

@section('content')
  <div class="card-header">Traffic & Sales</div>
  <div class="card-body">
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus repellendus hic officiis ducimus, 
      laborum deserunt quos vitae soluta incidunt veritatis! Fugiat voluptatem magnam aut. Eaque accusantium 
      adipisci suscipit fugit ipsa?</p>
  </div>
  <div class="card-body row">
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-primary">
        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="text-value-lg">9.823</div>
            <div>Members online</div>
          </div>
          <div class="btn-group">
            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="c-icon">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart1" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-info">
        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="text-value-lg">9.823</div>
            <div>Members online</div>
          </div>
          <div class="btn-group">
            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="c-icon">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart2" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-warning">
        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="text-value-lg">9.823</div>
            <div>Members online</div>
          </div>
          <div class="btn-group">
            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="c-icon">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3" style="height:70px;">
          <canvas class="chart" id="card-chart3" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-danger">
        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="text-value-lg">9.823</div>
            <div>Members online</div>
          </div>
          <div class="btn-group">
            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="c-icon">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
      </div>
    </div>
  </div>
@stop