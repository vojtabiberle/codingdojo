public class Corridor
{
	private int doorsQuantity = 100;
	private int currentTempo = 1;
	private Door[] doors;

	public Corridor()
	{
		this.doors = new Door[this.doorsQuantity];
		this.initDoors();
	}

	public Corridor(int doorsQuantity)
	{
		this.doorsQuantity = doorsQuantity;
		this.doors = new Door[this.doorsQuantity];
		this.initDoors();
	}

	private void initDoors()
	{
		for(int i = 0 ; i < this.doorsQuantity; i++)
		{
			this.doors[i] = new Door(false);
		}
	}

	public String toString()
	{
		StringBuilder sb = new StringBuilder();
		for(int i = 0 ; i < this.doorsQuantity; i++)
		{
			sb.append(this.doors[i]);
		}

		return sb.toString();
	}

	private void oneWalk()
	{
		for(int i = 0 ; i < this.doorsQuantity; i+=this.currentTempo)
		{
			this.doors[i].flip();
		}
	}

	public void walk()
	{
		do
		{
			this.oneWalk();
			this.currentTempo++;
		}while(this.currentTempo <= this.doorsQuantity);
	}

	public void test()
	{
		this.test(1);
	}

	public void test(int tempo)
	{
		this.currentTempo = tempo;
		this.oneWalk();
	}
}