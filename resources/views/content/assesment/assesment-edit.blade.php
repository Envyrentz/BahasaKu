@extends('layouts.main')

@section('content')
    <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3">Edit Soal</div>
    <div class="my-7 md:my-10">
        @if($errors->any())
        <div id="error-alert" class="bg-red-400 py-2 my-5 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
            <p>{{  $errors->first() }}</p>
            <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
        </div>
        @endif
    </div>
    <form action="{{ route('assesment.update', $content_id) }}" method="POST" enctype="multipart/form-data" class="w-full py-7">
        @csrf
        @method('PUT')
        <div class="md:flex md:gap-5">
            <div class="flex flex-col w-[10rem]">
                <label for="one_time_work">Satu kali pengerjaan</label>
                <select name="one_time_work" id="one_time_work" class="rounded border border-gray-400 mt-1" required>
                    <option value="1" @if ($assesments->one_time_work == '1') selected @endif >Ya</option>
                    <option value="0" @if ($assesments->one_time_work == '0') selected @endif >Tidak</option>
                </select>
            </div>
            <div class="flex flex-col w-[5rem] mt-2 md:mt-0">
                <label for="score">Nilai</label>
                <input type="number" name="score" id="score" class="rounded border border-gray-400 mt-1" value="{{ old('score', $assesments->score) }}" required>
            </div>
            <div class="flex flex-col w-[12rem] mt-2 md:mt-0">
                <label for="time">Waktu pengerjaan (menit)</label>
                <input type="number" name="time" id="time" class="rounded border border-gray-400 mt-1" value="{{ old('score', $assesments->time) }}" required>
            </div>
        </div>
        <div class="flex">
            <div id="container-assesment" class="flex flex-col gap-5 pe-5 w-full">
                @for ($i = 1; $i <= $assesmentTotal; $i++)
                <div id="pertanyaan{{$i}}" class="w-full mt-3">
                    <div class="flex flex-col">
                        <div class="flex gap-3 my-2 items-center">
                            <label for="soal{{$i}}" class="text-[#395670] font-bold">Pertanyaan {{$i}}</label>
                        </div>
                        <input type="text" name="soal{{$i}}" id="soal{{$i}}" value="{{ old('soal'.$i, $assesments->soal->{$i}->soal) }}" class="rounded" required>
                    </div>
                    <div class="grid grid-cols-2 mt-3 gap-5">
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="A{{$i}}" class="text-[#395670] font-bold">A.</label>
                            <input type="text" name="A{{$i}}" id="A{{$i}}" value="{{ old('soal'.$i, $assesments->soal->{$i}->A) }}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="C{{$i}}" class="text-[#395670] font-bold">C.</label>
                            <input type="text" name="C{{$i}}" id="C{{$i}}" value="{{ old('soal'.$i, $assesments->soal->{$i}->C) }}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="B{{$i}}" class="text-[#395670] font-bold">B.</label>
                            <input type="text" name="B{{$i}}" id="B{{$i}}" value="{{ old('soal'.$i, $assesments->soal->{$i}->B) }}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="D{{$i}}" class="text-[#395670] font-bold">D.</label>
                            <input type="text" name="D{{$i}}" id="D{{$i}}" value="{{ old('soal'.$i, $assesments->soal->{$i}->D) }}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="key{{$i}}" class="text-[#395670]">Kunci Jawaban:</label>
                        <select name="key{{$i}}" id="key{{$i}}" value="{{ old('soal'.$i, $assesments->soal->{$i}->key) }}" class="rounded text-[#395670]">
                            <option value="A" @if ($assesments->soal->{$i}->key == 'A') selected @endif >A</option>
                            <option value="B" @if ($assesments->soal->{$i}->key == 'B') selected @endif >B</option>
                            <option value="C" @if ($assesments->soal->{$i}->key == 'C') selected @endif >C</option>
                            <option value="D" @if ($assesments->soal->{$i}->key == 'D') selected @endif >D</option>
                        </select>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="md:px-5">
            <button type="button" onclick="addChild()" class="mt-10 text-center border border-gray-500 py-2 rounded flex justify-center items-center gap-2 text-[#555050] font-semibold w-full">
                <svg class="text-[#555050]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z"/></g></svg>
                <p>Tambah Pertanyaan</p>
            </button type="button">
        </div>

        <div class="mt-7 flex justify-end md:px-5 gap-3 md:gap-5 font-semibold w-full">
            <a href="{{ route('materi.show', $content_id) }}" class="py-2 px-5 border border-[#555050] rounded-lg">Batal</a>
            <button type="submit" class="bg-[#C7F7D9] py-2 px-5 rounded-lg text-[#007B06] border border-[#007B06]">Simpan</button>
        </div>
    </form>

    <script>
        const closeError = $("#close-error")
        const errorAlert = $("#error-alert")
        const containerAssesment = $('#container-assesment')
        let pertanyaan = parseInt("<?php echo($assesmentTotal) ?>")

        console.log(pertanyaan)

        closeError.on('click', function(event) {
            errorAlert.removeClass('flex').addClass('hidden')
        })

        const deleteAssesment = function(no) {
            pertanyaan = pertanyaan - 1
            $('#pertanyaan'+no).remove()
        }

        const addChild = function () {
            pertanyaan = pertanyaan + 1

            return containerAssesment.append(`
                <div id="pertanyaan${pertanyaan}" class="w-full mt-3">
                    <div class="flex flex-col">
                        <div class="flex gap-3 my-2 items-center">
                            <label for="soal${pertanyaan}" class="text-[#395670] font-bold">Pertanyaan ${pertanyaan}</label>
                            </button>
                        </div>
                        <input type="text" name="soal${pertanyaan}" id="soal${pertanyaan}" class="rounded" required>
                    </div>
                    <div class="grid grid-cols-2 mt-3 gap-5">
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="A${pertanyaan}" class="text-[#395670] font-bold">A.</label>
                            <input type="text" name="A${pertanyaan}" id="A${pertanyaan}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="C${pertanyaan}" class="text-[#395670] font-bold">C.</label>
                            <input type="text" name="C${pertanyaan}" id="C${pertanyaan}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="B${pertanyaan}" class="text-[#395670] font-bold">B.</label>
                            <input type="text" name="B${pertanyaan}" id="B${pertanyaan}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                        <div class="w-full border border-gray-500 px-2 rounded">
                            <label for="D${pertanyaan}" class="text-[#395670] font-bold">D.</label>
                            <input type="text" name="D${pertanyaan}" id="D${pertanyaan}" class="rounded w-[80%] md:w-[90%] border-0" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="key${pertanyaan}" class="text-[#395670]">Kunci Jawaban:</label>
                        <select name="key${pertanyaan}" id="key${pertanyaan}" class="rounded text-[#395670]">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            `)
        }
    </script>
@endsection
