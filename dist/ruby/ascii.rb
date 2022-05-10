# アスキーアート読み込み
require_relative "./ascii.gen.rb"

# プログラム本体
code = <<'END'
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
END

# プログラムから空白文字や改行文字を取り除く
code = code.split.join

# アスキーアート化のための工夫を入れる
code = 'eval(%w(' + code + ')*"")'
# code = 'eval(%w(' + code + ')*"")'

# テンプレートの # にコードを一文字ずつ入れていく
code = asciiart.gsub("$") { code.slice!(0, 1) }
# hash = {"$" => code.slice!(0, 1), "/" => code.slice!(0, 1),"_" => code.slice!(0, 1),"|" => code.slice!(0, 1)}
# code = asciiart.gsub(/$|\/|_|'|'/,hash)

# 生成物を出力する
puts code

