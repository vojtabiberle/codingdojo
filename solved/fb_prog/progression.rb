
class Progression
  
  private
  @file; @count; @set;
  
  public
  
  def initialize file
    @file = file
    load
  end
  
  def output
    print determine_missing
  end
  
  private
  
  def determine_missing
    step = determine_step
    @set.each_with_index do |x, i|
      unless @set[i+1] == nil
        if @set[i+1].to_i != (@set[i].to_i + step)
          print((@set[i].to_i + step).to_s)
          return
        end
      end
    end
    print 'first or last'
  end
  
  def load
    f = File.open @file
    i = 0
    
    f.each do |line|
      if i === 0
        init_count line
      elsif i === 1
        init_set line
      end
      i += 1
    end
  end
  
  def init_set line
    @set = line.split ' '
  end
  
  def init_count line
    @count = line.to_i
  end
  
  def determine_step
    first = @set.first.to_i
    last = @set.last.to_i
    ( last - first ) / @count
  end
  
end