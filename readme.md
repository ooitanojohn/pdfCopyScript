# pdfを読み取ってtxtファイルにページごとに分割,多少整形

## 完成品 format.sh
- bash format.sh PDFファイル名.pdfで実行
## [実行動画 youtubeに移行](https://youtu.be/0qND7G4qoLI)
## 作業手順
dir 作成
シェルスクリプトで考える
pdfにまとめてディレクトリが記述されている

mkdirとtouch
mkdirは被っているとエラー

pdf を textファイルに pdfTranceTxt.sh
コンソールでtextファイルに変換する
apt install poppler-utils
pdftotext -layout -nopgbrk "PDFファイル"

ailasに登録

行末文字を変換 txtformat.sh
ページごとに分割 splittxt.sh
ディレクトリ作成 grep Src split/*
でディレクトリの行一覧検索
## 5/20追記
- [x]全共通部分のファイル自動作成 ph35/scottadmin

## 参考リンク
- 配列 [https://qiita.com/b4b4r07/items/e56a8e3471fb45df2f59]
- 正規表現 [https://murashun.jp/article/programming/regular-expression.html]
- 変数から文字列抜き出し[https://qiita.com/koara-local/items/04d3efd1031ea62d8db5]
- 一行ずつ読み込み [https://www.server-memo.net/shellscript/read-file.html#i]
- 置換とか[https://bioinfo-dojo.net/2017/09/15/bash_string/#toc18]
- 算術式 [https://qiita.com/akinomyoga/items/9761031c551d43307374]
- ファイル分割 [https://linuxcommand.net/csplit/#_-s]
- ファイル分割その二[https://takuya-1st.hatenablog.jp/entry/20110823/1314108412]
- 10進数 [https://kazmax.zpp.jp/cmd/e/expr.1.html#ah_4]
- ゼロ埋め [https://genzouw.com/entry/2019/03/06/080354/1087/]

## 分割ファイル
- [dist/](dist/)

