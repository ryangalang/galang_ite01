@extends('layouts.app', ['page_title' => 'Students List'])

@section('content')
    <h2 class="students">{{ $user }}</h2>

    @if($isAdmin)
        <ul>
            @foreach ($students as $key => $student)
                <li style="font-size: 20px">{{ $key + 1 }}. {{ $student->fname . '' . $student->lname}}</li>
            @endforeach

            {!! $students->links() !!}
        </ul>
    @else
        <h1>Admin is False</h1>
    @endif    
@endsection

@section('css')
    <style>
        .students {
            text-align: center;
        }
    </style>
@endsection

@push('scripts')

@endpush
