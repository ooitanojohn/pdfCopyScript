mkdir ph35/
mkdir ph35/scottadmin

grep "フォルダ=/" split/split**.txt >mkdir.txt

cat mkdir.txt | while read line
do
  mkdir "${line##*フォルダ=/}"
done


# 1 文字列 grep繰り返し
# folders=`grep "フォルダ=/" split/split01.txt`
# echo ${folders##*フォルダ=/}

# 2 配列
# folders=($(grep "フォルダ=/" split/split**.txt))
