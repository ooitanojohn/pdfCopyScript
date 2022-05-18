grep "ファイル名=" split/split**.txt > rename.txt

cat rename.txt | while read line
do
  mv ${line%%:*} ${line%%/*}/${line##*ファイル名=}
done

# folders=($(grep "フォルダ名" split**.txt))
# echo ${folders[@]}
# num=(`ls`)
# echo ${#num[@]}
# declare -a FILE=[]
# FILE=`grep "ファイル名=" split/split04.txt`
# echo ${FILE##*ファイル名=}
# echo ${#FILE[@]}
# files=($(grep "ファイル名="split/split04.txt))
# echo ${#files[@]}
# echo ${files[11]}
# 末尾の配列を指定
# declare -i num=${#files[@]}-1
# echo ${files[num]}
# for i in ${files[@]}
# do
#   echo $i
# done