<div class="form-inline ss-wrapper">
<span>Share:</span>&nbsp;
    {!! Share::currentPage()
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->reddit()
        ->telegram()
    !!}
</div>
