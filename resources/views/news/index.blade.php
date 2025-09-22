<x-layouts.app-layout title="หน้าแรก - Video Game News">
    <style>
        .featured-card img {
            object-fit: cover;
            height: 65vh;
        }
        .hover-shadow {
            transition: all 0.3s ease-in-out;
        }
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }
        .category-card {
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }
        .category-card:hover {
            transform: translateY(-5px);
            background-color: #1e1e1e;
        }
        .subscribe-section {
            background: linear-gradient(135deg, #3a0ca3, #7209b7, #f72585);
            color: white;
            border-radius: 1rem;
        }

        /* ===== เพิ่มส่วนนี้ ===== */
        .news-card {
            position: relative;
            overflow: hidden;
        }

        .news-summary {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.4s ease;
            font-size: 0.9rem;
            color: #ccc;
            margin-top: 0.5rem;
        }

        .news-card:hover .news-summary {
            max-height: 200px; /* กำหนดความสูงเวลาขยาย */
            opacity: 1;
        }
    </style>
    

    <div class="container my-5">

        {{-- Featured News --}}
        @if ($all_news->isNotEmpty())
            @php
                $featured_news = $all_news->first();
                $latest_news = $all_news->skip(1);
            @endphp

            <section class="mb-5">
                <div class="card text-white border-0 shadow-lg overflow-hidden featured-card">
                    <div class="position-relative">
                        <img src="{{ $featured_news->image_url }}" class="card-img img-fluid" alt="{{ $featured_news->title }}">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-gradient opacity-50"></div>
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-md-5">
                            <h2 class="card-title display-4 fw-bold mb-3">
                                <a href="{{ route('news.show', $featured_news->id) }}" class="text-white text-decoration-none">
                                    {{ $featured_news->title }}
                                </a>
                            </h2>
                            <p class="card-text fs-5 d-none d-md-block">
                                {{ Str::limit($featured_news->content, 120) }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Latest + Trending --}}
            <section class="mb-5">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <h2 class="h4 mb-3 fw-bold border-start border-4 ps-3">ข่าวล่าสุด</h2>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach ($latest_news->take(4) as $news_item)
                                <div class="col">
                                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden hover-shadow news-card">
                                        <a href="{{ route('news.show', $news_item->id) }}">
                                            <img src="{{ $news_item->image_url }}" class="card-img-top" alt="{{ $news_item->title }}">
                                        </a>
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="{{ route('news.show', $news_item->id) }}" class="text-decoration-none text-light">
                                                    {{ $news_item->title }}
                                                </a>
                                            </h6>
                                            <p class="card-text news-summary">
                                                {{ Str::limit($news_item->content, 80) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h2 class="h4 mb-3 fw-bold border-start border-4 ps-3 text-danger">ข่าวมาแรง 🔥</h2>
                        @foreach ($all_news->take(3) as $trend)
                            <div class="card mb-3 border-0 shadow-sm hover-shadow news-card">
                                <img src="{{ $trend->image_url }}" class="card-img-top" alt="{{ $trend->title }}">
                                <div class="card-body p-2">
                                    <small>
                                        <a href="{{ route('news.show', $trend->id) }}" class="text-decoration-none text-light">
                                            {{ $trend->title }}
                                        </a>
                                    </small>
                                    <p class="news-summary">
                                        {{ Str::limit($trend->content, 60) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- All News --}}
            <section class="mb-5">
                <h2 class="h4 mb-3 fw-bold border-start border-4 ps-3 text-primary">ข่าวทั้งหมด</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-4">
                    @foreach ($latest_news->take(10) as $news_item)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm hover-shadow news-card">
                                <a href="{{ route('news.show', $news_item->id) }}">
                                    <img src="{{ $news_item->image_url }}"
                                         class="card-img-top"
                                         alt="{{ $news_item->title }}"
                                         style="height: 120px; object-fit: cover;">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title mb-1">
                                        <a href="{{ route('news.show', $news_item->id) }}"
                                           class="text-decoration-none text-light">
                                            {{ Str::limit($news_item->title, 60) }}
                                        </a>
                                    </h6>
                                    <small class="text-secondary">
                                        {{ \Carbon\Carbon::parse($news_item->published_at)->format('d M Y') }}
                                    </small>
                                    <p class="news-summary">
                                        {{ Str::limit($news_item->content, 50) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        @else
            <div class="alert alert-secondary text-center">ยังไม่มีข่าวในระบบ</div>
        @endif

    </div>
</x-layouts.app-layout>
