mkdir ph35/
mkdir ph35/scottadmin

grep "フォルダ=/" split/* >mkdir.txt

sed -i -e "s/split\///g" mkdir.txt

cat mkdir.txt | while read line
do
  mkdir "${line##*フォルダ=/}"
  mv split/${line%%:*} ${line##*フォルダ=/}${line%%:*}
done


# 1 文字列 grep繰り返し
# folders=`grep "フォルダ=/" split/split01.txt`
# echo ${folders##*フォルダ=/}

# 2 配列
# folders=($(grep "フォルダ=/" split/split**.txt))
