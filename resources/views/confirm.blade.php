<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <title>内容確認 | お問い合わせフォーム</title>
  </head>
  <body>
    <div class="container">
      <h1>内容確認</h1>
      <form action="{{ route('index.thanks') }}" method="post">
        @csrf
        <table class="confirm_table">
          <tr>
            <th>お名前</th>
            <td>{{ $data['familyname'] }}{{ $data['firstname'] }}</td>
          </tr>
          <input type="hidden" name="fullname" value="{{ $data['familyname'] }}{{ $data['firstname'] }}">
          <tr>
            <th>性別</th>
            <td>
              @if ($data['gender']-1 === 0)
                男性
              @elseif ($data['gender']-2 === 0)
                女性
              @elseif ($data['gender']-3 === 0)
                その他
              @endif
            </td>
          </tr>
          <input type="hidden" name="gender" value="{{ $data['gender'] }}">
          <tr>
            <th>メールアドレス</th>
            <td>{{ $data['email'] }}</td>
          </tr>
          <input type="hidden" name="email" value="{{ $data['email'] }}">
          <tr>
            <th>郵便番号</th>
            <td>{{ $data['postcode'] }}</td>
          </tr>
          <input type="hidden" name="postcode" value="{{ $data['postcode'] }}">
          <tr>
            <th>住所</th>
            <td>{{ $data['address'] }}</td>
          </tr>
          <input type="hidden" name="address" value="{{ $data['address'] }}">
          <tr>
            <th>建物名</th>
            <td>{{ $data['building_name'] }}</td>
          </tr>
          <input type="hidden" name="building_name" value="{{ $data['building_name'] }}">
          <tr>
            <th>ご意見</th>
            <td>{{ $data['opinion'] }}</td>
          </tr>
          <input type="hidden" name="opinion" value="{{ $data['opinion'] }}">
        </table>
        <div class="btn">
          <input type="submit" value="送信">
        </div>
      </form>
      <form action="{{ route('index') }}" method="post">
        @csrf
        <input type="hidden" name="familyname" value="{{ $data['familyname'] }}">
        <input type="hidden" name="firstname" value="{{ $data['firstname'] }}">
        <input type="hidden" name="gender" value="{{ $data['gender'] }}">
        <input type="hidden" name="email" value="{{ $data['email'] }}">
        <input type="hidden" name="postcode" value="{{ $data['postcode'] }}">
        <input type="hidden" name="address" value="{{ $data['address'] }}">
        <input type="hidden" name="building_name" value="{{ $data['building_name'] }}">
        <input type="hidden" name="opinion" value="{{ $data['opinion'] }}">
        <div class="fixbtn">
          <input type="submit" value="修正する">
        </div>
      </form>
    </div>
  </body>
</html>