<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactsController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function confirm(Request $request)
  {
    $this->validate($request, Contact::$rules);
    $form_data = $request->all();
    return view('confirm', ['form_data' => $form_data]);
  }

  public function fix(Request $request)
  {
    $form_data = $request->all();
    return view('index', ['form_data' => $form_data]);
  }

  public function complete(Request $request, Contact $contact)
  {
    $request->session()->regenerateToken();
    $form_data = $request->all();
    $contact->saveContact($form_data);
    return view('thanks');
  }

  public function manage(Request $request)
  {
    $query = Contact::query();

    $fullname = $request->input('fullname');
    $gender = $request->input('gender');
    $regist_start = $request->input('regist_start');
    $regist_end = $request->input('regist_end');
    $email = $request->input('email');

    // 名前・メールアドレス検索
    foreach ($request->only(['fullname', 'email']) as $key => $value) {
      $query->where($key, 'LIKE', "%$value%")->get();
    }

    // 性別検索
    if ($request->has('gender') && $gender != '') {
      $query->where('gender', $gender)->get();
    }

    // 日付検索
    if ($request->has('regist_start') && $regist_start != '') {
      $query->where('created_at', '>=', Carbon::parse($request['regist_start'])->startOfDay());
    }
    if ($request->has('regist_end') && $regist_start != '') {
      $query->where('created_at', '<=', Carbon::parse($request['regist_end'])->endOfDay());
    }

    $items = $query->paginate(10);
    Paginator::useBootstrap();

    return view('manage', [
      'items' => $items,
      'fullname' => $fullname,
      'gender' => $gender,
      'regist_start' => $regist_start,
      'regist_end' => $regist_end,
      'email' => $email,
    ]);
  }

  public function delete(Request $request)
  {
    Contact::destroy($request->id);
    return redirect('manage')->with('flash_delete', '削除しました');
  }
}
