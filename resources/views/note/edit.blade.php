<x-app-layout>
    <div class="note-container single-note">
        <h1 class="text-3xl py-4">Edit your note</h1>
        {{-- form中action的值是controller中的update()方法，且需要传入第二个参数 --}}
        <form action="{{ route('note.update', $note) }}" method="POST" class="note">
            {{-- 当我们创建或更改note时，都需要使用csrf --}}
            @csrf
            {{-- @method('PUT')会取代form上的method="POST" --}}
            @method('PUT')
            <textarea name="note" rows="10" class="note-body" placeholder="Enter your note here">{{ $note->note }}</textarea>
            <div class="note-buttons">
                <a href="{{ route('note.index') }}" class="note-cancel-button">Cancel</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
