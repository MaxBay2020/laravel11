<x-app-layout>
    <div class="note-container single-note">
        <div class="note-header">
            {{-- $note指的是NoteController中的show()方法所返回的内容 --}}
            {{-- 也就是return view('note.show', ['note' => $note]);中的note --}}
            <h1 class="text-3xl py-4">Note: {{ $note -> created_at  }}</h1>
            <div class="note-buttons">
                {{-- 因为NoteController中的edit()方法需要传一个noteId或note对象，因此需要给route()方法传入第二个参数 --}}
                <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                <form action="{{ route('note.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{-- 渲染note对象的note字段的值 --}}
                {{ $note -> note  }}
            </div>
        </div>
    </div>
</x-app-layout>
