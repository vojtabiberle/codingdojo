
require_relative 'minefield'

field = Minefield.new 'mines.txt'
field.calculate
field.output