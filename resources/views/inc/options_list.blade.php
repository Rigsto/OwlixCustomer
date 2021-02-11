<option>-- Pilih {{$name}} --</option>
@if(!empty($xs))
    @foreach($xs as $key => $x)
        <option value="{{ $key }}">{{ $x }}</option>
    @endforeach
@endif
