
<section class="topics-detail-section section-padding" id="topics-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 m-auto">
                <h3 class="mb-4"> Introduction to <br>{{ $topic->title }}</h3> <!-- Display the topic title -->
                <p><strong>{{ $topic->category }}</strong></p> <!-- Display the topic's category or any other fields -->
                <p>{{ $topic->content }}</p> <!-- Display the topic content -->
            </div>
        </div>
    </div>
</section>

           