@props(['row_number', 'class' => ''])
<td
    class="
    p-4 text-sm font-normal
    {{
      $row_number % 2 === 0
        ? 'text-white whitespace-nowrap'
        : 'whitespace-nowrap text-gray-400'
    }}
    {{ $class }}
    "
>
    {{ $slot }}
</td>
