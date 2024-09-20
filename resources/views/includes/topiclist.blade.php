<section class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Popular Topics</h3>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">
                @foreach($topics as $topic)
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <img src="{{ asset('admin/assests/images/topics/' . $topic->image) }}" class="custom-block-image img-fluid" alt="">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2">{{ $topic->title }}</h5>

                                    <p class="mb-0">{{ $topic->content }}</p>

                                    <a href="{{ route('topics-detail', $topic->id) }}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                </div>

                                <span class="badge bg-info rounded-pill ms-auto">{{ $topic->views }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-12 col-12">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mb-0">
            {{-- Previous Page Link --}}
            @if ($topics->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" aria-label="Previous">
                        <span aria-hidden="true">Prev</span>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $topics->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">Prev</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($topics->links()->elements[0] as $page => $url)
                <li class="page-item {{ $topics->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Next Page Link --}}
            @if ($topics->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $topics->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
</div>

                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</section>
