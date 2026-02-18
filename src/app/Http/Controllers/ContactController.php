<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    return view('contacts.index');
  }

  public function confirm(ContactRequest $request)
  {
    $inputs = $request->validated();

    $request->session()->put('contact_inputs', $inputs);

    return view('contacts.confirm', [
      'inputs' => $inputs,
    ]);
  }

  public function back(Request $request)
  {
    $inputs = $request->session()->get('contact_inputs');

    // URL直打ち対策として
    if (!$inputs) {
      return redirect()->route('contacts.index');
    }

    return redirect()->route('contacts.index')->withInput($inputs);
  }

  public function store(Request $request)
  {
    $inputs = $request->session()->get('contact_inputs');

    // セッションタイムアウト対策
    if (!$inputs) {
      return redirect()->route('contacts.index')->with('message', 'セッションの有効期限が切れました。');
    }

    Contact::create($inputs);

    // 二重送信防止のためセッションを空にする
    $request->session()->forget('contact_inputs');

    // 二重送信防止のためview('contacts.thanks')ではなくredirectを用いる
    // thanks()アクションを別途用意する
    return redirect()->route('contacts.thanks');
  }

  public function thanks()
  {
    return view('contacts.thanks');
  }
}
