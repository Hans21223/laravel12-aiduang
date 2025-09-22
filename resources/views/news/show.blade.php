<x-layouts.app-layout>
    {{-- 🔹 Page Title --}}
    <x-slot name="title">
        {{ $news->title }}
    </x-slot>

    {{-- 🔹 Custom Styles for this page --}}
    <x-slot name="head">
        <style>
            .article-img-overlay {
                background: linear-gradient(to top, rgba(18, 18, 18, 0.95), rgba(18, 18, 18, 0.4) 60%, transparent);
            }

            .article-content p {
                font-size: 1.1rem;
                line-height: 1.7;
                color: #e0e0e0;
            }

            .other-news-card {
                transition: all 0.3s ease-in-out;
                border-color: #444;
            }

            .other-news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
                border-color: var(--bs-primary);
            }

            .other-news-card .card-img-top {
                transition: transform 0.5s ease;
            }

            .other-news-card:hover .card-img-top {
                transform: scale(1.05);
            }
        </style>
    </x-slot>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {{-- 🔹 Top Actions --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    {{-- Back Button --}}
                    <button
                        onclick="window.history.back()"
                        class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i> ย้อนกลับ
                    </button>

                    {{-- Source Button --}}
                    @if($news->source_url)
                        <a href="{{ $news->source_url }}" target="_blank" rel="noopener noreferrer"
                           class="btn btn-success btn-sm">
                           <i class="bi bi-box-arrow-up-right me-1"></i> แหล่งข่าวต้นฉบับ
                        </a>
                    @endif
                </div>

                {{-- 🔹 Main Article --}}
                <article class="card bg-dark text-white border-secondary rounded-4 shadow-lg mb-5">
                    <div class="position-relative">
                        <img class="card-img-top"
                             src="{{ $news->image_url }}"
                             alt="{{ $news->title }}"
                             style="height: 400px; object-fit: cover;">
                        <div class="card-img-overlay article-img-overlay d-flex flex-column justify-content-end p-4 p-md-5">
                            <h1 class="display-5 fw-bold text-white">
                                {{ $news->title }}
                            </h1>
                            <p class="text-muted mb-0">
                                เผยแพร่เมื่อ: {{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <div class="article-content">
                            <p>{!! nl2br(e($news->content)) !!}</p>
                        </div>
                    </div>
                </article>

                {{-- 🔹 Other News --}}
                <section>
                    <h2 class="h3 fw-bold mb-4 text-light border-start border-4 border-primary ps-3">
                        ข่าวอื่นๆ ที่น่าสนใจ
                    </h2>

                    <div class="row row-cols-1 row-cols-sm-2 g-4">
                        @foreach($other_news->take(2) as $item)
                            <div class="col">
                                <a href="{{ route('news.show', $item->id) }}" class="text-decoration-none">
                                    <div class="card bg-dark text-white h-100 shadow-sm rounded-3 overflow-hidden other-news-card">
                                        <div class="overflow-hidden">
                                             <img class="card-img-top"
                                                 src="{{ $item->image_url }}"
                                                 alt="{{ $item->title }}"
                                                 style="height: 180px; object-fit: cover;">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title h6">{{ $item->title }}</h5>
                                            <small class="text-secondary">
                                                {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
