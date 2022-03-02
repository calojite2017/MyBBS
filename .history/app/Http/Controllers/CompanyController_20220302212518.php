<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    protected $company_repository;

    public function __construct(CompanyRepository $company_repository)
    {
        $this->company_repository = $company_repository;
    }

    public function index($id)
    {
        // $company = Company::select(
        //     'id',
        //     'title',
        //     'value',
        // )
        //     ->where('id', $id)
        //     ->first();
        $company = $this->company_repository->getCompanyDetails();

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


    // テーブル格納用
    public function store(Request $request)
    {
        // 戻るボタンが押された場合
        if ($request->get('back')) {
            return redirect()->route('contact')->withInput();
        } else {
            $contact = new Contact();
            $contact->formkinds = $request->formkinds;
            $contact->body = $request->body;
            $contact->name = $request->name;
            $contact->kana = $request->kana;
            $contact->mail = $request->mail;
            $contact->tel = $request->tel;
            $contact->save();

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
