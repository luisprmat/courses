<div>
    <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-6 container py-8">
        <div class="md:col-span-2 lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-500 text-3xl font-bold">Detalle de su compra</p>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="text-xl font-semibold text-gray-700">Curso</p>
                </div>
                <div class="card-body sm:flex sm:items-center">
                    <div class="flex items-center mb-4 sm:m-0">
                        <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                        <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                    </div>
                    <p class="text-xl font-bold sm:ml-auto"> US$ {{ $course->price->value }}</p>
                </div>
                <div class="card-body">
                    <hr>
                    <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio molestias, excepturi sit ullam consectetur pariatur nostrum iure nesciunt molestiae, consequatur quidem repellendus nihil quas voluptatem non eum ut cupiditate reiciendis! <a class="text-red-500 font-bold" href="">Términos y condiciones</a></p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
                <div class="lg:flex lg:justify-between lg:items-center mb-4">
                    <img class="h-8" src="{{ asset('img/cursos/medios-de-pago.png') }}" alt="Medios de pago">
                    <div class="text-gray-700 mt-4 lg:m-0">
                        <p class="text-lg font-semibold uppercase">Pago Total: <span class="font-bold">US$ {{ $course->price->value }}</span></p>
                    </div>
                </div>

                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>

        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{ $course->price->value }}"
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        Livewire.emit('buyCourse', details)
                        // console.log(details)
                        // alert('Transaction completed by ' + details.payer.name.given_name);
                    });
                }
            }).render('#paypal-button-container'); // Display payment options on your web page
        </script>
    @endpush
</div>
