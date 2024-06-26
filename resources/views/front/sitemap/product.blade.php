@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $item)
        @php
            $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'], 'Asia/Kolkata');
            $showDate = $date->setTimezone('UTC');
        @endphp

        <url>
			<loc>{{ url('/') }}/product/{{ $item['slug'] }}</loc>
            <lastmod>{{$showDate}}</lastmod>
            {{-- <changefreq>weekly</changefreq> --}}
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>