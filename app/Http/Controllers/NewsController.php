<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
// Storage อาจจะไม่จำเป็นแล้ว ถ้าไม่ได้ใช้ระบบอัปโหลดไฟล์
use Illuminate\Support\Facades\Storage; 

class NewsController extends Controller
{
    public function index()
    {
        $all_news = News::latest()->get();
        return view('news.index', compact('all_news'));
    }

    public function manage()
    {
        $all_news = News::latest()->paginate(10);
        return view('news.manage', compact('all_news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $other_news = News::where('id', '!=', $id)->latest()->take(4)->get();
        return view('news.show', compact('news', 'other_news'));
    }

    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 🔻 ปรับแก้ Validation ให้ตรงกับฟอร์ม
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|url', // ตรวจสอบว่าเป็น URL ที่ถูกต้อง
            'source_url' => 'nullable|url',
        ]);

        // 🔻 ปรับแก้การสร้างข้อมูลให้รับค่าจาก image_url
        News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_url' => $validated['image_url'],
            'source_url' => $validated['source_url'],
            'published_at' => now(),
            // ไม่ต้องมี layout แล้ว จะใช้ค่า default จาก database แทน
        ]);

        return redirect()->route('news.manage')->with('success', 'ข่าวถูกสร้างเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        // 🔻 ปรับแก้ Validation ให้ตรงกับฟอร์ม
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'source_url' => 'nullable|url',
        ]);

        // 🔻 ปรับแก้การอัปเดตข้อมูล
        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_url' => $validated['image_url'],
            'source_url' => $validated['source_url'],
        ]);

        return redirect()->route('news.manage')->with('success', 'ข่าวถูกอัปเดตเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        
        // 🔻 ไม่จำเป็นต้องลบไฟล์จาก Storage แล้ว เพราะเราใช้แค่ URL
        // if ($news->image_url) {
        //     Storage::disk('public')->delete($news->image_url);
        // }

        $news->delete();

        return redirect()->route('news.manage')->with('success', 'ข่าวถูกลบเรียบร้อยแล้ว');
    }
}