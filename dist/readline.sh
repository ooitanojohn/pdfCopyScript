rm dist.txt
cat format.txt | while read line
do
  echo "${line:3}" >> dist.txt
done