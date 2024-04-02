{{-- 因为我们在resourses/view/components中创建了一个layout.blade.php文件；因此如果想使用此layout，需要使用x-layout文件名的方式来使用； --}}
{{-- 注意！x-表示laravel会自动去resources/views中找components文件夹中找名字叫layout.blade.php的文件 --}}
{{-- 如果layout文件名叫test.blade.php，则这里就是<x-test>...</x-test> --}}
<x-app-layout>
    <div class="note-container py-12">
        {{-- 使用route('note.create') 来跳转页面 --}}
        {{-- 注意！note.create来自于我们在web.php文件中给api起的名字！ --}}
        <a href='{{ route('note.create') }}' class="new-note-btn">
            New Note
        </a>
        <div class="notes">
            {{-- 这里的$notes是定义在controller index()方法中的notes --}}
            {{-- 即return view('note.index', ['notes' => $notes]);中的notes --}}
            {{-- $note表示遍历的每一个note --}}
            @foreach($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{-- $note -> note表示：渲染note字段的内容 --}}
                        {{-- 只渲染前30个字符 --}}
                        {{ Str::words($note -> note, 30)  }}
                    </div>
                    <div class="note-buttons">
                        {{-- 由于查询单个note和编辑单个note需要传入指定的note，因此需要给route()方法传入第二个参数，laravel会自动提取出note中的主键，然后以params传入对应的api中； --}}
                        <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
                        <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                        {{-- 我们需要使用一个单独的form将delete button包裹起来 --}}
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="note-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 分页 --}}
        {{ $notes -> links()  }}

    </div>
</x-app-layout>
