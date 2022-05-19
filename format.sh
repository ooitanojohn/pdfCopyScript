#!/usr/bin/env bash
# pdf→txtに
pdftotext -layout -nopgbrk $1 format.txt
# 行末変換
sed -i -e "s/¬//g" format.txt
# 行頭の数字削除 (dist.sh)
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

# ファイル開始時にコメントがないファイルは (cat.sh)
# ひとつ上の数字のファイルと結合
# bash url[https://qiita.com/akinomyoga/items/9761031c551d43307374]
declare file="ファイル名="
declare folder="ディレクトリ="

grep -L $file split/split**.txt >cat.txt
# 10進数 [https://kazmax.zpp.jp/cmd/e/expr.1.html#ah_4]
cat cat.txt | while read line
do
  num=${line:11:-4}
  num=`expr $num - 1`
  if [ $num -gt 0 ] ; then
    num=$(printf "%02d" $num)
    cat $line >>split/split$num.txt
    rm $line
  fi
done

# ファイルrename (rename.sh)
grep $file split/*.txt > rename.txt
cat rename.txt | while read line
do
  mv ${line%%:*} ${line%%/*}/${line##*$file}
done

#フォルダ一覧作成 [共通部分を手動で作る必要がある為その部分を取得して自動作成したい、重複をifで実行しないようにしたい] && 移動 (mkdir.sh)
grep $folder split/* >mkdir.txt

sed -i -e "s/split\///g" mkdir.txt
cat mkdir.txt | while read line
do
  mkdir "${line##*folder/}"
  mv split/${line%%:*} ${line##*$folder/}${line%%:*}
done

