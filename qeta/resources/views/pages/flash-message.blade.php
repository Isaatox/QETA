@if ($message = Session::get('success'))
<div class="container mt-5">
    <div class="alert alert-success alert-block">
        <button type="button" class="btn-close" data-dismiss="alert"></button>	
            <strong>{{ $message }}</strong>
    </div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="container mt-5">
    <div class="alert alert-danger alert-block">
        <button type="button" class="btn-close" data-dismiss="alert"></button>	
            <strong>{{ $message }}</strong>
    </div>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="container mt-5">
    <div class="alert alert-warning alert-block">
        <button type="button" class="btn-close" data-dismiss="alert"></button>	
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif


@if ($message = Session::get('info'))
<div class="container mt-5">
    <div class="alert alert-info alert-block">
        <button type="button" class="btn-close" data-dismiss="alert"></button>	
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif
