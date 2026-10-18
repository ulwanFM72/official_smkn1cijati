
@extends('layouts.app-public')

@section('title', 'Guru & Staf')

@push('styles')
<style>
    /* =========================================================
       ANIMASI
    ========================================================= */

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* =========================================================
       HERO
    ========================================================= */

    .jd-hero {
        position: relative;
        height: 400px;
        overflow: hidden;
    }

    .jd-hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .jd-hero::after {
        content: '';
        position: absolute;
        inset: 0;

        background:
            linear-gradient(
                180deg,
                rgba(10, 20, 40, .55) 0%,
                rgba(10, 20, 40, .35) 45%,
                rgba(10, 20, 40, .75) 100%
            );
    }

    .jd-hero-content {
        position: absolute;
        inset: 0;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        text-align: center;

        padding: 0 20px;

        z-index: 2;
    }

    .jd-hero-content h1 {
        color: #fff;

        font-weight: 800;

        font-size: clamp(
            1.3rem,
            2.4vw,
            1.8rem
        );

        letter-spacing: -0.01em;

        margin-bottom: 10px;

        animation:
            fadeSlideUp .6s ease both .05s;
    }

    .jd-hero-content p {
        color: rgba(255, 255, 255, .85);

        font-size: .95rem;

        margin: 0;

        animation:
            fadeSlideUp .6s ease both .1s;
    }

    .jd-hero-eyebrow {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        font-size: 1rem;

        font-weight: 700;

        letter-spacing: .08em;

        text-transform: uppercase;

        color: #eaf2ff;

        background: rgba(255, 255, 255, .12);

        border: 1px solid
            rgba(255, 255, 255, .25);

        padding: 6px 16px;

        border-radius: 999px;

        backdrop-filter: blur(4px);

        margin-bottom: 16px;

        animation:
            fadeSlideUp .6s ease both .1s;
    }


    /* =========================================================
       ROOT WARNA
    ========================================================= */

    :root {
        --gs-white: #FFFFFF;
        --gs-bg: #F8F9FC;

        --gs-sky: #0EA5E9;
        --gs-sky-dark: #0284C7;

        --gs-dark: #374151;
        --gs-gray: #6B7280;

        --gs-border: #E7ECF4;
    }


    /* =========================================================
       SECTION GURU & STAF
    ========================================================= */

    .gs-section {
        background: var(--gs-bg);

        padding:
            64px 24px 68px;

        font-family:
            'Figtree',
            sans-serif;
    }

    .gs-section * {
        box-sizing: border-box;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .gs-header {
        text-align: center;

        margin:
            0 auto 40px;
    }

    .gs-eyebrow {
        font-size: .75rem;

        font-weight: 800;

        letter-spacing: .1em;

        text-transform: uppercase;

        color: var(--gs-sky);

        margin: 0 0 8px;
    }

    .gs-title {
        font-size:
            clamp(26px, 3.6vw, 34px);

        font-weight: 800;

        color: var(--gs-dark);

        margin: 0;

        letter-spacing: -.01em;
    }


    /* =========================================================
       KEPALA SEKOLAH
    ========================================================= */

    .gs-kepsek-wrap {
        max-width: 300px;

        margin:
            0 auto 56px;
    }

    .gs-kepsek-card {
        background:
            var(--gs-white);

        border-radius: 20px;

        overflow: hidden;

        box-shadow:
            0 20px 40px -18px
                rgba(14, 165, 233, .32),

            0 6px 14px
                rgba(15, 23, 42, .07);

        text-align: center;
    }

    .gs-kepsek-card img {
        width: 100%;

        aspect-ratio: 3 / 4;

        object-fit: cover;

        display: block;
    }

    .gs-kepsek-info {
        padding:
            20px 18px 24px;
    }

    .gs-kepsek-name {
        font-family:
            'Figtree',
            sans-serif;

        font-size: 19px;

        font-weight: 800;

        color: var(--gs-dark);

        margin: 0 0 4px;
    }

    .gs-kepsek-role {
        font-size: 13.5px;

        font-weight: 700;

        letter-spacing: .03em;

        text-transform: uppercase;

        color: var(--gs-sky-dark);

        margin: 0;
    }


    /* =========================================================
       STAGE CAROUSEL
    ========================================================= */

    .gs-stage-wrap {
        position: relative;

        max-width: 960px;

        margin: 0 auto;
    }

    .gs-stage {
        position: relative;

        height: 420px;

        overflow: hidden;
    }

    .gs-track {
        position: absolute;

        inset: 0;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .gs-card {
        position: absolute;

        top: 50%;
        left: 50%;

        width: 290px;
        height: 390px;

        border-radius: 20px;

        overflow: hidden;

        background:
            var(--gs-white);

        box-shadow:
            0 16px 34px -18px
                rgba(14, 165, 233, .28),

            0 4px 12px
                rgba(15, 23, 42, .06);

        transition:
            transform .7s
                cubic-bezier(.22, .85, .32, 1),

            opacity .7s ease,

            filter .7s ease;
    }

    .gs-card img {
        width: 100%;
        height: 100%;

        object-fit: cover;

        display: block;
    }


    /* =========================================================
       CARD OVERLAY
    ========================================================= */

    .gs-card-overlay {
        position: absolute;

        left: 0;
        right: 0;
        bottom: 0;

        padding:
            22px 20px 18px;

        background:
            linear-gradient(
                180deg,
                rgba(15, 23, 42, 0) 0%,
                rgba(15, 23, 42, .3) 45%,
                rgba(15, 23, 42, .82) 100%
            );

        color: #fff;
    }

    .gs-card-name {
        font-family:
            'Figtree',
            sans-serif;

        font-size: 16px;

        font-weight: 700;

        margin:
            0 0 2px;

        line-height: 1.3;
    }

    .gs-card-role {
        font-size: 12.5px;

        font-weight: 600;

        color: #7FD2FF;

        margin: 0;
    }


    /* =========================================================
       POSISI CAROUSEL
    ========================================================= */

    .gs-card[data-pos="0"] {
        transform:
            translate(-50%, -50%)
            scale(1);

        opacity: 1;

        z-index: 5;
    }

    .gs-card[data-pos="-1"] {
        transform:
            translate(
                calc(-50% - 290px),
                -50%
            )
            scale(.82);

        opacity: .5;

        z-index: 3;

        filter:
            brightness(.92);
    }

    .gs-card[data-pos="1"] {
        transform:
            translate(
                calc(-50% + 290px),
                -50%
            )
            scale(.82);

        opacity: .5;

        z-index: 3;

        filter:
            brightness(.92);
    }

    .gs-card[data-pos="-2"] {
        transform:
            translate(
                calc(-50% - 500px),
                -50%
            )
            scale(.68);

        opacity: 0;

        z-index: 1;
    }

    .gs-card[data-pos="2"] {
        transform:
            translate(
                calc(-50% + 500px),
                -50%
            )
            scale(.68);

        opacity: 0;

        z-index: 1;
    }

    .gs-card[data-pos="hidden"] {
        transform:
            translate(-50%, -50%)
            scale(.6);

        opacity: 0;

        z-index: 0;

        pointer-events: none;
    }


    /* =========================================================
       NAVIGATION BUTTON
    ========================================================= */

    .gs-nav {
        position: absolute;

        top: 50%;

        transform:
            translateY(-50%);

        width: 46px;
        height: 46px;

        border-radius: 50%;

        background:
            var(--gs-white);

        border:
            1px solid
            var(--gs-border);

        box-shadow:
            0 10px 22px -10px
            rgba(15, 23, 42, .16);

        display: flex;

        align-items: center;

        justify-content: center;

        cursor: pointer;

        z-index: 8;

        transition:
            border-color .2s ease,
            transform .2s ease;
    }

    .gs-nav:hover {
        border-color:
            var(--gs-sky);

        transform:
            translateY(-50%)
            scale(1.06);
    }

    .gs-nav svg {
        width: 17px;
        height: 17px;

        stroke:
            var(--gs-sky);
    }

    .gs-nav.prev {
        left: -2px;
    }

    .gs-nav.next {
        right: -2px;
    }


    /* =========================================================
       PAGINATION DOT
    ========================================================= */

    .gs-dots {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 9px;

        margin-top: 30px;
    }

    .gs-dot {
        width: 8px;
        height: 8px;

        border-radius: 4px;

        background: #D6DEEA;

        border: none;

        padding: 0;

        cursor: pointer;

        transition:
            width .35s ease,
            background .35s ease;
    }

    .gs-dot.active {
        width: 26px;

        background:
            var(--gs-sky);
    }

    .gs-dot.sm {
        width: 6px;
        height: 6px;

        opacity: .6;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 720px) {

        .gs-nav {
            display: none;
        }
    }


    @media (max-width: 640px) {

        .jd-hero {
            height: 330px;
        }

        .gs-section {
            padding:
                52px 16px 56px;
        }

        .gs-kepsek-wrap {
            max-width: 200px;

            margin-bottom: 44px;
        }

        .gs-stage {
            height: 360px;
        }

        .gs-card {
            width: 225px;
            height: 330px;
        }

        .gs-card[data-pos="-1"] {
            transform:
                translate(
                    calc(-50% - 150px),
                    -50%
                )
                scale(.78);
        }

        .gs-card[data-pos="1"] {
            transform:
                translate(
                    calc(-50% + 150px),
                    -50%
                )
                scale(.78);
        }

        .gs-card[data-pos="-2"],
        .gs-card[data-pos="2"] {
            opacity: 0;
        }
    }


    @media (prefers-reduced-motion: reduce) {

        .gs-card {
            transition: none;
        }
    }
</style>
@endpush



{{-- ==========================================================
    CONTENT
========================================================== --}}

@section('content')


    {{-- ======================================================
        HERO
    ======================================================= --}}

    <section class="jd-hero">

        <img
            src="{{ asset('images/sekolah.jpg') }}"
            alt="Guru & Staf SMK Negeri 1 Cijati"
        >

        <div class="jd-hero-content">

            <span class="jd-hero-eyebrow">
                Guru &amp; Staf
            </span>

            <p>
                Tenaga pendidik dan kependidikan
                {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
            </p>

        </div>

    </section>



    {{-- ======================================================
        GURU & STAF
    ======================================================= --}}

    <section
        class="gs-section"
        aria-label="Guru dan Staf"
    >


        {{-- ==================================================
            JUDUL
        =================================================== --}}

        <div class="gs-header">

            <h2 class="gs-title">
                Guru &amp; Staf
            </h2>

        </div>



        {{-- ==================================================
            AMBIL KEPALA SEKOLAH
        =================================================== --}}

        @php
            $kepsek = $guru->first(function ($item) {
                return trim(strtolower($item->jabatan)) === 'kepala sekolah';
            });
        @endphp



        {{-- ==================================================
            CARD KEPALA SEKOLAH
        =================================================== --}}

        @if ($kepsek)

            <div class="gs-kepsek-wrap">

                <div class="gs-kepsek-card">

                    <img
                        src="{{ $kepsek->foto ? asset('storage/' . $kepsek->foto) : asset('images/default-avatar.png') }}"
                        alt="{{ $kepsek->nama }}"
                    >

                    <div class="gs-kepsek-info">

                        <p class="gs-kepsek-name">
                            {{ $kepsek->nama }}
                        </p>

                        <p class="gs-kepsek-role">
                            {{ $kepsek->jabatan }}
                        </p>

                    </div>

                </div>

            </div>

        @endif



        {{-- ==================================================
            CAROUSEL
        =================================================== --}}

        <div class="gs-stage-wrap">


            {{-- TOMBOL PREV --}}

            <button
                type="button"
                class="gs-nav prev"
                aria-label="Sebelumnya"
                id="gsPrev"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M15 18l-6-6 6-6"/>
                </svg>

            </button>



            {{-- STAGE --}}

            <div class="gs-stage">

                <div
                    class="gs-track"
                    id="gsTrack"
                >

                    @foreach (
                        $guru->reject(function ($item) {
                            return trim(strtolower($item->jabatan)) === 'kepala sekolah';
                        }) as $index => $item
                    )

                        <div
                            class="gs-card"
                            data-index="{{ $index }}"
                        >

                            <img
                                src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default-avatar.png') }}"
                                alt="{{ $item->nama }}"
                                loading="lazy"
                            >

                            <div class="gs-card-overlay">

                                <p class="gs-card-name">
                                    {{ $item->nama }}
                                </p>

                                <p class="gs-card-role">
                                    {{ $item->jabatan }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>



            {{-- TOMBOL NEXT --}}

            <button
                type="button"
                class="gs-nav next"
                aria-label="Berikutnya"
                id="gsNext"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2.4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M9 18l6-6-6-6"/>
                </svg>

            </button>

        </div>



        {{-- ==================================================
            DOT PAGINATION
        =================================================== --}}

        <div
            class="gs-dots"
            id="gsDots"
        ></div>


    </section>


@endsection



{{-- ==========================================================
    JAVASCRIPT
========================================================== --}}

@push('scripts')

<script>
(function () {

    'use strict';


    /* =======================================================
       ELEMENT
    ======================================================= */

    const track =
        document.getElementById('gsTrack');

    const dotsWrap =
        document.getElementById('gsDots');

    const nextButton =
        document.getElementById('gsNext');

    const prevButton =
        document.getElementById('gsPrev');


    /*
     * Kalau carousel tidak ditemukan,
     * hentikan script.
     */

    if (
        !track ||
        !dotsWrap ||
        !nextButton ||
        !prevButton
    ) {
        return;
    }


    /* =======================================================
       AMBIL SEMUA CARD
    ======================================================= */

    const cards =
        Array.from(track.children);

    const n =
        cards.length;


    /*
     * Kalau tidak ada guru/staf,
     * tidak perlu menjalankan carousel.
     */

    if (n === 0) {

        dotsWrap.innerHTML = '';

        return;
    }


    /* =======================================================
       JUMLAH DOT
    ======================================================= */

    const gsMaxDots =
        Math.min(5, n) < 3
            ? Math.min(3, n)
            : Math.min(5, n);


    /* =======================================================
       STATE
    ======================================================= */

    let active = 0;

    let timer = null;


    /* =======================================================
       HITUNG JARAK MELINGKAR
    ======================================================= */

    function circularOffset(
        index,
        current,
        total
    ) {

        let diff =
            index - current;


        if (diff > total / 2) {

            diff -= total;
        }


        if (diff < -total / 2) {

            diff += total;
        }


        return diff;
    }


    /* =======================================================
       DOT YANG DITAMPILKAN
    ======================================================= */

    function visibleDotIndexes() {

        /*
         * Kalau jumlah guru sedikit,
         * tampilkan semua dot.
         */

        if (n <= gsMaxDots) {

            return Array.from(
                { length: n },
                (_, i) => i
            );
        }


        const half =
            Math.floor(gsMaxDots / 2);


        let start =
            active - half;

        let end =
            active +
            (gsMaxDots - half - 1);


        /*
         * Kalau start kurang dari 0.
         */

        if (start < 0) {

            end -= start;

            start = 0;
        }


        /*
         * Kalau end melewati jumlah data.
         */

        if (end > n - 1) {

            start -=
                end - (n - 1);

            end = n - 1;
        }


        start =
            Math.max(0, start);


        return Array.from(
            {
                length:
                    end - start + 1
            },
            (_, i) =>
                start + i
        );
    }


    /* =======================================================
       RENDER DOT
    ======================================================= */

    function renderDots() {

        const visible =
            visibleDotIndexes();


        dotsWrap.innerHTML = '';


        visible.forEach(
            function (index) {

                const dot =
                    document.createElement(
                        'button'
                    );


                dot.type = 'button';


                dot.className =
                    'gs-dot' +
                    (
                        index === active
                            ? ' active'
                            : ''
                    );


                dot.dataset.index =
                    index;


                dot.setAttribute(
                    'aria-label',
                    'Ke slide ' +
                    (index + 1)
                );


                dot.addEventListener(
                    'click',
                    function () {

                        goTo(index);

                    }
                );


                dotsWrap.appendChild(dot);

            }
        );
    }


    /* =======================================================
       RENDER CARD
    ======================================================= */

    function render() {

        cards.forEach(
            function (card, index) {

                const offset =
                    circularOffset(
                        index,
                        active,
                        n
                    );


                /*
                 * Hanya tampilkan:
                 *
                 * -2
                 * -1
                 *  0
                 *  1
                 *  2
                 *
                 * Sisanya hidden.
                 */

                card.dataset.pos =
                    Math.abs(offset) <= 2
                        ? String(offset)
                        : 'hidden';

            }
        );


        renderDots();
    }


    /* =======================================================
       PINDAH SLIDE
    ======================================================= */

    function goTo(index) {

        if (n === 0) {
            return;
        }


        /*
         * Membuat carousel infinite.
         */

        active =
            (
                (index % n) + n
            ) % n;


        render();

        restartAutoplay();
    }


    /* =======================================================
       NEXT
    ======================================================= */

    function next() {

        goTo(
            active + 1
        );
    }


    /* =======================================================
       PREVIOUS
    ======================================================= */

    function prev() {

        goTo(
            active - 1
        );
    }


    /* =======================================================
       AUTOPLAY
    ======================================================= */

    function restartAutoplay() {

        /*
         * Hapus timer lama.
         */

        if (timer) {

            clearInterval(timer);

            timer = null;
        }


        /*
         * Autoplay hanya kalau
         * ada lebih dari 1 card.
         */

        if (n > 1) {

            timer =
                setInterval(
                    next,
                    3500
                );
        }
    }


    /* =======================================================
       BUTTON EVENT
    ======================================================= */

    nextButton.addEventListener(
        'click',
        next
    );


    prevButton.addEventListener(
        'click',
        prev
    );


    /* =======================================================
       PAUSE SAAT MOUSE DI ATAS CAROUSEL
    ======================================================= */

    const stageWrap =
        document.querySelector(
            '.gs-stage-wrap'
        );


    if (stageWrap) {

        stageWrap.addEventListener(
            'mouseenter',
            function () {

                if (timer) {

                    clearInterval(timer);

                    timer = null;
                }
            }
        );


        stageWrap.addEventListener(
            'mouseleave',
            function () {

                restartAutoplay();

            }
        );
    }


    /* =======================================================
       SWIPE MOBILE
    ======================================================= */

    let touchStartX = 0;

    let touchEndX = 0;


    if (stageWrap) {

        stageWrap.addEventListener(
            'touchstart',
            function (event) {

                touchStartX =
                    event.changedTouches[0].screenX;

            },
            {
                passive: true
            }
        );


        stageWrap.addEventListener(
            'touchend',
            function (event) {

                touchEndX =
                    event.changedTouches[0].screenX;


                handleSwipe();

            },
            {
                passive: true
            }
        );
    }


    function handleSwipe() {

        const distance =
            touchEndX - touchStartX;


        /*
         * Swipe minimal 50px.
         */

        if (
            Math.abs(distance) < 50
        ) {
            return;
        }


        if (distance < 0) {

            next();

        } else {

            prev();
        }
    }


    /* =======================================================
       KEYBOARD
    ======================================================= */

    document.addEventListener(
        'keydown',
        function (event) {

            /*
             * Jangan mengganggu keyboard
             * ketika user sedang mengetik.
             */

            const tag =
                document.activeElement?.tagName;


            if (
                tag === 'INPUT' ||
                tag === 'TEXTAREA' ||
                tag === 'SELECT'
            ) {
                return;
            }


            if (
                event.key === 'ArrowRight'
            ) {

                next();
            }


            if (
                event.key === 'ArrowLeft'
            ) {

                prev();
            }

        }
    );


    /* =======================================================
       INITIAL RENDER
    ======================================================= */

    render();

    restartAutoplay();


})();
</script>

@endpush