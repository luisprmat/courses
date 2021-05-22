@props(['courses'])

<div {{ $attributes->merge(['class' => 'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8']) }}>
    @foreach ($courses as $course)
        <x-course-card :course="$course" />
    @endforeach
</div>
