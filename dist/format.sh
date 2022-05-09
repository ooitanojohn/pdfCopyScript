#!/usr/bin/env bash
# pdf→txtに
pdftotext -layout -nopgbrk $1 format.txt
# 行末変換
sed -i -e "s/¬//g" format.txt
# ファイル分割
csplit -z -f split/splittxt format.txt '/^Printed: 2022/*/' '{*}'
# 作成ファイル一覧表示
grep Src split/*
# 1行と最終行コメントを削除
sed -i -e "1d" split/splittxt*
sed -i -e '$d' split/splittxt*