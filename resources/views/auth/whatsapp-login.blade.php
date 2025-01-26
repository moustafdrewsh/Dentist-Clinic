<x-guest-layout>
    <form method="POST" action="{{ route('auth.whatsapp.post') }}">
        @csrf
        <div>
            <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">رقم WhatsApp</label>
            <input type="text" name="whatsapp_number" id="whatsapp_number"
       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
       placeholder="مثال: 123456789" required>
        </div>
        <div class="mt-4">
            <button type="submit" style="              background-color: rgb(60, 236, 44);
"
                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                تسجيل الدخول
            </button>
        </div>
    </form>
</x-guest-layout>
