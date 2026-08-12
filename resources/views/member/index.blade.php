@extends('layout.master')
@section('content')
    @use('Illuminate\Support\Facades\Storage')

    @php
        $memberSlider = \App\Models\Slider::where('section', 'member')->first();
    @endphp

    <style>
        .page-slider-fade-in {
            animation: pageSliderFadeIn 0.8s ease-in;
        }
        @keyframes pageSliderFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    <!-- slider Area Start-->
    @if($memberSlider && $memberSlider->image)
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center"
                 style="background-image: url('{{ Storage::url($memberSlider->image) }}'); background-size: cover; background-position: center;">
    @else
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 page-slider-fade-in d-flex align-items-center" data-background="fe/img/hero/member.png">
    @endif
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Our Members</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Member</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- slider Area End-->

    <!--Team Area Start -->
    <div class="team-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle5">
                        <div class="front-text">
                            <h2 class="">Our team</h2>
                        </div>
                        <span class="back-text">members</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Card dikecilkan: col-lg-4 -> col-lg-3, col-md-4 -> col-md-4, col-sm-6 -> col-sm-6 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/bayu.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Bayu Agusworo</a></h3>
                                <!-- Blog Social -->
                                <div class="team-social mt-10">
                                    <p>Ketua BMI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/juhana.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Juhana</a></h3>
                                <div class="team-social mt-10">
                                    <p>Pengawas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/ety.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Ety Rustiyah</a></h3>
                                <div class="team-social mt-10">
                                    <p>Sekretaris</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/yati.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Karyati</a></h3>
                                <div class="team-social mt-10">
                                    <p>Bendahara 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/fitria.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Fitria</a></h3>
                                <div class="team-social mt-10">
                                    <p>Bendahara 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/juminah.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Juminah</a></h3>
                                <div class="team-social mt-10">
                                    <p>Humas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/yatini.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Yatini</a></h3>
                                <div class="team-social mt-10">
                                    <p>Humas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/maryanti.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Maryanti</a></h3>
                                <div class="team-social mt-10">
                                    <p>Humas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="single-team mb-20 text-center" style="max-width: 370px; margin: 0 auto;">
                        <div class="team-img">
                            <img src="{{ asset('fe/img/team/nani.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a>Nani</a></h3>
                                <div class="team-social mt-10">
                                    <p>Humas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Area End -->

    <!-- Team Tables Start -->
    <div class="member-table-wrapper mb-5 mt-30">
        <h3 class="table-title mb-3">KEANGGOTAAN BMI</h3>
        <div class="table-responsive">
            <table id="bmiTable" class="table table-bmi display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Foto</th> --}}
                        <th>Nama Anggota</th>
                        {{-- <th>Struktur</th> --}}
                        <th>Sektor</th>
                        <th>Usaha</th>
                        <th>Produk</th>
                        {{-- <th>Domisili</th>
                        <th>No HP</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $index => $member)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td>
                                @php
                                    $fotoUrl = null;
                                    // 1) stored in storage disk (e.g. 'members/foo.png' or 'gallery/...')
                                    if ($member->foto && Storage::disk('public')->exists($member->foto)) {
                                        $fotoUrl = asset('storage/' . $member->foto);
                                    }
                                    // 2) file path stored as public asset like 'fe/img/team/..'
                                    elseif ($member->foto && file_exists(public_path($member->foto))) {
                                        $fotoUrl = asset($member->foto);
                                    }
                                    // 3) try common team folder with basename
                                    else {
                                        $basename = $member->foto ? basename($member->foto) : null;
                                        if ($basename && file_exists(public_path('fe/img/team/' . $basename))) {
                                            $fotoUrl = asset('fe/img/team/' . $basename);
                                        }
                                    }
                                @endphp

                                @if($fotoUrl)
                                    <img src="{{ $fotoUrl }}" alt="{{ $member->name }}"
                                         style="width: 40px; height: 40px; border-radius: 0.25rem; object-fit: cover;" onerror="this.onerror=null; this.src='{{ asset('be/img/placeholder.png') }}'">
                                @else
                                    <span class="text-muted" style="font-size: 0.85rem;">-</span>
                                @endif
                            </td> --}}
                            <td>{{ $member->name }}</td>
                            {{-- <td>{{ $member->position }}</td> --}}
                            <td>{{ $member->sector }}</td>
                            <td>{{ $member->business }}</td>
                            <td>{{ $member->product }}</td>
                            {{-- <td>{{ $member->domicile }}</td>
                            <td>{{ $member->phone }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Team Tables End -->
@endsection

@section('join')
    @include('layout.join')
@endsection
@section('client')
    @include('layout.client')
@endsection
