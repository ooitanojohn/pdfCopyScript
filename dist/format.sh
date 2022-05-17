#!/usr/bin/env bash
# pdf→txtに
pdftotext -layout -nopgbrk $1 format.txt
# 行末変換
sed -i -e "s/¬//g" format.txt
# 行頭の数字削除
rm dist.txt
cat format.txt | while read line
do
  echo "${line:3}" >> dist.txt
done
rm format.txt
# ファイル分割
rm -rf split
mkdir split
# -s 出力時コンソール出さない url[https://linuxcommand.net/csplit/#_-s]
csplit -s -z -f split/split -b '%02u.txt' dist.txt '/^nted: 2022/*/' '{*}'
# 1行と最終行コメントを削除
sed -i -e "1d" split/split*.txt
sed -i -e '$d' split/split*.txt

#フォルダ一覧作成 [共通部分を手動で作る必要がある為その部分を取得して自動作成したい、重複をifで実行しないようにしたい]
grep "フォルダ=/" split/split**.txt >mkdir.txt
cat mkdir.txt | while read line
do
  mkdir "${line##*フォルダ=/}"
done
# 作成ファイル一覧表示
grep "ファイル名=" split/split*.txt
