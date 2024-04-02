<x-app-layout>
    <div class="note-container single-note">
        <h1>Create new note</h1>
        {{-- form中action的值是controller中的store()方法 --}}
        <form action="{{ route('note.store')  }}" method="POST" class="note">
            {{-- 当我们创建或更改note时，都需要使用csrf --}}
            @csrf
            <textarea name="note" rows="10" class="note-body" placeholder="Enter your note here"></textarea>
            <div class="note-buttons">
                <a href="{{ route('note.index') }}" class="note-cancel-button">Cancel</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
