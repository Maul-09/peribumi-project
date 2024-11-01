@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('image/logo-peribumi.png') }}" class="logo" alt="Laravel Logo"
                    style="width: 200px; height: auto;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
