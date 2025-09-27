<x-layout>

    <div class="mt-8">
        <form action="" class="flex">
            <div class="items-center flex max-w-min">
                <x-square/>
            </div>
            <x-input>Suche</x-input>
        </form>
    </div>


    <div class="grid lg:grid-cols-3 gap-8 mt-19"> {{-- last blog post--}}
        <x-post-Card></x-post-Card>
        <x-post-Card></x-post-Card>
        <x-post-Card></x-post-Card>
    </div>

    <x-slide></x-slide>



</x-layout>
