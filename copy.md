# 写経を楽にしたい

# 作業手順

# dir 作成
シェルスクリプトで考える
pdfにまとめてディレクトリが記述されている

mkdirとtouch
mkdirは被っているとエラー

## pdf を textファイルに pdfTranceTxt.sh
コンソールでtextファイルに変換する
apt install poppler-utils
pdftotext -layout -nopgbrk "PDFファイル"

ailasに登録

## 行末文字を変換 txtformat.sh

## ページごとに分割 splittxt.sh
# テキストからphpファイルに変換
- 変換時にいらない要素 (行頭の数字と」をkaraに変換
- ファイルごとに区切って切り取り貼り付けをどう楽にする？
- ファイル先頭の文字は(
  ファイル名.php
  Page 1/2
  Pted: 2022/04/24 17:10:01
  Printed for: )で確定
- ページの終わりは</html>
# 2ページに渡るファイル pdf


