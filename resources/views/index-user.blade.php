<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Tixid.id</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto+Condensed&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            background-color: #3a2617;
            color: #d6c9b6;
        }

        .playfair { font-family: 'Playfair Display', serif; }

        .underline-custom {
            text-decoration: underline;
            text-underline-offset: 3px;
            text-decoration-thickness: 1px;
        }

        .btn-outline {
            border: 1px solid #3a2617;
            color: #3a2617;
            background-color: #d6c9b6;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 0.75rem;
            line-height: 1rem;
            padding: 0.25rem 1.25rem;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background-color: #3a2617;
            color: #d6c9b6;
        }

        .btn-outline[disabled] {
            background-color: #3a2617;
            color: #d6c9b6;
            cursor: default;
            opacity: 0.7;
        }

        .btn-link {
            color: #d6c9b6;
            font-size: 0.75rem;
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        .btn-link:hover { color: #fff; }

        .btn-more {
            background-color: #fff;
            color: #3a2617;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 0.75rem;
            line-height: 1rem;
            padding: 0.5rem 0;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            border: none;
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .btn-more svg {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 16px;
            height: 8px;
            fill: #3a2617;
        }

        .scroll-vertical-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            color: #d6c9b6;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            user-select: none;
        }

        .table-fixed-layout {
            table-layout: fixed;
            width: 100%;
        }

        .table-fixed-layout td, .table-fixed-layout th {
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
</head>
<body class="relative">

    {{-- Top Image Section --}}
    <section class="relative w-full max-w-[1200px] mx-auto">
        <img class="w-full object-cover" src="{{ asset('storage/concert_images/wxzUs6fW2LBEwiuwLctnxK3Y9mhLVGpMq8B381w4.png') }}" src="public/storage/concert_images/0TEH91LuT0xsnZeDqgPYLRIyuRDQlsV2BY74l0qx.png" alt="Fujii Kaze Tour" />
        <div aria-hidden="true" class="scroll-vertical-text hidden md:block absolute top-1/2 left-0 -translate-y-1/2">scroll</div>
        <div class="absolute top-4 right-4 flex space-x-2">
            <button class="w-7 h-7 rounded-full border border-white text-white text-xs font-light flex items-center justify-center">Jp</button>
            <button class="w-7 h-7 rounded-full border border-white text-white text-xs font-light flex items-center justify-center">En</button>
        </div>
    </section>

    {{-- Artists Section --}}
    <section class="max-w-[1200px] mx-auto px-4 mt-10 md:mt-16">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-6">
            <div class="w-full md:w-1/5">

            </div>
            <div class="w-full md:w-4/5 border-b border-dotted border-[#d6c9b6] pb-2 md:pb-0">
                <p class="text-xs md:text-sm font-light mb-1">Tixid.id</p>
                <p class="text-xs md:text-sm font-light mb-1">


                </p>
                <p class="text-xs md:text-sm font-light">
                    [Tixid.id hanya tersedia di tenant offline!] <br/>
                    Book Ur Ticket Now On Sale!
                </p>
            </div>
        </div>
    </section>

    {{-- Information Section --}}
    <section class="max-w-[1200px] mx-auto px-4 mt-10 md:mt-16">
        <p class="underline-custom text-sm md:text-base font-light mb-4 cursor-default">Informasi Konser Tersedia</p>
        <div class="overflow-x-auto">
            <table class="table-fixed-layout border border-[#d6c9b6] text-[9px] md:text-xs font-light w-full">
                <thead>
                    <tr class="bg-[#d6c9b6] text-[#3a2617]">
                        <th class="border py-1 px-1">Concert Name</th>
                        <th class="border py-1 px-1">Venue</th>
                        <th class="border py-1 px-1">Date</th>
                        <th class="border py-1 px-1">Ticket Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($concerts as $concert)
                        <tr>
                            <td class="border py-1 px-1">{{ $concert->concert_name }}</td>
                            <td class="border py-1 px-1">{{ $concert->venue }}</td>
                            <td class="border py-1 px-1">{{ $concert->date }}</td>
                            <td class="border py-1 px-1 flex flex-col md:flex-row md:items-center justify-between gap-2">
                                <span>Rp {{ $concert->ticket_price }}</span>
                                <a href="{{ route('tickets.create', ['concert_id' => $concert->id])}}" class="btn-outline text-[8px] md:text-[10px] px-2 py-1 whitespace-nowrap">Pesan Sekarang</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button class="btn-more mt-6">
            General Information
            <svg aria-hidden="true" fill="none" viewBox="0 0 16 8" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L8 7L15 1" stroke="#3a2617" stroke-width="2" />
            </svg>
        </button>
    </section>

    {{-- Description Text --}}
    <section class="max-w-[1200px] mx-auto px-4 mt-10 md:mt-16 text-center text-[9px] md:text-xs font-light leading-tight">
        <p class="mb-2">Tixid.id yang asli hanya tersedia di tenant offline!</p>
        <p class="mb-2">Waspada terhadap penipuan, Tixid tidak pernah menyediakan tiket 1 hari sebelum konser!</p>
        <p class="mb-2 text-[7px] md:text-[9px] opacity-50">*Waspada Tixid.id tidak pernah menghubungi secara langsung!</p>
    </section>




    {{-- Footer --}}
    <footer class="max-w-[1200px] mx-auto mt-4 mb-8 px-4 text-center text-[#d6c9b6] text-[7px] font-light">
        <p>© 2025 PT.Tixid Solusi Indonesia All rights reserved.</p>
    </footer>
</body>
</html>
