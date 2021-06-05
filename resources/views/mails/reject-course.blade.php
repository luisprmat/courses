@component('mail::message')
# Atención

### Profesor *{{ $course->teacher->name }}*

Una vez que nuestro equipo **Course Coders** revisó su curso
@component('mail::panel')
**{{ $course->title }}**
@endcomponent
determinó que este fue rechazado para su publicación por los siguientes motivos:

@component('mail::panel')
{!! $course->observation->body !!}
@endcomponent

Una vez se solucionen los motivos puede volver a solicitar su revisión.

@component('mail::button', ['url' => route('instructor.courses.curriculum', $course), 'color' => 'error'])
Ver curso
@endcomponent

Gracias,<br>
**Equipo Course Coders**
@endcomponent
