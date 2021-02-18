@extends('layout.guest.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="clearfix text-center">            
                <h3 class="mb-4">An email has been sent to your email containing your copy of the service report</h3>
                <p class="text-muted">
                    Thank you for doing business with us. Can you take a couple of minutes to leave a feedback about your experience with us? 
                    Just go to this <a href="https://form.jotform.me/83401151973453?companyName=@if(session('serviceReport')) {{ session('serviceReport')->customer->name }} @endif" 
                    target="_blank">page</a>. Thanks for your help!
                </p>
            </div>
        </div>
    </div>
@stop