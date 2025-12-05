@extends('layouts.main')

@section('content')
    <div class="flex justify-between items-center">
        <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3">Materi</div>
        <div class="flex justify-end md:-me-20">
            <img src="{{ asset('images/pattern-right.png') }}" alt="pattern-right" class="w-[50%] md:w-[70%]">
        </div>
    </div>

    @if (session('success'))
    <div id="error-alert" class="bg-green-500 mt-10 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
        <p>{{ session('success') }}</p>
        <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
    </div>
    @endif
    @if (session('failed'))
    <div id="error-alert" class="bg-red-400 mt-10 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
        <p>{{ session('failed') }}</p>
        <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
    </div>
    @endif
    @if($errors->any())
    <div id="error-alert" class="bg-red-400 mt-10 py-1 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
        <p>{{  $errors->first() }}</p>
        <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
    </div>
    @endif

    <form action="{{ route('materi.user.add') }}" method="POST" class="flex gap-3 mt-10 md:pe-20 ">
        @csrf
        <input type="text" name="code" id="code" class="w-full rounded-xl" required>
        <button type="submit" class="rounded-xl bg-[#395670] px-3 py-2 text-white font-semibold">Tambah</button>
    </form>

    <div class="grid grid-cols-2 mt-10 gap-5 md:gap-20 md:pe-20 text-[#395670]">
        @foreach ($datas as $data)
        <div class="p-0 rounded-xl border-2 pb-3 shadow-lg shadow-gray-400">
            <img src="{{ asset('storage/materi/thumbnail/'.$data->thumbnail_path) }}" class="rounded-t-xl">
            <p class="font-bold text-lg capitalize mt-1 px-3">{{ $data->title }}</p>
            <div class="flex justify-end px-3">
                <a href="{{ route('materi.user.show', $data->id) }}" class="bg-[#395670] text-white text-center font-bold rounded-lg text-xs md:text-base px-3 py-1 md:py-1">
                    Buka Materi
                </a>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="mt-14"></div>

    <script>
        const closeError = $("#close-error")
        const errorAlert = $("#error-alert")

        closeError.on('click', function(event) {
            errorAlert.removeClass('flex').addClass('hidden')
        })
    </script>
@endsection
