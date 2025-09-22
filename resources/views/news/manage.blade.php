<x-layouts.app-layout>
    <x-slot:title>จัดการข่าวทั้งหมด</x-slot:title>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">จัดการข่าวทั้งหมด</h1>
            <a href="{{ route('news.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill me-2"></i>เพิ่มข่าวใหม่
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive bg-dark rounded-3">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col" style="width: 55%;">หัวข้อข่าว</th>
                        <th scope="col" style="width: 20%;">เผยแพร่เมื่อ</th>
                        <th scope="col" class="text-end" style="width: 25%;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($all_news as $news_item)
                    <tr>
                        <td>
                            <a href="{{ route('news.show', $news_item->id) }}" class="text-white text-decoration-none">
                                {{ $news_item->title }}
                            </a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($news_item->published_at)->format('d/m/Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('news.edit', $news_item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> แก้ไข
                            </a>
                            <form action="{{ route('news.destroy', $news_item->id) }}" method="POST" 
                                  class="d-inline-block ms-1" 
                                  onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข่าวนี้?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash3-fill"></i> ลบ
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">ยังไม่มีข่าวในระบบ</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app-layout>
