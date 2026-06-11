# Hare WordPress Theme

メンズサロンLPの静的HTMLをWordPressクラシックテーマに移植したサンプルです。デザインデータからのコーディング・WordPress化・投稿一覧のループ化までを個人で実装しました。

## デモ

- 元の静的HTML：[https://slow-sample.vercel.app](https://slow-sample.vercel.app)（同シリーズの別店舗版）
- WordPress版：ローカル環境（Local by Flywheel）で動作確認済み

## 概要

- **対象**：メンズサロン「Good life salon HARE」（架空店舗）のサイトサンプル
- **WordPress**：7.0（クラシックテーマ）
- **動作環境**：PHP 8.2 / MySQL 8.4
- **依存ライブラリ**：なし（プラグイン不要）

## 実装した内容

### 構造
1枚の静的index.htmlを以下のWordPressクラシックテーマ構成に分割・移植：

- `style.css` — テーマ情報ヘッダー + 全スタイル（元のインラインCSSを切り出し）
- `functions.php` — `wp_enqueue_style`でstyle.cssを読み込み
- `header.php` — DOCTYPE〜共通ヘッダー（`wp_head()`を含む）
- `footer.php` — フッター〜閉じタグ（`wp_footer()`を含む）
- `index.php` / `front-page.php` — トップページのbody部分
- `single.php` — 個別記事ページ

### 動的化（NEWSセクション）
管理画面の「投稿」から記事を追加すると、トップページの「お知らせ」セクションに自動で表示される仕組みを `WP_Query` で実装：

- 最新5件を「日付（Y.m.d）・タイトル」形式で一覧表示
- 各項目をクリックすると `single.php` で個別記事ページが開く
- 投稿が0件の場合は「現在お知らせはありません」と表示
- 既存セクション（CONCEPT / MENU / GALLERY / ACCESS / RESERVE）と統一感のあるデザインで実装

### デザイン継承
元の静的HTMLの世界観（ダーク背景＋ゴールドアクセント、Shippori Mincho・Noto Serif JP・Cormorant Garamond使用）を1pxも崩さず継承。

## 構成の特徴

- **クラシックテーマ**（ブロックテーマではない）で実装
- 不要な抽象化を避け、必要最小限のファイル構成（テーマファイル6つ + single.php）
- 既存セクションの装飾・配置は元HTMLから一切変更なし
- CSSのキャッシュ対策にバージョン管理を導入

## ファイル一覧

| ファイル | 役割 |
|---|---|
| `style.css` | テーマ情報 + 全スタイル |
| `functions.php` | スタイル読み込み |
| `header.php` | 共通ヘッダー |
| `footer.php` | 共通フッター |
| `index.php` | トップページ（記事一覧テンプレ） |
| `front-page.php` | トップページ（固定ページ用） |
| `single.php` | 個別記事ページ |
| `index.html` | 移植元の静的HTML（参考用） |

## 制作者

小林大悟（@xa2c7lw3q）  
Email: xiaolindaw@gmail.com
