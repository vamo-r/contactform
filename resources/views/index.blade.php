<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.zip2addr.js') }}"></script>
    <script src="{{ asset('js/ellipsis.js') }}"></script>
    <title>お問い合わせフォーム</title>
  </head>
  <body>
    <div class="container">
      <h1>お問い合わせ</h1>
      <form action="{{ route('index.confirm') }}" method="post" id="formCheck">
        @csrf
        <table>
          <tr>
            <th>
              <label for="fullname">お名前</label><span>※</span>
            </th>
            <td class="table__name">
              <div>
                <input type="text" id="fullname" name="familyname" value="@if (empty($data['familyname'])){{ old('familyname') }}@elseif (!empty($data['familyname'])){{ $data['familyname'] }}@endif" required>
                <p>例）山田</p>
                @error('familyname')
                  <p class="error">{{ $message }}</p>
                @enderror
              </div>
              <div>
                <input type="text" id="fullname" name="firstname" value="@if (empty($data['firstname'])){{ old('firstname') }}@elseif (!empty($data['firstname'])){{ $data['firstname'] }}@endif" required>
                <p>例）太郎</p>
                @error('firstname')
                  <p class="error">{{ $message }}</p>
                @enderror
              </div>
            </td>
          </tr>
          <tr>
            <th>
              <label>性別</label><span>※</span>
            </th>
            <td class="table__gender">
              <label for="gender"><input type="radio" id="gender" name="gender" value="1"
              @if (empty($data['gender']))
                checked
              @elseif ($data['gender']-1 === 0)
                checked
              @endif
              >男性</label>
              <label for="gender"><input type="radio" id="gender" name="gender" value="2"
              @if (empty($data['gender']))
              @elseif ($data['gender']-2 === 0)
                checked
              @endif
              >女性</label>
              <label for="gender"><input type="radio" id="gender" name="gender" value="3"
              @if (empty($data['gender']))
              @elseif ($data['gender']-3 === 0)
                checked
              @endif
              >その他</label>
              @error('gender')
                <p class="error">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th>
              <label for="email">メールアドレス</label><span>※</span>
            </th>
            <td>
              <input type="email" id="email" name="email" value="@if (empty($data['email'])){{ old('email') }}@elseif (!empty($data['email'])){{ $data['email'] }}@endif" required>
              <p>例）test@example.com</p>
              @error('email')
                <p class="error">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th>
              <label for="postcode">郵便番号</label><span>※</span>
            </th>
            <td class="table__postcode">
              <span>〒</span><input type="text" id="postcode" name="postcode" minlength="8" maxlength="8" value="@if (empty($data['postcode'])){{ old('postcode') }}@elseif (!empty($data['postcode'])){{ $data['postcode'] }}@endif" onKeyUp="$('#postcode').zip2addr('#address');" class="form__post" required>
              <p>例）123−4567</p>
              @error('postcode')
                <p class="error">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th>
              <label for="address">住所</label><span>※</span>
            </th>
            <td>
              <input type="text" id="address" name="address" value="@if (empty($data['address'])){{ old('address') }}@elseif (!empty($data['address'])){{ $data['address'] }}@endif" required>
              <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
              @error('address')
                <p class="error">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th>
              <label for="building_name">建物名</label>
            </th>
            <td>
              <input type="text" id="building_name" name="building_name" value="@if (empty($data['building_name'])){{ old('building_name') }}@elseif (!empty($data['building_name'])){{ $data['building_name'] }}@endif">
              <p>例）千駄ヶ谷マンション101</p>
              @error('building_name')
                <p class="error">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th>
              <label for="opinion">ご意見</label><span>※</span>
            </th>
            <td>
              <textarea id="opinion" name="opinion" maxlength="120" class="opinion">@if (empty($data['opinion'])){{ old('opinion') }}@elseif (!empty($data['opinion'])){{ $data['opinion'] }}@endif</textarea>
              @error('opinion')
                <p class="error">{{ $message }}</p>
              @enderror
            </td>
          </tr>
        </table>
        <div class="btn">
          <input type="submit" value="確認">
        </div>
      </form>
    </div>
  </body>
</html>