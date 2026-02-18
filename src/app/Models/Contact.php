<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  public const COL_NAME = 'name';
  public const COL_EMAIL = 'email';
  public const COL_TEL = 'tel';
  public const COL_CONTENT = 'content';

  protected $fillable = [
    self::COL_NAME,
    self::COL_EMAIL,
    self::COL_TEL,
    self::COL_CONTENT,
  ];

  public const COL_LABELS = [
    self::COL_NAME => 'お名前',
    self::COL_EMAIL => 'メールアドレス',
    self::COL_TEL => '電話番号',
    self::COL_CONTENT => 'お問い合わせ内容',
  ];
}
