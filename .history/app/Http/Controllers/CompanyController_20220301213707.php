<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index($id)
    {
        $company = Company::select(
            'id',
            'title',
            'value',
        )
            ->where('id', $id)
            ->first();

        if (is_null($company)) {
            abort(404);
        }

        return view('company.index')
            ->with(['company' => $company]);
    }

    // フォーム
    public function contact()
    {
        return view('company.contact');
    }

    //  フォーム確認ページ
    public function confirm(Request $request) {

        $validated = $request->validate([
            'body' => 'required|max:255',
            'name' => 'required',
            'mail' => 'required|email:rfc',
        ],
            [
                'body.required' => 'お問い合わせ内容は必須です。',
                'name.required' => 'お名前は必須です。',
                'mail.required' => 'メールアドレスは必須です。',
                'body.max' => '入力文字数は255字までです。',
                'mail.email' => '正しいメールアドレスを入力してください。',
            ]);
        // dd($request);
        return view('company.confirm')->with(['request' => $request]);
    }


    // 12/9 テーブルストア用
    public function store(Request $request)
    {
        // 戻るボタンが押された場合
        if ($request->get('back')) {
            return redirect()->route('company.contact')->withInput();
        } else {
            $contact = new Contact();
            $contact->formkinds = $request->formkinds;
            $contact->body = $request->body;
            $contact->name = $request->name;
            $contact->kana = $request->kana;
            $contact->mail = $request->mail;
            $contact->tel = $request->tel;
            $contact->save();

            Mail::send('company.reminder', ['contact' => $request], function ($m) use ($request) {
                $m->from('test@example.com', 'Your Application');

                $m->to($request->mail, $request->name)->subject('Your Reminder!');
            });

            // 重複送信の防止
            $request->session()->regenerateToken();

            return redirect()->route('contact.send')->with(['name' => $contact->name, 'body' => $contact->body]);
        }
    }

    public function send()
    {
        return view('company.send');
    }
}
