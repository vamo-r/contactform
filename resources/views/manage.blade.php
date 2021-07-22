@extends('layouts.manage')
@section('title', '管理システム')

@section('content')
<div class="container">
  @if(!empty(session('flash_delete')))
    <p class="flash_delete">{{ session('flash_delete') }}</p>
  @elseif(!empty(session('flash_regist')))
    <p class="flash_delete">{{ session('flash_regist') }}</p>
  @endif
  <div class="search">
    <form action="{{ route('manage') }}" method="get">
      @csrf
      <div class="search__name">
        <label>お名前</label>
        <input type="text" name="fullname" value="{{ $fullname }}">
      </div>
      <div class="search__gender">
        <label>性別</label>
        <input type="radio" name="gender" value=""
        @if ($gender == null)
          checked
        @endif>
        全て
        <input type="radio" name="gender" value="1"
        @if ($gender == 1)
          checked
        @endif>
        男性
        <input type="radio" name="gender" value="2"
        @if ($gender == 2)
          checked
        @endif>
        女性
        <input type="radio" name="gender" value="3"
        @if ($gender == 3)
          checked
        @endif
        >その他
      </div>
      <div class="search__regist">
        <label>登録日</label>
        <input type="date" name="regist_start" value="{{ $regist_start }}">
        ~
        <input type="date" name="regist_end" value="{{ $regist_end }}">
      </div>
      <div class="search__email">
        <label>メールアドレス</label>
        <input type="text" name="email" value="{{ $email }}">
      </div>
      <div class="btn">
        <input type="submit" value="検索">
      </div>
    </form>
  </div>
  <div class="page">
    <p>
      全{{ $items -> total() }}件中　{{
        ($items->currentPage() - 1) * $items->perPage() + 1
      }}~{{
        (($items->currentPage() - 1) * $items->perPage() + 1) + (count($items) - 1)
      }}件
    </p>
    <div>
      {{ $items->appends(request()->input())->links() }}
    </div>
  </div>
  <div class="opinion_list">
    <table>
      <tr class="table_tr">
        <th class="id">ID</th>
        <th class="fullname">お名前</th>
        <th class="gender">性別</th>
        <th class="email">メールアドレス</th>
        <th class="opinion">ご意見</th>
        <th class="delete"></th>
      </tr>
      @forelse ($items as $item)
        <tr>
          <td class="id">{{ $item->id }}</td>
          <td class="fullname">{{ $item->fullname }}</td>
          <td class="gender">
            @if ($item->gender-1 === 0)
              男性
            @elseif ($item->gender-2 === 0)
              女性
            @elseif ($item->gender-3 === 0)
              その他
            @endif
          </td>
          <td class="email">{{ $item->email }}</td>
          <td class="opinion">{{ $item->opinion }}</td>
          <td class="delete">
            <form action="{{ route('manage.delete', ['id' => $item->id]) }}" method="post">
              @csrf
                <input type="submit" value="削除">
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6">
            <p class="no_result">見つかりませんでした。</p>
          </td>
        </tr>
      @endforelse
    </table>
  </div>
</div>
<script src="{{ asset('js/ellipsis.js') }}" defer></script>
@endsection