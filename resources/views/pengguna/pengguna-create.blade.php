@extends('layouts.main')

@section('content')
    <div class="border-s-4 border-[#395670] text-3xl font-bold text-[#395670] px-3">Tambah Pengguna</div>
    <div class="my-7 md:my-10">
        @if($errors->any())
        <div id="error-alert" class="bg-red-400 py-2 rounded-md flex items-center justify-between w-full px-3 text-white font-semibold">
            <p>{{  $errors->first() }}</p>
            <svg id="close-error" class="hover:cursor-pointer text-white/80 flex items-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="m12 14.122l5.303 5.303a1.5 1.5 0 0 0 2.122-2.122L14.12 12l5.304-5.303a1.5 1.5 0 1 0-2.122-2.121L12 9.879L6.697 4.576a1.5 1.5 0 1 0-2.122 2.12L9.88 12l-5.304 5.304a1.5 1.5 0 1 0 2.122 2.12z"/></g></svg>
        </div>
        @endif
    </div>
    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data" class="w-full pb-7">
        @csrf
        <div class="md:flex">
            <div class="flex flex-col md:gap-5 md:pe-5 w-full">
                <div class="w-full md:flex gap-10">
                    <div class="w-full flex flex-col mt-2 md:mt-0">
                        <label for="role_id" class="text-[#395670] font-bold">Role</label>
                        <select name="role_id" id="role_id" class="rounded w-full">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if (old('role_id') == $role->id) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="md:flex gap-10">
                    <div class="basis-1/2 flex flex-col">
                        <label for="name" class="text-[#395670] font-bold">Nama Pengguna</label>
                        <input type="text" name="name" id="name" class="rounded" value="{{ old('name') }}" required>
                    </div>
                    <div class="basis-1/2 flex flex-col mt-2 md:mt-0">
                        <label for="email" class="text-[#395670] font-bold">Alamat Email</label>
                        <input type="text" name="email" id="email" class="rounded" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="md:flex gap-10">
                    <div class="basis-1/2 flex flex-col mt-2 md:mt-0">
                        <label for="password" class="text-[#395670] font-bold">Kata Sandi</label>
                        <input type="text" name="password" id="password" class="rounded" value="{{ old('password') }}" required>
                    </div>
                    <div class="basis-1/2 flex flex-col mt-2 md:mt-0">
                        <label for="password_confirmation" class="text-[#395670] font-bold">Konfirmasi Kata Sandi</label>
                        <input type="text" name="password_confirmation" id="password_confirmation" class="rounded" value="{{ old('passwrord_confirmation') }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 flex justify-end md:px-5 gap-3 md:gap-5 font-semibold w-full">
            <a href="{{ route('pengguna.index') }}" class="py-2 px-5 border border-[#555050] rounded-lg">Batal</a>
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