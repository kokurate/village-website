    <!-- Trending Top -->
    @if(single_latest_post())
    <div class="trending-top mb-30">
        <div class="trend-top-img">
            <img src="{{ single_latest_post()->featured_image }}" alt="" style="max-width: 100%;">
            <div class="trend-top-cap">
                <span>{{ date_formatter(single_latest_post()->created_at) }}</span>
                <h2><a href="{{ route('read_post', single_latest_post()->post_slug) }}">{{ substr(single_latest_post()->post_title,0, 50) }}...</a></h2>
            </div>
        </div>
    </div> 
    @endif
    <!-- Trending Bottom -->
    <div class="trending-bottom">
        <div class="row">
            @if(after_single_latest_post())
            @foreach(after_single_latest_post() as $latest)
            <div class="col-lg-4">
                <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                        <img src="{{ $latest->featured_image }}" alt="" style="width: 100%;height:150px;object-fit: cover;">
                    </div>
                    <div class="trend-bottom-cap">
                        <span class="text-muted">{{ date_formatter($latest->created_at) }}</span>
                        <span class="text-muted">{{ $latest->author->name }}</span>
                        <h4><a href="{{ route('read_post', $latest->post_slug) }}">{{ substr($latest->post_title,0, 50) }}...</a></h4>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>