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
                            <img src="{{ asset('storage/' . $topic->image) }}" class="custom-block-image img-fluid" alt="">
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
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">Prev</span>
                            </a>
                        </li>

                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">1</a>
                        </li>
                        
                        <!-- Add pagination links dynamically -->
                    
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</section>
