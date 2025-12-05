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
<div class="flex items-center">
    <a href="{{ route('materi.user.index') }}">
        <svg class="text-[#395670]" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M16.62 2.99a1.25 1.25 0 0 0-1.77 0L6.54 11.3a.996.996 0 0 0 0 1.41l8.31 8.31c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.38 12l7.25-7.25c.48-.48.48-1.28-.01-1.76"/></svg>
    </a>
    <div class="text-3xl font-bold text-[#395670] px-3">{{ $data->title }}</div>
</div>

{{-- Materi --}}
<div class="flex justify-between mt-14 items-center">
    <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3">Materi</div>
    <div class="flex justify-end md:-me-20">
        <img src="{{ asset('images/pattern-right.png') }}" alt="pattern-right" class="w-[50%] md:w-[70%]">
    </div>
</div>

<div class="mt-5 md:pe-10">
    {!! $data->body !!}
</div>

{{-- Video --}}
<div class="border-s-4
 border-[#395670] text-3xl font-bold text-[#395670] px-3 mt-14">Video</div>

<?php
    $video_link = explode('/', $data->video_link);
    $youtube_link = null;
    if(count($video_link) >= 3) {
        $video_link = explode('?',$video_link[3]);
        $video_link = $video_link[0];
        $youtube_link = 'https://www.youtube.com/embed/' . $video_link;
    }
?>
<div class="mt-5">
@if($youtube_link != null)
    <iframe class="w-full md:w-[60vw] h-[26vh] md:h-[70vh] rounded-xl" src="{{ $youtube_link }}" frameborder="0" allowfullscreen></iframe>
@else
    <p>Video tidak tersedia</p>
@endif
</div>

{{-- Soal --}}
<div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3 mt-14">Soal</div>

<div class="flex mt-5 text-[#395670] gap-2 font-bold">
    <svg class="text-[#395670]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.998 16h4m-4-5h8M7.5 3.5c-1.556.047-2.483.22-3.125.862c-.879.88-.879 2.295-.879 5.126v6.506c0 2.832 0 4.247.879 5.127C5.253 22 6.668 22 9.496 22h5c2.829 0 4.243 0 5.121-.88c.88-.879.88-2.294.88-5.126V9.488c0-2.83 0-4.246-.88-5.126c-.641-.642-1.569-.815-3.125-.862"/><path d="M7.496 3.75c0-.966.784-1.75 1.75-1.75h5.5a1.75 1.75 0 1 1 0 3.5h-5.5a1.75 1.75 0 0 1-1.75-1.75"/></g></svg>
    <p>Jumlah Soal : {{ $data->total_assesment }} / {{ $data->score }}</p>
</div>

<div class="flex mt-5 text-[#395670] gap-2 font-bold">
    <svg class="text-[#395670]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M5.5 1a1.5 1.5 0 0 0-1.42 1.02c-.629.034-1.07.113-1.44.303a3.02 3.02 0 0 0-1.31 1.31c-.327.642-.327 1.48-.327 3.16v4.4c0 1.68 0 2.52.327 3.16a3.02 3.02 0 0 0 1.31 1.31c.642.327 1.48.327 3.16.327h2.54a5.6 5.6 0 0 1-1.08-1H5.8c-.857 0-1.44 0-1.89-.037c-.438-.036-.663-.101-.819-.18a2 2 0 0 1-.874-.874c-.08-.156-.145-.381-.18-.82c-.037-.45-.038-1.03-.038-1.89v-4.4c0-.856.001-1.44.038-1.89c.036-.437.101-.662.18-.818c.192-.376.498-.682.874-.874c.156-.08.381-.145.819-.18l.089-.007v.469a1.5 1.5 0 0 0 1.5 1.5h5a1.5 1.5 0 0 0 1.5-1.5v-.47l.089.008c.438.035.663.1.819.18c.376.192.682.498.874.874c.08.156.145.38.18.819c.034.414.037.94.038 1.69q.538.276 1 .657V6.79c0-1.68 0-2.52-.327-3.16a3 3 0 0 0-1.31-1.31c-.372-.19-.81-.27-1.44-.303a1.5 1.5 0 0 0-1.42-1.02h-.268c-.346-.598-.992-1-1.73-1h-1c-.74 0-1.39.402-1.73 1h-.268zm.989.75a.5.5 0 0 1-.433.25H5.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-.556a.5.5 0 0 1-.433-.25l-.144-.25A1 1 0 0 0 8.5.999h-1a1 1 0 0 0-.867.501z" clip-rule="evenodd"/><path fill="currentColor" d="M12 9.5a.5.5 0 0 0-1 0v2a.5.5 0 0 0 .5.5H13a.5.5 0 0 0 0-1h-1z"/><path fill="currentColor" fill-rule="evenodd" d="M11.5 16c2.49 0 4.5-2.01 4.5-4.5S13.99 7 11.5 7S7 9.01 7 11.5S9.01 16 11.5 16m0-1c1.93 0 3.5-1.57 3.5-3.5S13.43 8 11.5 8S8 9.57 8 11.5S9.57 15 11.5 15" clip-rule="evenodd"/></svg>
    <p>Waktu Per Soal : {{ $data->time_limit }} Menit</p>
</div>

<div class="flex justify-center mt-5 @if($data->question_file_path == null || ($data->one_time_work == 1  && $assesment_work == true)) hidden @endif">
    <a href="{{ route('materi.user.assesment', $data->id) }}" class="flex items-center text-center px-20 py-2 font-semibold rounded text text-white bg-[#FFB84C]">MULAI KUIS</a>
</div>

<div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3 mt-14">Hasil</div>
<div class="overflow-x-scroll mt-5">
    <table id="dataTable" class="table-auto w-full">
        <thead>
            <tr>
                <td class="text-start">No</td>
                <td class="text-start">Waktu</td>
                <td class="text-start">Score</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_assesments as $user_assesment)
            <tr>
                <td class="text-start">{{ $loop->iteration }}</td>
                <td class="text-start">{{ $user_assesment->created_at->diffForHumans() }}</td>
                <td class="text-start">{{ $user_assesment->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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