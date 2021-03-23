@if($message = Session::get('info'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong><label>Note :</label></strong> <label>{{ $message }}</label>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong><label>{{ __('label.error') }}:</label></strong> <label>{{ $message }}</label>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong><label>{{ __('label.success') }}:</label></strong> <label>{{ $message }}</label>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong><label>{{ __('label.error') }}:</label></strong> <label>{{ $message }}</label>
</div>
@endif