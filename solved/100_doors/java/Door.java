public class Door
{
	private boolean open = false;

	public Door()
	{
		this.open = false;
	}

	public Door(boolean open)
	{
		this.open = open;
	}

	public boolean isOpen()
	{
		return this.open;
	}

	public boolean isClose()
	{
		return !this.open;
	}

	public void open()
	{
		this.open = true;
	}

	public void close()
	{
		this.open = false;
	}

	public void flip()
	{
		if(this.isOpen())
		{
			this.close();
		}
		else
		{
			this.open();
		}
	}

	public String toString()
	{
		if(this.isOpen())
		{
			return new String("[ ] ");
		}
		else
		{
			return new String("[X] ");
		}
	}

}