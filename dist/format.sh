#!/usr/bin/env bash
# pdf→txtに
pdftotext -layout -nopgbrk $1 format.txt
# 行末変換
sed -i -e "s/¬//g" format.txt
# ファイル分割
mkdir split
csplit -z -f split/split -b '%02u.txt' format.txt '/^Printed: 2022/*/' '{*}'
# 1行と最終行コメントを削除
sed -i -e "1d" split/split*.txt
sed -i -e '$d' split/split*.txt
# 作成ファイル一覧表示
grep "ファイル名" split/split*.txt
grep "ファイル名" split/split*.txt
