@extends('layouts.admin')

@section('title', 'Atur Jumlah Siswa')

@section('content')

    <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-xl shadow-sm p-6">

                <h1 style="
                    font-size: 24px;
                    font-weight: bold;
                    color: #1f2937;
                    margin-bottom: 5px;
                ">
                    Atur Jumlah Siswa
                </h1>

                <p style="
                    color: #6b7280;
                    margin-bottom: 25px;
                ">
                    Masukkan jumlah seluruh siswa di sekolah.
                </p>

                {{-- ERROR --}}
                @if ($errors->any())

                    <div style="
                        background-color: #fee2e2;
                        border: 1px solid #fecaca;
                        color: #991b1b;
                        padding: 15px;
                        border-radius: 8px;
                        margin-bottom: 20px;
                    ">

                        <ul style="margin: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif


                {{-- FORM --}}
                <form action="{{ route('admin.siswa.store') }}"
                      method="POST">

                    @csrf

                    <div style="margin-bottom: 25px;">

                        <label for="jumlah"
                               style="
                                   display: block;
                                   font-weight: 600;
                                   color: #374151;
                                   margin-bottom: 8px;
                               ">
                            Jumlah Siswa
                        </label>

                        <input
                            type="number"
                            name="jumlah"
                            id="jumlah"
                            value="{{ old('jumlah', $siswa->jumlah ?? '') }}"
                            min="0"
                            placeholder="Contoh: 500"
                            required
                            style="
                                width: 100%;
                                padding: 12px;
                                border: 1px solid #d1d5db;
                                border-radius: 8px;
                                font-size: 16px;
                            ">

                    </div>


                    {{-- TOMBOL --}}
                    <div style="
                        display: flex;
                        gap: 10px;
                    ">

                        <a href="{{ route('admin.siswa.index') }}"
                           style="
                               background-color: #6b7280;
                               color: white;
                               padding: 10px 20px;
                               border-radius: 8px;
                               text-decoration: none;
                               font-weight: 600;
                           ">
                            Kembali
                        </a>

                        <button type="submit"
                                style="
                                    background-color: #2563eb;
                                    color: white;
                                    padding: 10px 20px;
                                    border: none;
                                    border-radius: 8px;
                                    cursor: pointer;
                                    font-weight: 600;
                                ">
                            Simpan Jumlah
                        </button>

                    </div>

                </form>

            </div>

    </div>

@endsection