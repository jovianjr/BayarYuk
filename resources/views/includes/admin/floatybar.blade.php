<div class="fixed z-10 w-full h-16 max-w-lg -translate-x-1/2 bg-white bottom-0 left-1/2 rounded-t-3xl drop-shadow-xl border border-gray-300">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto text-c-earlier-black">
        <a href="{{ url('/') }}" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tl-3xl">
            <span class="iconify" data-icon="material-symbols:home-outline" data-width="24" data-height="24"></span>
            <p class="font-medium text-xs">Home</p>
        </a>
        <a href="{{ url('/riwayat') }}" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
            <span class="iconify" data-icon="gg:list" data-width="24" data-height="24"></span>
            <p class="font-medium text-xs">Riwayat</p>
        </a>
        <a href="{{ url('/pembayaran') }}" type="button" class="inline-flex flex-col items-center justify-center px-5">
            <div class="absolute -top-[35%] rounded-full bg-c-pink p-1">
                <img src="/images/icon/bayar-pesawat.svg" alt="Pembayaran" class="translate-x-0.5">
            </div>
            <p class="font-medium text-xs text-c-pink mt-6">Pembayaran</p>
        </a>
        <a href="{{ url('/help') }}" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400">
            <span class="iconify" data-icon="material-symbols:help-outline" data-width="24" data-height="24"></span>
            <p class="font-medium text-xs">Bantuan</p>
        </a>
        <a href="{{ url('/profile') }}" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-yellow-400 rounded-tr-3xl">
            <span class="iconify" data-icon="gg:profile" data-width="24" data-height="24"></span>
            <p class="font-medium text-xs">Profile</p>
        </a>
    </div>
</div>