function validateForm(form,length)
{
	for(i=0;i<=length;i++)
	{
		
		if(form.elements[i].type=="select-one")
		{	var result="";
			if(form.elements[i].value=="NA")
				{
					result+=form.elements[i].name+" is Required ! ";
					form.elements[i].focus();
					document.getElementById(form.elements[i].name+"Err").innerHTML=result;
					return false;
				}
			else document.getElementById(form.elements[i].name+"Err").innerHTML=result;
		}
		else if(form.elements[i].type=="file")
		{
			var result="";
			if(form.elements[i].value=="")
			{
				result+=form.elements[i].name+" is Required";
				form.elements[i].focus();
				alert(result);
				return false;
			}
			else document.getElementById(form.elements[i].name+"Err").innerHTML=result;
		}
		else 
		{
			var result="";
			if(form.elements[i].value=="")
			{
				result+=form.elements[i].name+" is Required !";
				form.elements[i].focus();
				document.getElementById(form.elements[i].name+"Err").innerHTML=result;
				return false;
			}
			else document.getElementById(form.elements[i].name+"Err").innerHTML=result;	
		}
	
	}
}

function drop_div()
{
	var x=document.getElementById("signout");
	if(x)
	x.style.display = "block";
	else ;
}

function hide_div(){
	var x=document.getElementById("signout");
	if(x)
	x.style.display = "none";
	else ;
}

function getData(id)
{
	console.log("get data");
	request = new XMLHttpRequest();
    request.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
            loadProfileData(this);
            //document.getElementById("data").innerHTML = this.responseText;
    };
	request.open("get","profile.php?id="+id,true);
	request.send();
}

function loadProfileData(raw_data)
{
	var form = document.getElementById("profile");
	var data=raw_data.responseText;
    console.log(data);
    form['name'].value=data[0];
	document.getElementById("data").innerHTML=raw_data.responseText;
}