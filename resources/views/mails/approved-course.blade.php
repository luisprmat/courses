@component('mail::message')
# Felicitaciones

### Profesor *{{ $course->teacher->name }}*

Para **Course Coders** es un placer informarle que su curso
@component('mail::panel')
**{{ $course->title }}**
@endcomponent
ha sido aprobado y publicado.

@component('mail::button', ['url' => route('courses.show', $course)])
Ver curso
@endcomponent

Gracias,<br>
**Equipo Course Coders**
@endcomponent
