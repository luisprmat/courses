<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'PUT', 'files' => true]) !!}
        @include('instructor.courses.fields')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary cursor-pointer']) !!}
        </div>
    {!! Form::close() !!}

    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
    @endpush
</x-instructor-layout>
