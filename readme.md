# pdfを読み取ってtxtファイルにページごとに分割,多少整形

## 完成品 dist/format.sh
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

split/splittxt00:     25   Src01: /ph35/scottadmin/public/index.php
split/splittxt00:     26   Src02: /ph35/scottadmin/public/error.php
split/splittxt00:     27   Src03: /ph35/scottadmin/public/css/main.css
split/splittxt00:     28   Src04: /ph35/scottadmin/classes/Conf.php
split/splittxt00:     29   Src05: /ph35/scottadmin/classes/entity/Dept.php
split/splittxt00:     30   Src06: /ph35/scottadmin/public/dept/showDeptList.php
split/splittxt00:     31   Src07: /ph35/scottadmin/public/dept/goDeptAdd.php
split/splittxt00:     32   Src08: /ph35/scottadmin/public/dept/deptAdd.php
split/splittxt00:     33   Src09: /ph35/scottadmin/public/dept/prepareDeptEdit.php
split/splittxt00:     34   Src10: /ph35/scottadmin/public/dept/deptEdit.php
split/splittxt00:     35   Src11: /ph35/scottadmin/public/dept/conﬁrmDeptDelete.php
split/splittxt00:     36   Src12: /ph35/scottadmin/public/dept/deptDelete.php

いいかんじにできないかな