@extends('layouts.manage')
@section('title', '権限設定')

@section('content')
<div class="container">
  @if(!empty(session('flash_update')))
    <p class="flash_delete">{{ session('flash_update') }}</p>
  @endif
  <table>
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <form action="{{ route('authority.change') }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $user->id }}">
          <td>
            <span>権限：</span>
            <select name="role">
              <option value="1" @if($user->role === 1)selected @endif>管理者</option>
              <option value="0" @if($user->role === 0)selected @endif>一般</option>
            </select>
          </td>
          <td><input type="submit" value="変更"></td>
        </form>
      </tr>
    @endforeach
  </table>
</div>
@endsection