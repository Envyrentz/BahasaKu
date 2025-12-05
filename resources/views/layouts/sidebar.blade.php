<?php
    $role = auth()->user()->role->name;
?>
{{--Desktop  --}}
<div id="sidebar" class="hidden md:flex md:flex-col md:basis-[5vw] bg-[#247BA0] text-white text-center items-center pt-10 gap-8 rounded-e-3xl relative z-10" >
    <button type="button" class="" id="sidebar-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17h8m-8-5h14M5 7h8"/></svg>
    </button>

    <div class="utility">
        <svg class="separator" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16"><path fill="currentColor" d="M2 7.75A.75.75 0 0 1 2.75 7h10a.75.75 0 0 1 0 1.5h-10A.75.75 0 0 1 2 7.75"/></svg>
        <svg class=" separator2 hidden" xmlns="http://www.w3.org/2000/svg" width="120" height="25" viewBox="0 0 80 16"><path fill="currentColor" d="M2 7.75A.75.75 0 0 1 2.75 7h74.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 7.75"/></svg>
    </div>
    
    <a href="{{ $role == 'Admin' ? route('dashboard') : route('dashboard.user') }}" class="menu flex gap-1 items-center @if(Route::currentRouteName() == 'dashboard' || Route::currentRouteName() == 'dashboard.user') rounded-lg p-2 bg-[#FFB84C] @endif">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="currentColor" d="M224 120v96a8 8 0 0 1-8 8h-56a8 8 0 0 1-8-8v-52a4 4 0 0 0-4-4h-40a4 4 0 0 0-4 4v52a8 8 0 0 1-8 8H40a8 8 0 0 1-8-8v-96a16 16 0 0 1 4.69-11.31l80-80a16 16 0 0 1 22.62 0l80 80A16 16 0 0 1 224 120"/></svg>
        <p class=" hidden title">Dashboard</p>
    </a>
    <a href="{{ $role == 'Admin' ? route('materi.index') : route('materi.user.index') }}" class=" menu flex gap-1 items-center @if(request()->is('materi*') || request()->is('materi-siswa*') ) rounded-lg p-2 bg-[#FFB84C] @endif">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M20.75 16.714a1 1 0 0 1-.014.143a.75.75 0 0 1-.736.893H6a1.25 1.25 0 1 0 0 2.5h14a.75.75 0 0 1 0 1.5H6A2.75 2.75 0 0 1 3.25 19V5A2.75 2.75 0 0 1 6 2.25h13.4c.746 0 1.35.604 1.35 1.35zM9 6.25a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/></svg>
        <p class=" hidden title">Materi</p>
    </a>
    <a href="{{ $role == 'Admin' ? route('masukan.index') : route('masukan.user.index') }}" class=" menu flex gap-1 items-center @if(request()->is('masukan*') || request()->is('masukan-siswa*') ) rounded-lg p-2 bg-[#FFB84C] @endif">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m-7 0c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m1 14H8c-.55 0-1-.45-1-1s.45-1 1-1h5c.55 0 1 .45 1 1s-.45 1-1 1m3-4H8c-.55 0-1-.45-1-1s.45-1 1-1h8c.55 0 1 .45 1 1s-.45 1-1 1m0-4H8c-.55 0-1-.45-1-1s.45-1 1-1h8c.55 0 1 .45 1 1s-.45 1-1 1"/></svg>
        <p class=" hidden title">Masukan</p>
    </a>
    <a href="{{ $role == 'Admin' ? route('pengguna.index') : route('pengguna.user.index') }}" class=" menu flex gap-1 items-center @if(request()->is('pengguna*') || request()->is('pengguna-siswa*') ) rounded-lg p-2 bg-[#FFB84C] @endif">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24 20a7 7 0 1 0 0-14a7 7 0 0 0 0 14M6 40.8V42h36v-1.2c0-4.48 0-6.72-.872-8.432a8 8 0 0 0-3.496-3.496C35.92 28 33.68 28 29.2 28H18.8c-4.48 0-6.72 0-8.432.872a8 8 0 0 0-3.496 3.496C6 34.08 6 36.32 6 40.8"/></svg>
        <p class=" hidden title">Pengguna</p>
    </a>
    
    <div class="utility ">
        <svg class="separator " xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16"><path fill="currentColor" d="M2 7.75A.75.75 0 0 1 2.75 7h10a.75.75 0 0 1 0 1.5h-10A.75.75 0 0 1 2 7.75"/></svg>
        <svg class=" separator2 hidden" xmlns="http://www.w3.org/2000/svg" width="120" height="25" viewBox="0 0 80 16"><path fill="currentColor" d="M2 7.75A.75.75 0 0 1 2.75 7h74.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 7.75"/></svg>

    </div>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class=" menu flex gap-1 items-center" onclick="return confirm('Apakah anda yakin?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path stroke-linejoin="round" d="M10 12h10m0 0l-3-3m3 3l-3 3"/><path d="M4 12a8 8 0 0 1 8-8m0 16a7.99 7.99 0 0 1-6.245-3"/></g></svg>
            <p class=" hidden title">Keluar</p>
        </button>
    </form>
</div>


