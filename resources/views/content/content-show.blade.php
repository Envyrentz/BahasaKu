@extends('layouts.main')

@section('content')
    <div class="flex items-center">
        <a href="{{ route('materi.index') }}">
            <svg class="text-[#395670]" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M16.62 2.99a1.25 1.25 0 0 0-1.77 0L6.54 11.3a.996.996 0 0 0 0 1.41l8.31 8.31c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.38 12l7.25-7.25c.48-.48.48-1.28-.01-1.76"/></svg>
        </a>
        <div class="text-3xl font-bold text-[#395670] px-3">Materi: {{ $data['title'] }}</div>
    </div>
    <div class="my-7 md:my-10">
        @if (session('success'))
        <div id="error-alert" class="bg-green-500 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
            <p>{{  session('success') }}</p>
            <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
        </div>
        @endif
        @if($errors->any())
        <div id="error-alert" class="bg-red-400 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
            <p>{{  $errors->first() }}</p>
            <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
        </div>
        @endif
    </div>
    <p class="text-[#395670] text-xl font-bold mb-3">Materi dan Video</p>
    <div class="w-full pb-7">
        <div class="md:flex">
            <div class="md:basis-3/4 flex flex-col md:gap-5 md:pe-5">
                <div class="md:flex md:gap-10">
                    <div class="md:basis-1/2 flex flex-col">
                        <label for="title" class="text-[#395670] font-bold">Nama Materi</label>
                        <input disabled type="text" name="title" id="title" class="rounded" required value="{{ old('title', $data->title) }}">
                    </div>
                    <div class="md:basis-1/2 flex flex-col mt-3 md:mt-0">
                        <label for="video_link" class="text-[#395670] font-bold">Link Video</label>
                        <input disabled type="text" name="video_link" id="video_link" class="rounded" required value="{{ old('video_link', $data->video_link) }}">
                    </div>
                </div>
                <div class="flex flex-col mt-3 md:mt-0">
                    <label for="preview" class="text-[#395670] font-bold">Preview (Ringkasan)</label>
                    <input disabled type="text" name="preview" id="preview" class="rounded" required value="{{ old('preview', $data->preview) }}">
                </div>
                <div class="flex flex-col mt-3 md:mt-0">
                    <label for="body" class="text-[#395670] font-bold">Isi Materi</label>
                    <div class="border border-[#395670]/80 rounded p-3">
                        {!! $data->body !!}
                    </div>
                </div>
            </div>
    
            <div class="basis-1/4 md:px-2 mt-3 md:mt-0">
                <label for="thumbnail_path" class="text-[#395670] font-bold">Banner Materi (Tarik file atau klik untuk upload file)</label>
                <input disabled type="file" id="dropify" name="thumbnail_path" class="dropify border-2" accept="image/*" data-default-file="{{ asset('/storage/materi/thumbnail/' . $data->thumbnail_path) }}"> 
            </div>
        </div>
    </div>

    <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3 mt-6 md:mt-10 mb-2">Soal</div>
    {{-- <div class="text-2xl font-bold text-[#395670] mt-6 md:mt-14">Soal</div> --}}

    @if ($data->question_file_path == null)
        Belum ada soal, <a href="{{ route('assesment.create', $data->id) }}" class="text-[#247BA0] underline font-semibold">Buat soal</a>
    @else
    <div class="flex gap-3">
        <a href="{{ route('assesment.edit', $data->id) }}" class="text-[#247BA0] underline font-semibold">Edit soal</a>
        <a href="{{ route('assesment.export', $data->id) }}" class="text-[#FFB84C] underline font-semibold">Export</a>
    </div>
    <div class="overflow-x-auto">
        <table id="dataTable">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Skor</th>
                    <th>Waktu Mengisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assesments as $assesment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $assesment->user->name }}</td>
                    <td class="font-semibold">{{ $assesment->score }}</td>
                    <td>{{ \Carbon\Carbon::parse($assesment->date_time)->translatedFormat('d F Y, H:i') . ' WIB'; }}</td>
                    <td class="flex gap-4 items-center">
                        <a href="{{ route('assesment.delete', [$assesment->id, $data->id]) }}" onclick="return confirm('Apakah anda yakin?')">
                            <svg class="text-[#E92222]" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zm3-4q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17"/></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <div class="my-10"></div>

    <script>
        const closeError = $("#close-error")
        const errorAlert = $("#error-alert")

        closeError.on('click', function(event) {
            errorAlert.removeClass('flex').addClass('hidden')
        })
    </script>
@endsection