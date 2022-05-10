eval(%w(
s=32.chr;
n=10.chr;
syst
em(
"pdftotext" + s + "-layout" + s + "-nopgbrk" + s + ARGV[0] + s + "format.txt"+n
+"sed"+s+"-i"+s+"-e"+s+"s/¬//g" +s+"format.txt"+n
+"mkdir"+s+"split"+n
+"csplit" +s+ "-z" +s+ "-f" +s+ "split/splittxt" +s+ "format.txt" +s+ "/^Printed:/*/" +s+ "{*}"+n
+"grep" +s+ "Src" +s+ "split/splittxt00"+n
+"sed" +s+ "-i" +s+ "-e" +s+ '1d' +s+ "split/splittxt*"+n
+"sed" +s+ "-i" +s+ "-e" +s+ "'" +36.chr+100.chr+"'" +s+ "split/splittxt*"
)
)*"")
