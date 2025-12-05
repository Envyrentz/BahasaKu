@extends('layouts.main')

@section('content')
    <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3">Tambah Materi</div>
    <div class="my-7 md:my-10">
        @if($errors->any())
        <div id="error-alert" class="bg-red-400 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
            <p>{{  $errors->first() }}</p>
            <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
        </div>
        @endif
    </div>
    <p class="text-[#395670] text-xl font-bold mb-3">Materi dan Video</p>
    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data" class="w-full pb-7">
        @csrf
        <div class="md:flex">
            <div class="basis-3/4 flex flex-col md:gap-5 md:pe-5">
                <div class="md:flex md:gap-10">
                    <div class="md:basis-1/2 flex flex-col mt-3 md:mt-0">
                        <label for="title" class="text-[#395670] font-bold">Nama Materi</label>
                        <input type="text" name="title" id="title" class="rounded" value="{{ old('title') }}" required>
                    </div>
                    <div class="md:basis-1/2 flex flex-col mt-3 md:mt-0">
                        <label for="video_link" class="text-[#395670] font-bold">Link Video</label>
                        <input type="text" name="video_link" id="video_link" class="rounded" value="{{ old('video_link') }}" required>
                    </div>
                </div>
                <div class="flex flex-col mt-3 md:mt-0">
                    <label for="preview" class="text-[#395670] font-bold">Preview (Ringkasan)</label>
                    <input type="text" name="preview" id="preview" class="rounded" value="{{ old('preview') }}" maxlength="200">
                </div>
                <div class="flex flex-col mt-3 md:mt-0">
                    <label for="body" class="text-[#395670] font-bold">Isi Materi</label>
                    <input type="hidden" name="body" id="body">
                    <trix-editor input="body" required class="min-h-[25vh]">{{ old('body') }}</trix-editor>
                </div>
            </div>
    
            <div class="basis-1/4 md:px-2 mt-3 md:mt-0">
                <label for="thumbnail_path" class="text-[#395670] font-bold">Banner Materi (Tarik atau klik untuk upload file)</label>
                <input type="file" id="dropify" name="thumbnail_path" class="dropify border-2" accept="image/*"> 
            </div>
        </div>
        <div class="mt-5 flex justify-start gap-5 font-semibold w-full">
            <a href="{{ route('materi.index') }}" class="py-2 px-5 border border-[#555050] rounded-lg">Batal</a>
            <button type="submit" class="bg-[#C7F7D9] py-2 px-5 rounded-lg text-[#007B06] border border-[#007B06]">Simpan</button>
        </div>
    </form>

    <script>
        const closeError = $("#close-error")
        const errorAlert = $("#error-alert")

        closeError.on('click', function(event) {
            errorAlert.removeClass('flex').addClass('hidden')
        })
    </script>
@endsection