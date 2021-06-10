<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class PaymentOrder extends Component
{
    public $course;

    protected $listeners = ['buyCourse'];

    public function buyCourse($details)
    {
        if($details['status'] == 'COMPLETED') {
            $this->course->students()->attach(auth()->id());

            session()->flash('flash.banner', 'Gracias por comprar nuestro curso, ¡Bienvenido!');
            session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('courses.status', $this->course);
        } else {
            session()->flash('flash.banner', '¡Hubo un problema con su pago!, intente nuevamente');
            session()->flash('flash.bannerStyle', 'danger');

            return redirect()->route('payment.checkout', $this->course);
        }
    }

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.payment-order');
    }
}
