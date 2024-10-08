
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Homepage</a></li>

                        <!-- No loop needed since it's a single topic -->
                        <li class="breadcrumb-item active" aria-current="page">{{ $topic->category }}</li> <!-- Show the category of the topic -->
                    </ol>
                </nav>
              
                <h2 class="text-white">Introduction to <br> {{ $topic->title }}</h2> <!-- Show the title of the topic -->
                <div class="d-flex align-items-center mt-5">
                    
                    <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read More</a>

                    <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="topics-detail-block">
                    <img src="{{ asset('admin/assests/images/topics/' . $topic->image) }}" style="width:100%; max-width:600px;"class="topics-detail-block-image img-fluid">
                </div>
            </div>

        </div>
    </div>
</header>
