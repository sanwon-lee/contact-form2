# 環境構築の手順

実際にアプリを使用できるようにするための環境構築の手順は以下の通りです。

- このリモートリポジトリをローカル環境にクローンします。
- プロジェクトのルート（`.git`が置かれているディレクトリ）で`cp .env.example .env`を実行し、`.env`を修正します。Docker / System Settingsの項目はOSの環境変数で上書きすることも可能です。
- `docker compose up -d --build`を実行します。
- `cp src/.env.example src/.env`を実行し、`src/.env`の以下の項目を修正します。

```properties
<!-- 以下の4つの項目はルートの.envに合わせます -->
DB_HOST
DB_DATABASE
DB_USERNAME
DB_PASSWORD

<!-- 値をfileからdatabaseにします -->
SESSION_DRIVER
```

- `docker compose exec php bash`を実行しphpコンテナ内部に移動します。（以下ことわりがない限りphpコンテナ内部でコマンドを実行します。）
- `composer install`を実行します。
- `php artisan session:table`を実行します。（src/database/migrations/内部にすでにcreate_sessions_tableというマイグレーションファイルが存在する場合は不要です。）
- `php artisan migrate`を実行します。
- `php artisan key:generate`を実行します。
- PHPUnitの代わりにPestを使いたい場合は`src/phpunit.xml`において以下のコメントアウトを外します。

```xml:src/phpunit.xml
<!-- <server name="DB_CONNECTION" value="sqlite"/> -->
<!-- <server name="DB_DATABASE" value=":memory:"/> -->
```

- （Pestを使う場合のみ）`php artisan test`を実行します。
- これでブラウザにアクセスしアプリを使用することができます。

# その他
