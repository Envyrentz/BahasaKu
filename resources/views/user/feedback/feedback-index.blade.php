@extends('layouts.main')

@section('content')
    @if (session('success'))
    <div id="error-alert" class="bg-green-500 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold mb-3">
        <p>{{  session('success') }}</p>
        <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
    </div>
    @endif
    @if($errors->any())
    <div id="error-alert" class="bg-red-400 py-1 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold mb-3">
        <p>{{  $errors->first() }}</p>
        <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
    </div>
    @endif
    <div class="flex justify-between items-center">
        <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3">Masukan</div>
        <div class="flex justify-end -me-6 md:-me-20">
            <img src="{{ asset('images/pattern-right.png') }}" alt="pattern-right" class="w-[70%]">
        </div>
    </div>

    <form action="{{ route('masukan.user.store') }}" method="POST" class="flex justify-center items-center h-[70vh] text-[#395670] font-bold">
        @csrf
        <div class="w-[93vw] md:w-[60vw] shadow-lg shadow-gray-400 p-9 rounded-lg">
            <div class="flex flex-col mt-3">
                <label for="body">Pesan Masukan</label>
                <textarea name="body" id="body" cols="30" rows="4" class="rounded border border-[#395670]"></textarea>
            </div>
            <div class="flex justify-center items-center mt-7">
                <button type="submit" class="bg-[#247BA0] text-white text-sm rounded font-semibold py-2 px-20">KIRIM</button>
            </div>
        </div>
    </div>

    <script>
        const closeError = $("#close-error")
        const errorAlert = $("#error-alert")

        closeError.on('click', function(event) {
            errorAlert.removeClass('flex').addClass('hidden')
        })
    </script>
@endsection
