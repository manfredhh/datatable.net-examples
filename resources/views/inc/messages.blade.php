@if ( session('message') )
    <div class="btn btn-block btn-success">
        {!! session()->get('message') !!}
    </div>
@endif
