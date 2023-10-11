<div class="row mb-5" data-masonry='{"percentPosition": true }' wire:poll.10s>
    @php
        $now = Carbon\Carbon::now();
    @endphp
    @foreach ($event as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="text-success mb-1">
                        {{ $item->deskripsi }}
                        {{ Carbon\Carbon::parse($item->tanggal)->diffInDays($now) }}
                        @if (Carbon\Carbon::parse($item->tanggal)->diffInDays($now) >= 1)
                            <i class="fa fa-check-circle text-success ms-2"></i>
                        @endif
                    </h5>
                    <h6 class="text-muted mb-0">{{ tanggalIndo($item->tanggal) }}</h6>
                    <hr class="mb-4" />
                    <figcaption class="blockquote-footer mb-0">
                        {{ $item->pj }}
                    </figcaption>
                </div>
            </div>
        </div>
    @endforeach
</div>
