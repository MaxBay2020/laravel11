<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * 查询所有Note
     * Display a listing of the resource.
     */
    public function index()
    {
        // 查询所有note，并按照create_at降序排列，并每页显示15个（默认15个），paginate(limit)；
        $notes = Note::query()
            // 只查询登陆用户的note
            -> where('user_id', request() -> user() -> id)
            -> orderBy('created_at', 'desc')
            -> paginate();
        // 使用对应的view
        // 因为note对应的view放在了resources/view/note文件夹下，所以需要加上note.前缀；
        // 第一个参数：指定要使用哪个view；
        // 第二个参数：指定要传入view中的data，是个数组，notes表示的是键名，其值就是db查询出来的数据；
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * 显示创建Note所需要的form
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('note.create');
    }

    /**
     * 创建Note
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 对传来的数据进行验证
        // 并返回验证之后的数据$data
        $data = $request -> validate([
            // 注意！这里的note必须和前端的input的name属性的值一致！
            'note' => ['required', 'string']
        ]);

        $data['user_id'] = $request -> user() -> id;

        // 注意！这里的create()方法是model自带的，并不是controller中的create()方法！
        $createdNote = Note::create($data);

        // 使用to_route()方法跳转页面；
        // 并且返回的时候带一个message变量，值是Note created，可以在页面中使用此变量；
        return to_route('note.show', $createdNote) -> with('message', 'Note created');
    }

    /**
     * 查询单个Note
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // 如果此note的user_id不是登陆user的id的话；
        if($note -> user_id !== request() -> user() -> id){
            abort(403);
        }
        // laravel会自动根据param中的noteId的值去db中找此note；
        // 找出来的note就是$note形参；
        return view('note.show', ['note' => $note]);
    }

    /**
     * 显示要update note所需要的form
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        // 如果此note的user_id不是登陆user的id的话；
        if($note -> user_id !== request() -> user() -> id){
            abort(403);
        }
        // laravel会自动根据param中的noteId的值去db中找此note；
        // 找出来的note就是$note形参；
        return view('note.edit', ['note' => $note]);
    }

    /**
     * 更新单个Note
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        // 如果此note的user_id不是登陆user的id的话；
        if($note -> user_id !== request() -> user() -> id){
            abort(403);
        }
        // 对传来的数据进行验证
        // 并返回验证之后的数据$data
        $data = $request -> validate([
            // 注意！这里的note必须和前端的input的name属性的值一致！
            'note' => ['required', 'string']
        ]);

        // 注意！这里的update()方法不是controller中的update()方法！
        $note -> update($data);

        // 使用to_route()方法跳转页面；
        // 并且返回的时候带一个message变量，值是Note created，可以在页面中使用此变量；
        return to_route('note.show', $note) -> with('message', 'Note updated');
    }

    /**
     * 删除单个Note
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // 如果此note的user_id不是登陆user的id的话；
        if($note -> user_id !== request() -> user() -> id){
            abort(403);
        }
        $note -> delete();

        return to_route('note.index')->with('message', 'note deleted');
    }
}
