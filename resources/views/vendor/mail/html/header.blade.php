@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/aisat.png') }}" class="logo" alt="Aisat Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
