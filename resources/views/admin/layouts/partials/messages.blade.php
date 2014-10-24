<div id="flash-messages">
    @if (Session::has('msg-danger'))

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Error: </strong> {{ Session::get('msg-danger') }}
    </div>

    @elseif (Session::has('msg-warning'))

    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Warning: </strong> {{ Session::get('msg-warning') }}
    </div>

    @elseif (Session::has('msg-info'))

    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Info: </strong> {{ Session::get('msg-info') }}
    </div>

    @elseif (Session::has('msg-success'))

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Success: </strong> {{ Session::get('msg-success') }}
    </div>

    @endif
</div>