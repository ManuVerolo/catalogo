<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <article class="w-full h-80 bg-cover bg-center" style="background-image: url(@if($product->image) {{Storage::url($product->image->url)}} @else https://cdn.pixabay.com/photo/2018/01/04/15/51/404-error-3060993_960_720.png @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1>
                            <a href="{{ route('products.show', $product)}}" class="text-4xl text-white leading-8 font-bold">
                                {{$product->name}}
                            </a>
                            <br><br>
                            <div class="inline-block px-3 h-6 bg-gray-600 text-white rounded-full">
                               ${{$product->precio}}
                            </div>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>