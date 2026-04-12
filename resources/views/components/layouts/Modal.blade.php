@if ($errors->any() || session('status'))
    <div class="contendor__alerts bg-transparent fixed top-24 right-0 flex flex-col items-end">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div data-id="contenedor__alert"
                    class="contenedor__alert bg-white h-fit w-fit mt-3 rounded-tl-2xl rounded-bl-2xl overflow-hidden opacity-0">
                    <div data-id="alert" class="alert text-red-600 p-4 text-xl">{{ $error }}</div>
                    <div data-id="loading" class="loading w-full h-[3px] bg-gray-500">
                        <span data-id="loader" class="loader block h-full w-0 bg-blue-700"></span>
                    </div>
                </div>
            @endforeach
        @endif

        @if (session('status'))
        <div data-id="contenedor__alert"
        class="contenedor__alert bg-white h-fit w-fit mt-3 rounded-tl-2xl rounded-bl-2xl overflow-hidden opacity-0">
        <div data-id="alert" class="alert p-4 text-xl">{{ session('status') }}</div>
        <div data-id="loading" class="loading w-full h-[3px] bg-gray-500">
            <span data-id="loader" class="loader block h-full w-0 bg-blue-700"></span>
        </div>
    </div>
        @endif
    </div>
@endif
