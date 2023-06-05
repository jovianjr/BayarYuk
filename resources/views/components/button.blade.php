<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-c-pink border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:bg-c-pink-white active:bg-c-pink-white focus:outline-none focus:border-c-pink focus:ring ring-c-pink disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>