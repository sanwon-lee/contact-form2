# 環境構築の手順

実際にアプリを使用できるようにするための環境構築の手順は以下の通りです。

1. このリモートリポジトリをローカル環境にクローンします
1. プロジェクトのルート（.gitが置かれているディレクトリ）でcp .env.example .envを実行し、.envの内容を修正します
1. docker-compose.override.ymlを作成し必要に応じて以下の内容を記述します

```docker-compose.override.yml
services:
  php:
    build:
      args:
        - UID=自身のユーザーID
        - GID=自身のグループID
        - USER_NAME=使用したいユーザーネーム
        - GROUP_NAME=使用したいグループネーム
    user: "${UID:-1000}:${GID:-1000}"
    environment:
      - COMPOSER_HOME=/tmp/composer
```

1. docker compose up -d --buildを実行します
1. cp src/.env.example src/.envを実行し、src/.envの以下の項目を.envに合わせて修正します

```src/.env
DB_HOST
DB_DATABASE
DB_USERNAME
DB_PASSWORD

<!-- 値をfileからdatabaseにします -->
SESSION_DRIVER
```

1. docker compose exec php bashを実行しphpコンテナ内部に移動します（以下ことわりがない限りphpコンテナ内部でコマンドを実行します）
1. composer installを実行します
1. php artisan session:tableを実行します（src/database/migrations/内部にすでにcreate_sessions_tableというマイグレーションファイルが存在する場合は不要です）
1. php artisan migrateを実行します
1. php artisan key:generateを実行します
1. phpunitの代わりにpestを使いたい場合はsrc/phpunit.xmlにおいて以下のコメントアウトを外します

```src/phpunit.xml
<!-- <server name="DB_CONNECTION" value="sqlite"/> -->
<!-- <server name="DB_DATABASE" value=":memory:"/> -->
```

1. （pestを使う場合のみ）php artisan testを実行します
1. これでブラウザにアクセスしアプリを使用することができます

# その他
