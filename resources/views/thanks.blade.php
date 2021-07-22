@extends('layouts.form')
@section('title', '送信完了')

@section('content')
<div class="container">
  <div class="thanks">
    <p>ご意見いただきありがとうございました。</p>
    <a href="{{ route('index') }}" class="btn">トップページへ</a>
  </div>
</div>
@endsection