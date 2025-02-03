<b>Page {{$data['current_page']}} Of {{$data['total_page']}}</b>
@if( $data['total_page'] > 1)
    @if($data['current_page'] > 1)
        <a href="{{url()->current()}}?page={{$data['current_page']-1}}&length={{$data['length']}}" class="btn"> <i class="nc-icon nc-minimal-left"></i> </a>
    @endif

    @if($data['total_page'] != $data['current_page'])
        <a href="{{url()->current()}}?page={{$data['current_page']+1}}&length={{$data['length']}}" class="btn"> <i class="nc-icon nc-minimal-right"></i> </a>
    @endif

@endif
