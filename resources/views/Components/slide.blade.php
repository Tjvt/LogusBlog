@php
    $images = collect(range(1, 50))->map(fn($i) => "https://picsum.photos/120/120?random=$i");
@endphp

<style>
    .slider-track {
        display: flex;
        width: max-content;
        animation: scroll 200s linear infinite;
        will-change: transform;
    }

    @keyframes scroll {
        from { transform: translate3d(0, 0, 0); }
        to   { transform: translate3d(-50%, 0, 0); }
    }
</style>

<div class="mt-24 relative overflow-hidden group w-24/25 mx-auto rounded-4xl h-min" style="background:#060606;">
    <h1 class="text-center mb-8 text-2xl font-semibold group-hover:text-3xl group-hover:font-bold group-hover:my-6 duration-500 scroll-m-12 ease-in text-white">
        Infinity Slide
    </h1>

    {{-- Gradient Overlays für Fade-Effekt --}}
    <div class="pointer-events-none absolute top-0 left-0 w-32 h-full z-10"
         style="background: linear-gradient(to right, #060606 0%, transparent 100%);"></div>
    <div class="pointer-events-none absolute top-0 right-0 w-32 h-full z-10"
         style="background: linear-gradient(to left, #060606 0%, transparent 100%);"></div>

    <div class="slider-track group-hover:mt-16 group-hover:gap-12 duration-1500">
        {{-- erster Satz Bilder --}}
        @foreach($images as $image)
            <img src="{{ $image }}" alt="" class="rounded-xl mx-6 my-4 group-hover:scale-125 duration-1500 ease-out">
        @endforeach

        {{-- zweiter Satz Bilder --}}
        @foreach($images as $image)
            <img src="{{ $image }}" alt="" class="rounded-xl mx-6 my-4 group-hover:scale-125 duration-1500 ease-out">
        @endforeach
    </div>
</div>
