@if(session()->has('messageDanger'))
    <center>
        <div class="alert alert-danger" role="alert">
            {{ session()->get('messageDanger') }}
        </div>
    </center>
@endif
@if(session()->has('messageSuccess'))
    <center>
        <div class="alert alert-success" role="alert">
            {{ session()->get('messageSuccess') }}
        </div>
    </center>
@endif