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
    //無効なセッションのとき、$inputsを[]にする
    $inputs = $request->session()->get('contact_inputs') ?? [];

    return redirect()->route('contacts.index')->withInput($inputs);
  }

  public function store(Request $request)
  {
    //無効なセッション対策
    $inputs = $request->session()->get('contact_inputs') ?? [];

    Contact::create($inputs);

    // 二重送信防止のためセッションを空にする
    $request->session()->forget('contact_inputs');

    // 二重送信防止のためthanks()アクションを別途用意しview()ではなくredirect()を用いる
    // view()だとブラウザのアドレスバーのURL自体は変わらないため、更新(F5など)によって二重送信されてしまうリスクがある
    // redirect()を用いることでURL自体が送信完了画面のものになるため、誤送信を防止できる
    // 一般にPRG(Post Redirect Get)モデルと呼ばれる
    return redirect()->route('contacts.thanks');
  }

  public function thanks()
  {
    return view('contacts.thanks');
  }
}
