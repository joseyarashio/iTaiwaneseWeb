<%@ LANGUAGE=VBSCRIPT %>
<% RSDispatch %>

<!--#INCLUDE FILE="../rs.asp"-->
<SCRIPT RUNAT=SERVER Language=javascript>
	function Description()
	{ 
		this.Method1 = Method1;
		this.Method2 = Method2;
	}
	public_description = new Description();


	function Method1()
	{
		return new Date;
	}

	function Method2()
	{
		return new Array("blue","red","green","yellow","orange","purple","cyan","magenta");
	}

</SCRIPT>


