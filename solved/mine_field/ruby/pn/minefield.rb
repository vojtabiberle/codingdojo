
class Minefield
  
  public
  @file; @field; @dimensions
  
  def initialize file
    @file = file
    load
  end
  
  def output
    for i in 0..@dimensions[0].to_i-1
      for j in 0..@dimensions[1].to_i-1
        if @matrix[i][j] == -1
          print '*'
        else
          print @matrix[i][j].to_s
        end
      end
      puts
    end
  end
  
  def calculate
    for x in 0..@dimensions[0].to_i-1
      for y in 0..@dimensions[1].to_i-1
        if is_mine x,y
          increment_siblings x,y
        end
      end
    end
  end
  
  private
  
  def is_mine x,y
    return @matrix[x][y] == -1
  end
  
  def increment_siblings x,y
    for i in x-1...x+2
      for j in y-1...y+2
        if i >= 0 && j >= 0 && i < @dimensions[0].to_i && j < @dimensions[1].to_i
          unless @matrix[i][j].to_i == -1
            @matrix[i][j] += 1
          end
        end
      end
    end
  end
  
  def load
    f = File.open @file
    i = 0
    @dimensions = [0,0]
    
    f.each do |line|
      i += 1
      if i > 1
        init_matrix unless @matrix
        for y in 0..line.length-1 do
          x = i - 2
          @matrix[x][y] = -1 if line[y] == '*'
        end
      else
        determine_dimensions line
      end
    end
  end
  
  def determine_dimensions line
    @dimensions = line.split ' '
  end
  
  def init_matrix
    @matrix = Array.new @dimensions[0].to_i, 0
    for i in 0..@dimensions[0].to_i-1
      @matrix[i] = Array.new @dimensions[1].to_i, 0
    end
  end
  
end