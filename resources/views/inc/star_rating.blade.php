@php
$i = 0;
@endphp
@for(; $i<$star_count; $i++)
<span class="fa fa-star checked"></span>
@endfor
@for(; $i<5; $i++)
<span class="fa fa-star"></span>
@endfor
<span class="ml-2">{{ $rating_count }}</span>
