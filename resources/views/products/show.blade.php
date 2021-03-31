<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-gray-600 text-center underline">{{$product->name}}</h1>
        <div class="text-lg text-gray-800 my-2 text-center">
            ${{$product->precio}}
        </div>
        <div class="mx-auto">
            @if($product->image)
                <img class="mx-auto" src="{{Storage::url($product->image->url)}}" alt="{{$product->name}}">
            @else
                <img class ="mx-auto" src="https://cdn.pixabay.com/photo/2018/01/04/15/51/404-error-3060993_960_720.png" alt="">
            @endif
        </div>
        <h1 class="text-2xl font-bold text-gray-600 my-6 mb-6 text-center underline">Más en {{$product->category->name}}</h1>
        {{--Contenido relacionado--}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($similares as $similar)
                    <a class="flex" href="{{route('products.show', $similar)}}">
                        @if ($similar->image)
                            <img class="w-45 h-30 object-cover my-4" src="{{Storage::url($similar->image->url)}}" alt="">
                        @else
                            <img class ="mx-auto"  src="https://cdn.pixabay.com/photo/2018/01/04/15/51/404-error-3060993_960_720.png" alt="">
                        @endif
                    </a>
                @endforeach
        </div>
    </div>
</x-app-layout>