{{-- Mobile --}}
<div class="md:hidden bg-[#247BA0] text-white px-7 py-1 fixed z-10 w-full">
    <div class="flex justify-end">
        <button type="button" id="sidebar-button-mobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17h8m-8-5h14M5 7h8"/></svg>
        </button>
    </div>
    <div id="sidebar-mobile" class="flex flex-col hidden gap-3 mt-3">
        <div class="utility-mobile">
            <svg class="separator2-mobile w-full" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="120" height="25" viewBox="0 0 80 16"><path fill="currentColor" d="M2 7.75A.75.75 0 0 1 2.75 7h74.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 7.75"/></svg>
        </div>
        
        <a href="{{ $role == 'Admin' ? route('dashboard') : route('dashboard.user') }}" class="menu-mobile flex gap-1 items-center @if(Route::currentRouteName() == 'dashboard' || Route::currentRouteName() == 'dashboard.user') rounded-lg p-2 bg-[#FFB84C] @endif">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="currentColor" d="M224 120v96a8 8 0 0 1-8 8h-56a8 8 0 0 1-8-8v-52a4 4 0 0 0-4-4h-40a4 4 0 0 0-4 4v52a8 8 0 0 1-8 8H40a8 8 0 0 1-8-8v-96a16 16 0 0 1 4.69-11.31l80-80a16 16 0 0 1 22.62 0l80 80A16 16 0 0 1 224 120"/></svg>
            <p class="title-mobile">Dashboard</p>
        </a>
        <a href="{{ $role == 'Admin' ? route('materi.index') : route('materi.user.index') }}" class=" menu-mobile flex gap-1 items-center @if(request()->is('materi*') || request()->is('materi-siswa*') ) rounded-lg p-2 bg-[#FFB84C] @endif">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M20.75 16.714a1 1 0 0 1-.014.143a.75.75 0 0 1-.736.893H6a1.25 1.25 0 1 0 0 2.5h14a.75.75 0 0 1 0 1.5H6A2.75 2.75 0 0 1 3.25 19V5A2.75 2.75 0 0 1 6 2.25h13.4c.746 0 1.35.604 1.35 1.35zM9 6.25a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/></svg>
            <p class="title-mobile">Materi</p>
        </a>
        <a href="{{ $role == 'Admin' ? route('masukan.index') : route('masukan.user.index') }}" class=" menu-mobile flex gap-1 items-center @if(request()->is('masukan*') || request()->is('masukan-siswa*') ) rounded-lg p-2 bg-[#FFB84C] @endif">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m-7 0c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m1 14H8c-.55 0-1-.45-1-1s.45-1 1-1h5c.55 0 1 .45 1 1s-.45 1-1 1m3-4H8c-.55 0-1-.45-1-1s.45-1 1-1h8c.55 0 1 .45 1 1s-.45 1-1 1m0-4H8c-.55 0-1-.45-1-1s.45-1 1-1h8c.55 0 1 .45 1 1s-.45 1-1 1"/></svg>
            <p class="title-mobile">Masukan</p>
        </a>
        <a href="{{ $role == 'Admin' ? route('pengguna.index') : route('pengguna.user.index') }}" class=" menu-mobile flex gap-1 items-center @if(request()->is('pengguna*') || request()->is('pengguna-siswa*') ) rounded-lg p-2 bg-[#FFB84C] @endif">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24 20a7 7 0 1 0 0-14a7 7 0 0 0 0 14M6 40.8V42h36v-1.2c0-4.48 0-6.72-.872-8.432a8 8 0 0 0-3.496-3.496C35.92 28 33.68 28 29.2 28H18.8c-4.48 0-6.72 0-8.432.872a8 8 0 0 0-3.496 3.496C6 34.08 6 36.32 6 40.8"/></svg>
            <p class="title-mobile">Pengguna</p>
        </a>
        
        <div class="utility-mobile">
            <svg class="separator2-mobile w-full" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="120" height="25" viewBox="0 0 80 16"><path fill="currentColor" d="M2 7.75A.75.75 0 0 1 2.75 7h74.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 7.75"/></svg>
    
        </div>
        
        <form method="POST" action="{{ route('logout') }}" class="pb-3">
            @csrf
            <button type="submit" class=" menu-mobile flex gap-1 items-center" onclick="return confirm('Apakah anda yakin?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path stroke-linejoin="round" d="M10 12h10m0 0l-3-3m3 3l-3 3"/><path d="M4 12a8 8 0 0 1 8-8m0 16a7.99 7.99 0 0 1-6.245-3"/></g></svg>
                <p class="title-mobile">Keluar</p>
            </button>
        </form>
    </div>
</div>

<script>
    // Desktop
    const sidebarButton = $('#sidebar-button')
    const sidebar = $('#sidebar')
    const menus = $('.menu')
    const titles = $('.title')
    const utilities = $('.utility')
    const separators = $('.separator')
    const separators2 = $('.separator2')

    sidebarButton.on('click', function(event) {
        sidebar.toggleClass('basis-[13vw] items-center px-3')
        sidebarButton.toggleClass('px-2')
        menus.toggleClass('px-2')
        titles.toggleClass('hidden')
        utilities.toggleClass('px-2')
        separators.toggleClass('hidden');
        separators2.toggleClass('hidden');
    })

    // Mobile
    const sidebarMobileButton = $('#sidebar-button-mobile')
    const sidebarMobile = $('#sidebar-mobile')
    let activeSidebarMobile = false;

    sidebarMobileButton.on('click', function(e) {
        sidebarMobile.toggleClass('hidden')
        activeSidebarMobile = !activeSidebarMobile;
    })

    // if(activeSidebarMobile == true) {
        // console.log('oke');

        $(document).on('click', function (event) {
            if(!$(event.target).closest(sidebarMobileButton, sidebarMobile).length) {
                sidebarMobile.addClass('hidden')
            }
        })
    // }

</script>
