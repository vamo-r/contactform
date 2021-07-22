@extends('layouts.form')
@section('title', 'フォーム')

@section('content')
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
            <input type="text" id="fullname" name="familyname" value="@if (empty($form_data['familyname'])){{ old('familyname') }}@elseif (!empty($form_data['familyname'])){{ $form_data['familyname'] }}@endif" required>
            <p>例）山田</p>
            @error('familyname')
              <p class="error">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <input type="text" id="fullname" name="firstname" value="@if (empty($form_data['firstname'])){{ old('firstname') }}@elseif (!empty($form_data['firstname'])){{ $form_data['firstname'] }}@endif" required>
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
          @if (empty($form_data['gender']))
            checked
          @elseif ($form_data['gender']-1 === 0)
            checked
          @endif
          >男性</label>
          <label for="gender"><input type="radio" id="gender" name="gender" value="2"
          @if (empty($form_data['gender']))
          @elseif ($form_data['gender']-2 === 0)
            checked
          @endif
          >女性</label>
          <label for="gender"><input type="radio" id="gender" name="gender" value="3"
          @if (empty($form_data['gender']))
          @elseif ($form_data['gender']-3 === 0)
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
          <input type="email" id="email" name="email" value="@if (empty($form_data['email'])){{ old('email') }}@elseif (!empty($form_data['email'])){{ $form_data['email'] }}@endif" required>
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
          <span>〒</span><input type="text" id="postcode" name="postcode" minlength="8" maxlength="8" value="@if (empty($form_data['postcode'])){{ old('postcode') }}@elseif (!empty($form_data['postcode'])){{ $form_data['postcode'] }}@endif" onKeyUp="$('#postcode').zip2addr('#address');" class="form__post" required>
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
          <input type="text" id="address" name="address" value="@if (empty($form_data['address'])){{ old('address') }}@elseif (!empty($form_data['address'])){{ $form_data['address'] }}@endif" required>
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
          <input type="text" id="building_name" name="building_name" value="@if (empty($form_data['building_name'])){{ old('building_name') }}@elseif (!empty($form_data['building_name'])){{ $form_data['building_name'] }}@endif">
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
          <textarea id="opinion" name="opinion" maxlength="120" class="opinion">@if (empty($form_data['opinion'])){{ old('opinion') }}@elseif (!empty($form_data['opinion'])){{ $form_data['opinion'] }}@endif</textarea>
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
@endsection