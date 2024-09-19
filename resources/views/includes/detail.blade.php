<section class="topics-detail-section section-padding" id="topics-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 m-auto">
            @foreach($topics as $topic)
                <h3 class="mb-4">{{ $topic->title }}</h3> <!-- Fetch topic title -->
                <p>{{ $topic->content }}</p> <!-- Fetch topic description -->
                <p><strong>{{ $topic->category }}</strong></p> <!-- Example of another field -->
                @endforeach
            </div>
        </div>
    </div>


           