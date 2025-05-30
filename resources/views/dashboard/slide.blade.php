<?php

    use App\Helpers\Menu;

    $imagedashboard = Menu::get_info_image_dashboard();



?>


<div class="col-12 col-xl-4 col-md-4">
    <!-- Interval Option starts -->

    <div class="card h-100 p-4">

        <div class="card-body">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($imagedashboard as $index => $imagedashboar)
                    <button type="button" data-bs-target="#carouselExample"
                            data-bs-slide-to="{{ $index }}"
                            class="{{ $loop->first ? 'active' : '' }}"
                            aria-current="{{ $loop->first ? 'true' : 'false' }}"
                            aria-label="{{ $imagedashboar->titre_logo }}">
                    </button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    @foreach ($imagedashboard as $imagedashboar)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100 rounded-3"
                             src="{{ asset('/frontend/logo/' . $imagedashboar->logo_logo) }}"
                             alt="{{ $imagedashboar->titre_logo }}" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
