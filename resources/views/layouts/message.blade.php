@if ($message = Session::get('success'))
    <div class="alert alert-success" style="padding: 5px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p style="margin-bottom:0; padding-left:10px;">{{ $message }}</p>
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger" style="padding: 5px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p  style="margin-bottom:0; padding-left:10px;">{{ Session::get('error') }}</p>
    </div>
@endif

<div class="ajax-success-response alert alert-success" style="padding: 5px; display: none;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p style="margin-bottom:0; padding-left:10px;"></p>
</div>

<div class="ajax-failed-response alert alert-danger" style="padding: 5px; display: none;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p style="margin-bottom:0; padding-left:10px;"></p>
</div>

