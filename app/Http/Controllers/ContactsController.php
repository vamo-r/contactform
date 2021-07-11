<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactsController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function fix(Request $request)
  {
    $data = $request->all();
    return view('index', ['data' => $data]);
  }

  public function confirm(Request $request)
  {
    $this->validate($request, Contact::$rules);
    $data = $request->all();
    return view('confirm', ['data' => $data]);
  }

  public function complete(Request $request)
  {
    $request->session()->regenerateToken();
    $contact = new Contact();
    $data = $request->all();
    unset($data['_token_']);
    $contact->fill($data)->save();
    return view('thanks');
  }

  public function manage()
  {
    $items = Contact::paginate(10);
    Paginator::useBootstrap();
    return view('manage', ['items' => $items]);
  }

  public function search(Request $request)
  {
  }

  public function delete(Request $request)
  {
    Contact::destroy($request->id);
    return redirect('manage')->with('flash_delete', '削除しました');
  }
}
