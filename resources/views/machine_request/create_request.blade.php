@extends('layout.master')

@section('content')
<div class="card-header">Machine Request Menu</div>
<div class="card-body">
    <ul class="nav nav-tabs" id="myTab1" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab"
                aria-controls="home" aria-selected="true">Create Request</a></li>
        <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#" role="tab"
                aria-controls="profile" aria-selected="false">Pending</a></li>
        <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#" role="tab"
                aria-controls="contact" aria-selected="false">Completed</a></li>
    </ul>
    <div class="tab-content mt-3" id="myTab1Content">
        <form action="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
