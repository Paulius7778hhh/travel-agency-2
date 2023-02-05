@extends('back.app')

@section('content')
    <form action="{{ route('admin-store') }}" method="post"><button>add</button>@csrf</form>
@endsection
