
min = 97

print "Zadej pismeno male abecedy (a-z): "
letter = gets.chomp

if letter.ord < 97 || letter.ord > 122
  puts 'Rikam a-z pico'
  exit
end

diff = 0

foo = 0

for l in min..(letter.ord-1) do
  ((letter.ord-1) - min - foo + 1).times { print ' ' }
  print l.chr
  (diff-1).times { print ' ' }
  print l.chr unless l == min
  puts
  diff += 2
  foo += 1
end

for l in (letter.ord).downto(min) do
  ((letter.ord-1) - min - foo + 1).times { print ' ' }
  print l.chr
  (diff+foo-(letter.ord-min+1)).times { print ' ' }
  print l.chr unless l == min
  puts
  diff -= 1
  foo -= 1
end