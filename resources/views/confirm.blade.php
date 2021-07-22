@extends('layouts.form')
@section('title', '内容確認')

@section('content')
<div class="container">
  <h1>内容確認</h1>
  <form action="{{ route('index.thanks') }}" method="post">
    @csrf
    <table class="confirm_table">
      <tr>
        <th>お名前</th>
        <td>{{ $form_data['familyname'] }}{{ $form_data['firstname'] }}</td>
      </tr>
      <input type="hidden" name="fullname" value="{{ $form_data['familyname'] }}{{ $form_data['firstname'] }}">
      <tr>
        <th>性別</th>
        <td>
          @if ($form_data['gender']-1 === 0)
            男性
          @elseif ($form_data['gender']-2 === 0)
            女性
          @elseif ($form_data['gender']-3 === 0)
            その他
          @endif
        </td>
      </tr>
      <input type="hidden" name="gender" value="{{ $form_data['gender'] }}">
      <tr>
        <th>メールアドレス</th>
        <td>{{ $form_data['email'] }}</td>
      </tr>
      <input type="hidden" name="email" value="{{ $form_data['email'] }}">
      <tr>
        <th>郵便番号</th>
        <td>{{ $form_data['postcode'] }}</td>
      </tr>
      <input type="hidden" name="postcode" value="{{ $form_data['postcode'] }}">
      <tr>
        <th>住所</th>
        <td>{{ $form_data['address'] }}</td>
      </tr>
      <input type="hidden" name="address" value="{{ $form_data['address'] }}">
      <tr>
        <th>建物名</th>
        <td>{{ $form_data['building_name'] }}</td>
      </tr>
      <input type="hidden" name="building_name" value="{{ $form_data['building_name'] }}">
      <tr>
        <th>ご意見</th>
        <td>{{ $form_data['opinion'] }}</td>
      </tr>
      <input type="hidden" name="opinion" value="{{ $form_data['opinion'] }}">
    </table>
    <div class="btn">
      <input type="submit" value="送信">
    </div>
  </form>
  <form action="{{ route('index') }}" method="post">
    @csrf
    <input type="hidden" name="familyname" value="{{ $form_data['familyname'] }}">
    <input type="hidden" name="firstname" value="{{ $form_data['firstname'] }}">
    <input type="hidden" name="gender" value="{{ $form_data['gender'] }}">
    <input type="hidden" name="email" value="{{ $form_data['email'] }}">
    <input type="hidden" name="postcode" value="{{ $form_data['postcode'] }}">
    <input type="hidden" name="address" value="{{ $form_data['address'] }}">
    <input type="hidden" name="building_name" value="{{ $form_data['building_name'] }}">
    <input type="hidden" name="opinion" value="{{ $form_data['opinion'] }}">
    <div class="fixbtn">
      <input type="submit" value="修正する">
    </div>
  </form>
</div>
@endsection