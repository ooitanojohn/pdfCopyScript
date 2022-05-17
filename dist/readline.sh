touch split/dist00.txt
while read line
do
  ${line:2} >> /dist00.txt
done < split/split00.txt