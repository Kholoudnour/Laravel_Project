<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">Browse Topics</h2>
            </div>
        </div>
    </div>

                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach($categories as $category)
                                <!-- Use Str::slug() to sanitize category names -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                            id="{{ Str::slug($category->name) }}-tab"
                                            data-bs-toggle="tab" 
                                            data-bs-target="#{{ Str::slug($category->name) }}-tab-pane"
                                            type="button" 
                                            role="tab" 
                                            aria-controls="{{ Str::slug($category->name) }}-tab-pane"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $category->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    @foreach($categories as $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                             id="{{ Str::slug($category->name) }}-tab-pane"
                             role="tabpanel" 
                             aria-labelledby="{{ Str::slug($category->name) }}-tab" 
                             tabindex="0">
                            <div class="row">
                                @foreach($category->latest_topic as $topic)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="{{ route('topics-detail', $topic->id) }}">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">{{ $topic->title }}</h5>
                                                        <p class="mb-0">{{ $topic->content }}</p>
                                                    </div>
                                                    <span class="badge bg-design rounded-pill ms-auto">{{ $topic->views }}</span>
                                                </div>
                                                <img src="{{ 'asset(assets/images($topic->image)' }}" class="custom-block-image img-fluid" alt="">
                                              
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
