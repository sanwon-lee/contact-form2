# 環境構築の手順

実際にアプリを使用できるようにするための環境構築の手順は以下の通りです。（自分用）

- このリモートリポジトリをローカル環境にクローンします。（`git clone git@github.com:sanwon-lee/contact-form2 new-contact-form`など）
- プロジェクトのルート（`.git`が置かれているディレクトリ）で`cp .env.example .env`を実行し、`.env`を修正します。OSの環境変数による上書きも検討してください。
- `docker compose up -d --build`を実行します。
- `cp src/.env.example src/.env`を実行し、`src/.env`の以下の項目を修正します。

`src/.env`

```properties
<!-- 以下の4つの項目はプロジェクトルートの.envと揃えます -->
DB_HOST=replace_me
DB_DATABASE=replace_me
DB_USERNAME=replace_me
DB_PASSWORD=replace_me

<!-- 値をdatabaseにします -->
SESSION_DRIVER=file
```

- `docker compose exec php bash`を実行しphpコンテナ内部に移動します。（以下、ことわりがない限りphpコンテナ内部でコマンドを実行します。）
- `composer install`を実行します。
- `php artisan session:table`を実行します。（`src/database/migrations/`内部にすでに`xxxx_create_sessions_table`というマイグレーションファイルが存在する場合は不要です。）
- `php artisan migrate`を実行します。
- `php artisan key:generate`を実行します。
- インメモリテストを行いたい場合は`src/phpunit.xml`における以下の行のコメントアウトを外します。

```xml:src/phpunit.xml
<!-- <server name="DB_CONNECTION" value="sqlite"/> -->
<!-- <server name="DB_DATABASE" value=":memory:"/> -->
```

- (インメモリテストを行いたい場合)`php artisan test`を実行します。
- これでブラウザにアクセスしアプリを使用することができます。

# その他
