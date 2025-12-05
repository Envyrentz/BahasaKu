@extends('layouts.auth')

@section('content')
    <div class="flex items-center">
        <div class="md:basis-1/2"></div>
        <div class="w-full md:w-fit-content md:basis-1/2 bg-white/60 min-h-screen flex items-center justify-center">
            <div class="md:basis-1/3 h-1/2 flex flex-col items-center bg-white/65 p-9 rounded-2xl">
                <div class="text-5xl font-bold text-[#395670]">Daftar <br> Pengguna</div>
                <div class="my-4 w-full">
                    @if($errors->any())
                    <div id="error-alert" class="bg-red-400 py-1 rounded-md flex items-center justify-between w-full px-3">
                        <p class="text-white block">Daftar gagal, periksa kembali data anda</p>
                        <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
                    </div>
                    @endif
                </div>
                <form class="block pb-5 md:pb-0" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="border-b-2 border-gray-300 flex items-center">
                        <input type="text" class="border-0 inline focus:border-0 bg-white/0 rounded-md" id="name" name="name" value="{{ old('name') }}" required placeholder="Nama Pengguna">
                        <svg class="text-gray-400 flex items-center" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4s4-1.79 4-4s-1.79-4-4-4m0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4"/></svg>
                    </div>
                    @error('name')
                        <div class="text-red-600 text-sm mt-1 ps-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="border-b-2 border-gray-300 flex items-center mt-5">
                        <input type="email" class="border-0 inline focus:border-0 bg-white/0 rounded-md" id="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                        <svg class="hover:cursor-pointer text-gray-400 flex items-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 4.99L4 6zm0 12H4V8l8 5l8-5z"/></svg>
                    </div>
                    @error('email')
                        <div class="text-red-600 text-sm mt-1 ps-3">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <div class="border-b-2 border-gray-300 flex mt-5 items-center">
                        <input type="password" id="password" name="password" value="{{ old('password') }}"  class="border-0 inline bg-white/0 rounded-md" required placeholder="Kata Sandi">
                        <svg id="close-eye" class="hover:cursor-pointer text-gray-400 flex items-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 5.27L3.28 4L20 20.72L18.73 22l-3.08-3.08c-1.15.38-2.37.58-3.65.58c-5 0-9.27-3.11-11-7.5c.69-1.76 1.79-3.31 3.19-4.54zM12 9a3 3 0 0 1 3 3a3 3 0 0 1-.17 1L11 9.17A3 3 0 0 1 12 9m0-4.5c5 0 9.27 3.11 11 7.5a11.8 11.8 0 0 1-4 5.19l-1.42-1.43A9.86 9.86 0 0 0 20.82 12A9.82 9.82 0 0 0 12 6.5c-1.09 0-2.16.18-3.16.5L7.3 5.47c1.44-.62 3.03-.97 4.7-.97M3.18 12A9.82 9.82 0 0 0 12 17.5c.69 0 1.37-.07 2-.21L11.72 15A3.064 3.064 0 0 1 9 12.28L5.6 8.87c-.99.85-1.82 1.91-2.42 3.13"/></svg>
                        <svg id="open-eye" class="hover:cursor-pointer text-gray-400 items-center hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M1 12q11 16 22 0Q12-4 1 12"/></g></svg>
                    </div>
                    @error('password')
                        <div class="text-red-600 text-sm mt-1 ps-3">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="border-b-2 border-gray-300 flex mt-5 items-center">
                        <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"  class="border-0 inline bg-white/0 rounded-md" required placeholder="Konfirmasi Kata Sandi">
                        <svg id="close-eye2" class="hover:cursor-pointer text-gray-400 flex items-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 5.27L3.28 4L20 20.72L18.73 22l-3.08-3.08c-1.15.38-2.37.58-3.65.58c-5 0-9.27-3.11-11-7.5c.69-1.76 1.79-3.31 3.19-4.54zM12 9a3 3 0 0 1 3 3a3 3 0 0 1-.17 1L11 9.17A3 3 0 0 1 12 9m0-4.5c5 0 9.27 3.11 11 7.5a11.8 11.8 0 0 1-4 5.19l-1.42-1.43A9.86 9.86 0 0 0 20.82 12A9.82 9.82 0 0 0 12 6.5c-1.09 0-2.16.18-3.16.5L7.3 5.47c1.44-.62 3.03-.97 4.7-.97M3.18 12A9.82 9.82 0 0 0 12 17.5c.69 0 1.37-.07 2-.21L11.72 15A3.064 3.064 0 0 1 9 12.28L5.6 8.87c-.99.85-1.82 1.91-2.42 3.13"/></svg>
                        <svg id="open-eye2" class="hover:cursor-pointer text-gray-400 items-center hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M1 12q11 16 22 0Q12-4 1 12"/></g></svg>
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-600 text-sm mt-1 ps-3">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <div class="text-white mt-6 text-center w-full">
                        <button type="submit" class="bg-[#247BA0] py-2 rounded-md w-full">DAFTAR</button>
                        <div class="flex text-gray-400">
                            <p class="me-2">Sudah memiliki akun?</p>
                            <a href="/login" class="text-[#247BA0] underline font-bold">Klik disini</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const openEye = $("#open-eye")
        const closeEye = $("#close-eye")
        const openEye2 = $("#open-eye2")
        const closeEye2 = $("#close-eye2")
        const password = $("#password")
        const passwordConfirmation = $("#password_confirmation")
        const closeError = $("#close-error")
        const errorAlert = $("#error-alert")

        closeEye.on('click', function(event) {
            closeEye.removeClass('flex').addClass('hidden')
            openEye.removeClass('hidden').addClass('flex')
            password.attr('type', 'text')
        })

        openEye.on('click', function(event) {
            openEye.removeClass('flex').addClass('hidden')
            closeEye.removeClass('hidden').addClass('flex')
            password.attr('type', 'password')
        })

        closeEye2.on('click', function(event) {
            closeEye2.removeClass('flex').addClass('hidden')
            openEye2.removeClass('hidden').addClass('flex')
            passwordConfirmation.attr('type', 'text')
        })

        openEye2.on('click', function(event) {
            openEye2.removeClass('flex').addClass('hidden')
            closeEye2.removeClass('hidden').addClass('flex')
            passwordConfirmation.attr('type', 'password')
        })

        closeError.on('click', function(event) {
            errorAlert.removeClass('flex').addClass('hidden')
        })

    </script>
@endsection