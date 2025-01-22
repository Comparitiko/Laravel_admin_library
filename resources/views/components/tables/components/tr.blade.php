@props(['row_number' => 1])

<tr class="{{ $row_number % 2 === 0 ? 'bg-gray-50 dark:bg-gray-700' : '' }}">
    {{ $slot }}
</tr>
