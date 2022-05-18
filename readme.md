# pdfを読み取ってtxtファイルにページごとに分割,多少整形

## 5/20追記
- [x]全共通部分のファイル自動作成 ph35/scottadmin
## 足りないもの
- [o]ディレクトリ作成
  - [o]grepの結果を格納してmkdirの変数に渡す
- [o]行頭の数字を消したい
  - readlineで3行目から読み込み
- [o]ファイル名をファイルから読み込んで変更したい 現在は split[00~**].txt
- [o]検索結果に出て来ない、ファイル名がついていないものをcatで前のファイルと合体
  - ゼロ埋め[https://genzouw.com/entry/2019/03/06/080354/1087/]
- [o]ディレクトリ移動
## 5/17追記
- csplit[https://linuxcommand.net/csplit/#_-b]
- コマンド結果代入[https://it-ojisan.tokyo/grep-array/]
- 配列[https://qiita.com/b4b4r07/items/e56a8e3471fb45df2f59]
- grepした結果を配列に格納しようとすると同階層のファイル名も格納されている
- 検索処理を格納している？
- grepの-o でファイル名=正規表現で抜き出せないか | 末尾の要素を取り出して変数に代入
- readlineで読み込んだときにコメントの*をエスケープする方法?? → ""で囲んでいなかった
- grep結果は加工せずに新規ファイルに出力したほうが楽> file
## 05/10追記 dist/asciiFormat.rb
- アスキーアート化して実行可能な上記プログラム
- rubyからbash呼び出しで実行 (dist/format.rb)
- dist/rubyにアスキーアート化するプログラム
- 完成品をアスキーアート化した
![image](https://user-images.githubusercontent.com/71388489/167638472-fe0c8928-1f89-41dd-8b48-d2caea664b27.png)

## 完成品 dist/format.sh
https://user-images.githubusercontent.com/71388489/167428027-d7f8dc1a-2143-4ee5-8443-83447c97fa01.mp4
- bash format.sh PDFファイル名.pdfで実行


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

## ディレクトリ作成 grep Src split/*
- でディレクトリの行一覧検索
