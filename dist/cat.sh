# bash url[https://qiita.com/akinomyoga/items/9761031c551d43307374]
grep -L "ファイル名=" split/split**.txt >cat.txt
# ゼロ埋め [https://genzouw.com/entry/2019/03/06/080354/1087/]
# 10進数 [https://kazmax.zpp.jp/cmd/e/expr.1.html#ah_4]
# 条件式
cat cat.txt | while read line
do
  num=${line:11:-4}
  num=`expr $num - 1`
  if [ $num -gt 0 ] ; then
    num=$(printf "%02d" $num)
    $line >>split/split$num.txt | rm $line
  fi
done


