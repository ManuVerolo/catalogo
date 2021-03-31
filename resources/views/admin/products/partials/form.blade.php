<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto...']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
    <br>
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Precio del producto...']) !!}
    @error('precio')
        <small class="text-danger">{{$message}}</small>
    @enderror
    <br>
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del producto...', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
    <br>
    <div class="form-group">
        {!! Form::label('category_id', 'categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
    <div class="row mb-3">
        <div class="col">
            <div class="image-wrapper">
                @isset ($product->image)
                    <img id="picture" src="{{Storage::url($product->image->url)}}" alt="">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2018/01/04/15/51/404-error-3060993_960_720.png" alt="">
                @endisset
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'Imagen del producto') !!}
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                @error('file')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <p>Indicaciones de imagen a subir (tamaño, colores, etc.)</p>
            </div>
        </div>
    </div>
    <div class="form-group">
         <p class="font-weight-bold">Estado</p>
         <label>
             {!! Form::radio('status', 1, true) !!}
             Activo
         </label>
         <label>
            {!! Form::radio('status', 2) !!}
            Inactivo
        </label>
        @error('status')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>