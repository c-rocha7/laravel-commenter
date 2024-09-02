<x-app-layout>
    <div class="sm:max-w-2xl mx-auto p-4 sm:p-6 lg:p8">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <textarea
                name='message'
                placeholder="O que você está pensando?"
                class="block w-full border-gray-300 focus:border-indigo-300
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2"/>
            <x-primary-button class="mt-4">Comentar</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($comments as $comment)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $comment->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $comment->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
