<form action="{{ $action }}" method="{{ $method }}" class="bg-gray-800 text-gray-300 p-4 rounded-lg shadow-md w-full max-w-xl">
    @csrf
    <div class="flex items-center">
        <textarea 
            name="comment"
            class="w-full bg-gray-900 text-gray-300 border border-gray-700 rounded-lg p-3 resize-none focus:outline-none" 
            placeholder="{{ $placeholder }}"
            rows="4"></textarea>
    </div>
    <div class="flex items-center justify-between mt-2">
        <!-- Toolbar -->
        <div class="flex space-x-2">
            <!-- Tambahkan tombol toolbar sesuai kebutuhan -->
            <button type="button" class="text-gray-400 hover:text-gray-500">
                <i class="fa fa-image"></i>
            </button>
            <button type="button" class="text-gray-400 hover:text-gray-500">
                <i class="fa fa-bold"></i>
            </button>
            <button type="button" class="text-gray-400 hover:text-gray-500">
                <i class="fa fa-italic"></i>
            </button>
            <!-- Tambahkan tombol lain sesuai keinginan -->
        </div>

        <!-- Tombol Submit -->
        <button 
            type="submit"
            class="btn btn-outline btn-info">
            {{ $buttonText }}
        </button>
    </div>
</form>
