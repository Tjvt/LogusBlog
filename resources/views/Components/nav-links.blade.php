{{-- resources/views/components/nav-links.blade.php --}}
@props(['href' => '#', 'active' => false])

<a href="{{ $href }}"
   class="relative hover:text-purple-400 transition-colors duration-300 group
          {{ $active ? 'text-purple-400' : 'text-white' }}">

    {{ $slot }}

    {{-- Active Indicator --}}
    @if($active)
        <div class="absolute -bottom-2 left-0 right-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full"></div>
    @else
        <div class="absolute -bottom-2 left-0 right-0 h-0.5 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
    @endif
</a>
