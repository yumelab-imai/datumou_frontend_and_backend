閲覧いただきありがとうございます。

# URL 一覧  

- **実務未経験の時に作成したポートフォリオ (PC専用)**  
サイトURL  
※ローカルのみ(近日中にVercelでデプロイ予定)

- **GitHub**  
https://github.com/Masanarea/future_next_laravel_app

- **今回作成した『Next.js,TypeScript,Mysql,Laravelが使用できるDocker環境』汎用版リポジトリ**  
https://github.com/Masanarea/fundamental_next_laravel_app_v2-


- **Instagram(ポートフォリオ以外の Web アプリ作品投稿、アウトプット用)**  
(随時、開発画面をアップロード予定)
https://instagram.com/masa_344_/


# アプリケーション概要  
**脱毛クリニック検索に特化したアプリです。**



## アプリケーションの制作経緯  



## アプリケーション詳細
<img width="1440" alt="スクリーンショット 2023-02-08 23 19 39" src="https://user-images.githubusercontent.com/93495976/217555581-34558a85-9227-4d7f-abee-addf3e1d7e84.png">

<img width="1440" alt="スクリーンショット 2023-02-08 23 23 21" src="https://user-images.githubusercontent.com/93495976/217557091-484951d3-a290-4c0c-929b-4405db6a5026.png">

*上記サイトを参考に開発環境の構築を行いました。
https://maasaablog.com/development/frontend/nextjs/3104/

<img width="1440" alt="スクリーンショット 2023-02-08 23 22 26" src="https://user-images.githubusercontent.com/93495976/217556777-0c403a1d-b96d-4c57-bb8b-e66aea182f5c.png">


## **使用技術の詳細(バージョンや使用ツール)**
- **フロントエンド**

  - **React.js 18..**
  - **TypeScript 18..**
  - **Next.js 13..**

- **バックエンド**

  - **PHP 8.0.2**
  - **Laravel 9.0**
  - **PHPUnit **

- **インフラ**
(AWSデプロイを検討していたが、コストが高かったため急遽変更)

  - **Docker 20.10.12 / docker-compose 2.2.3**
  - **nginx 1.18**
  - **mysql 8.0**
  - **Vercel(フロント側、バックエンド側を区別してそれぞれデプロイ)**
  - **PlanetScale(Baas, MySQL)**

- **その他使用ツール**
  - Intelチップ搭載 MacBook Air / 　MacOS version 12.1
  - Visual Studio Code
  - Git CLI
  - Slack
  - GitHub
  - Huskey + Prettier(コーディング ・ commit ・ push する時に、PHP のソースコードを整形してくれるスクリプトを実行するように設定)
  - Notion （開発中に参考になった記事を管理）
  - PageSpeed Insights（ページに関する実際のパフォーマンスデータを表示/点数化）

- **GitHub の使用方法に関して**
  - master ブランチと develop ブランチの二つで作業を進める(作業効率優先)
  - 機能を追加する際に Issue を利用(する予定)
  - feature ブランチ でtestが通らない場合、master ブランチにマージできないように設定(予定)

