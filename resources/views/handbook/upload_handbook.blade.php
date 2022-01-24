@extends('layout.master')

@section('content')
    @include('components.handbook.card_header')
    <div class="card-body">
        @include('components.handbook.nav-tabs')
        <div class="tab-content mt-3" id="uploadHandbook">
            <form action="{{ route('handbook.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="pdf_file" class="col-sm-2 col-form-label">Upload Indoctrination</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control-file" name="pdf_file" id="pdf_file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="type">
                            <option value="1">MCA Indoctrination</option>
                            <option value="2">Philippines Handbook</option>
                            <option value="3">China Handbook</option>
                        </select>
                    </div>
                  </div>
                <button class="btn btn-primary font-weight-bold mb-2" type="submit">
                    Upload
                </button>
            </form>
        </div>
    </div>
@stop