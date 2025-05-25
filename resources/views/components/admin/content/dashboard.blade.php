@extends('components.admin.main')

@section('content')
    <h1 class="font-bold text-3xl pt-4 pb-6 px-1 text-white">
        Dashboard Admin
    </h1>
    <div class="flex gap-10">
        <div
            class="block max-w-md min-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 ">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Guru</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="text-xl text-gray-700 dark:text-white">
                    {{ $total_guru }}
                </span>
            </p>
        </div>
        <div
            class="block max-w-md min-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 ">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Siswa</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 flex items-center gap-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="text-xl text-gray-700 dark:text-white">
                    {{ $total_siswa }}
                </span>
            </p>
        </div>
    </div>
@endsection
