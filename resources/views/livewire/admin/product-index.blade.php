<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Search...">
    </div>
    @if ($products->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th colspan="2"></th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>${{$product->precio}}</td>
                            <td><img class="mx-auto" width="100px" src="@if($product->image) {{Storage::url($product->image->url)}} @else https://cdn.pixabay.com/photo/2018/01/04/15/51/404-error-3060993_960_720.png @endif"></td>
                            <td with="10px">
                                <a class="btn btn-primary btn-sm"href="{{route('admin.products.edit', $product)}}">Editar</a>
                            </td>
                            <td with="10px">
                                <form action="{{route('admin.products.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$products->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No se ha encontrado ningún registro...</strong>
        </div>
    @endif
</div>
