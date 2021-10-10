<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget popular_post_widget mb-1">
            <h3 class="widget_title mb-3">Pengumuman</h3>
            @foreach ($pengumumans as $pengumuman)
            <div class="media post_item">
                <div class="media-body">
                    <a href="/pengumuman/detail/{{ $pengumuman->slug }}">
                        <h4 class="small"><strong>{{ $pengumuman->judul }}</strong></h4>
                    </a>
                    <p>{{ $pengumuman->created_at }}</p>
                </div>
            </div>
            @endforeach
            <hr>
            <div class="media post_item">
                <div class="media-body">
                    <a href="/pengumuman">
                        <h3>Semua Pengumuman..</h3>
                    </a>
                </div>
            </div>
        </aside>

        <aside class="single_sidebar_widget post_category_widget mb-1">
            <h4 class="widget_title mb-3">Paket Wisata</h4>
            @foreach ($pakets as $paket)
            <div class="media post_item ml-4">
                <div class="media-body">
                    <a href="/paket">
                        <h6><strong>{{ $paket->nama }}</strong></h6>
                    </a>
                    <hr class="divider d-none d-md-block my-2">
                </div>
            </div>
            @endforeach
        </aside>

        <aside class="single_sidebar_widget post_category_widget mb-1">
            <a href="/wisata"><h4 class="widget_title mb-3">Destinasi Wisata</h4></a>
            @foreach ($wisatas as $wisata)
            <div class="media post_item ml-4">
                <div class="media-body">
                    <a href="/wisata/detail/{{ $wisata->slug }}">
                        <h6><strong>{{ $wisata->nama }}</strong></h6>
                    </a>
                    <hr class="divider d-none d-md-block my-2">
                </div>
            </div>
            @endforeach
        </aside>
    </div>
</div>