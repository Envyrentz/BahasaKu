@extends('layouts.main')

@section('content')
    <div class="md:hidden">
        {{-- <iframe autoplay class="w-full h-[20vh] md:h-full rounded-md" src="https://www.youtube.com/embed/lTRiuFIWV54?si=NIkymCzPiKU3_3n9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
        <div class="w-full h-[20vh] md:h-full rounded-md flex justify-center items-end p-5" style="background-image: url('{{ asset('images/lofi.png') }}'); background-size: cover; background-position: center;">
            <audio controls>
                <source src="{{ asset('audio/lofi-post-bloom.mp3') }}" type="audio/mpeg">
                Browser kamu tidak mendukung audio tag.
            </audio>
        </div>
    </div>
    <p class="md:hidden text-3xl font-semibold mt-8 mb-3">Soal</p>
    <div class="flex w-full">
        <form id="form" action="{{ route('materi.user.submit', $id) }}" method="POST" class="md:basis-3/5 w-full ">
            @csrf
            <div class="flex gap-3 items-center font-semibold text-3xl">
                <div><span id="soal-number">1</span> / {{ $total }}</div>
                <svg class="font-bold" xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 25">
                <path fill="currentColor" d="M7.75 1a.75.75 0 0 1 .75.75v25.5a.75.75 0 0 1-1.5 0V1.75A.75.75 0 0 1 7.75 1"/>
                </svg>
                <div id="time"></div>
            </div>

            @for ($i = 1; $i <= $total; $i++)
            <div id="{{ 'soal'.$i }}" class="mt-7 @if($i !=1) hidden @endif">
                <div class="text-3xl ">
                    {{ $datas->soal->{$i}->soal }}
                </div>
    
                <div class="mt-20 grid grid-cols-2 gap-3 text-xl">
                    <label>
                        <input type="radio" name="{{ 'answer'.$i}}" value="A">
                        A. {{ $datas->soal->{$i}->A }}
                    </label>
                    <label>
                        <input type="radio" name="{{ 'answer'.$i}}" value="C">
                        C. {{ $datas->soal->{$i}->C }}
                    </label>
                    <label>
                        <input type="radio" name="{{ 'answer'.$i}}" value="B">
                        B. {{ $datas->soal->{$i}->B }}
                    </label>
                    <label>
                        <input type="radio" name="{{ 'answer'.$i}}" value="D">
                        D. {{ $datas->soal->{$i}->D }}
                    </label>
                </div>
            </div>    
            @endfor


            <div class="flex gap-3 mt-20">
                <button id="before-button" type="button" onclick="before()" class="hidden border border-[#395670] rounded-lg md:rounded px-3 md:px-7 py-2">Sebelumnya</button >
                <button id="next-button" type="button" onclick="next()" class="border border-[#395670] rounded-lg md:rounded px-3 md:px-7 py-2">Selanjutnya</button >
                <button id="submit-button" type="submit" onclick="next()" class="hidden bg-[#395670] text-white rounded-lg md:rounded px-3 md:px-7 py-2">Kirim</button >
            </div>

        </form>

        {{-- Gambar --}}
        <div class="hidden md:block md:basis-2/5">
            {{-- <iframe allow="autoplay; encrypted-media"  class="w-full md:h-full rounded-md" src="https://www.youtube.com/embed/lTRiuFIWV54?si=NIkymCzPiKU3_3n9&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
            <div class="w-full md:h-full rounded-md flex justify-center items-end p-5" style="background-image: url('{{ asset('images/lofi.png') }}'); background-size: cover; background-position: center;">
                <audio controls>
                    <source src="{{ asset('audio/lofi-post-bloom.mp3') }}" type="audio/mpeg">
                    Browser kamu tidak mendukung audio tag.
                </audio>
            </div>
            
        </div>
    </div>


    <script>
        const total = "<?php echo((int)$total); ?>"
        let time = "<?php echo((int)$datas->time); ?>" * 60
        let form = $('#form')
        let leaveTime = 0
        let soalNumber = $('#soal-number')
        let beforeButton = $('#before-button')
        let nextButton = $('#next-button')
        let submitButton = $('#submit-button')
        let i = 1

        const next = function () {
            if(i < total) {
                beforeButton.removeClass('hidden')
                submitButton.addClass('hidden')
                const j = i+1
                soalNumber.html(j)
                $('#soal' + i).toggleClass('hidden')
                $('#soal' + j).toggleClass('hidden')
                i = j
            }
            if (i == total) {
                nextButton.addClass('hidden')
                submitButton.removeClass('hidden')
            }
        }

        const before = function () {
           if(i > 1) {
                nextButton.removeClass('hidden')
                submitButton.addClass('hidden')
                const j = i-1
                soalNumber.html(j)
                $('#soal' + i).toggleClass('hidden')
                $('#soal' + j).toggleClass('hidden')
                i = j
            }
            
            if (i == 1) {
                beforeButton.addClass('hidden')
            }
        }

        let countdown = setInterval(function() {
            // Hitung menit dan detik
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;

            // Format ke 2 digit
            let formattedTime = 
                (minutes < 10 ? "0" + minutes : minutes) + ":" + 
                (seconds < 10 ? "0" + seconds : seconds);

            $('#time').text(formattedTime);

            time--;

            if (time < 0) {
                clearInterval(countdown);
                $('#countdown').text("Selesai!");
                form.submit()
            }
        }, 1000);

        let isSubmitting = false;
        window.onbeforeunload = function(e) {
            if (!isSubmitting) {
                e.preventDefault();
                return "Data belum dikirim. Yakin ingin keluar?";
            }
        };

        $('#form').on('submit', function(e) {
            isSubmitting = true;
            window.onbeforeunload = null;
        });

        window.onblur = function(e) {
            leaveTime = leaveTime + 1;

            if(leaveTime > 1) {
                form.submit()
            }

            alert('Hayo kamu ketahuan meninggalkan tab, satu kali lagi maka ulangan akan dikirim otomatis yaa');

        };
        
    </script>
@endsection