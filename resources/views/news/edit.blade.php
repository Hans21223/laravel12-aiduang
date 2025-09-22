<x-layouts.app-layout>
    {{-- 🔹 Page Title --}}
    <x-slot name="title">
        แก้ไขข่าว
    </x-slot>

    {{-- 🔹 Head scripts for TinyMCE --}}
    <x-slot name="head">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    </x-slot>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card bg-dark text-white shadow-lg rounded-4">
                    <div class="card-header">
                        <h4 class="mb-0">แก้ไขข่าว</h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('news.update', $news->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">หัวข้อข่าว</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title', $news->title) }}" required>
                            </div>

                            {{-- Image URL --}}
                            <div class="mb-3">
                                <label for="image_url" class="form-label">URL รูปภาพหลัก</label>
                                <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $news->image_url) }}">
                            </div>

                            {{-- Content with TinyMCE --}}
                            <div class="mb-3">
                                <label for="content-editor" class="form-label">เนื้อหาข่าว</label>
                                <textarea class="form-control" id="content-editor" name="content" rows="15">{{ old('content', $news->content) }}</textarea>
                            </div>

                            {{-- Source URL --}}
                            <div class="mb-3">
                                <label for="source_url" class="form-label">URL แหล่งข่าว (ถ้ามี)</label>
                                <input type="url" class="form-control" id="source_url" name="source_url" value="{{ old('source_url', $news->source_url) }}">
                            </div>

                            {{-- Actions --}}
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('news.manage') }}" class="btn btn-secondary me-2">
                                    <i class="bi bi-x-circle me-1"></i> ยกเลิก
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i> บันทึกการเปลี่ยนแปลง
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        tinymce.init({
            selector: 'textarea#content-editor',
            plugins: 'code table lists image link autoresize',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
            skin: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'oxide-dark' : 'oxide'),
            content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default')
        });
    </script>
    @endpush
</x-layouts.app-layout>