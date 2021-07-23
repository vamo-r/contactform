<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * 開発用コントローラー
 * 権限変更する為だけのもの
 */
class UserController extends Controller
{
  /**
   * 権限ページ表示
   */
  public function authority()
  {
    $users = User::all();
    return view('authority', ['users' => $users]);
  }

  /**
   * 権限変更メソッド
   */
  public function change(Request $request)
  {
    $users = User::find($request->id);
    $users->role = $request->role;
    $users->update();
    return redirect('authority')->with('flash_update', '更新しました');
  }
}
