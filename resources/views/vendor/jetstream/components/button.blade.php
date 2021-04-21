<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-transparent border border-transparent rounded-md font-semibold text-xs hover:bg-indigo-300 text-indigo-600 uppercase tracking-widest  active:bg-transparent focus:outline-none focus:border-transparent focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
