<input type="{{ $type ?? 'text' }}"
       placeholder="{{ $placeholder ?? $slot }}"
       name="{{ $name ?? '' }}"
       value="{{ $value ?? '' }}"
       class="bg-white/10 border-white/20 border-2 h-16 w-47/49 rounded-2xl text-white/70 text-2xl mx-auto pl-4
              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none
              transition-all duration-200 placeholder:text-white/50
              hover:bg-white/15 {{ $class ?? '' }}">
