<div class="mb-4">
    {!! Form::label('title', 'Título del curso:') !!}
    {!! Form::text('title', null, ['class' => ($errors->has('title') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
    @error('title')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso:') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly' ,'class' => ($errors->has('slug') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
    @error('slug')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo del curso:') !!}
    {!! Form::text('subtitle', null, ['class' => ($errors->has('subtitle') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
    @error('subtitle')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso:') !!}
    {!! Form::textarea('description', null, ['class' => ($errors->has('description') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
    @error('description')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => ($errors->has('category_id') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
        @error('category_id')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>

    <div>
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => ($errors->has('level_id') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
        @error('level_id')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>

    <div>
        {!! Form::label('price_id', 'Precios:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => ($errors->has('price_id') ? 'form-input-error' : 'form-input').' block w-full mt-1']) !!}
        @error('price_id')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ asset('img/cursos/default.jpg') }}" alt="Nuevo curso">
        @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae corrupti qui pariatur quas eius cupiditate vel necessitatibus? Soluta sint facere dolor eligendi provident delectus, molestias maiores, quibusdam accusamus excepturi officiis!</p>
        {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file']) !!}
    </div>
</div>
