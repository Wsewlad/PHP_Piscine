window.onload = main();

function main()
{
	var count = 0;
	document.getElementById('new').addEventListener('click', add);
	if (document.cookie != "")
	{
		var all_nodes = document.cookie.split(';');
		for (var i = 0; i < all_nodes.length; i++)
		{
			var node = all_nodes[i];
			while (node.charAt(0) == ' ')
			{
				node = node.substring(1);
			}
			if (node.indexOf("node_") == 0)
			{
				var id = node.substring(5, node.indexOf('='));
				var text = node.substring(node.indexOf('=') + 1, node.length);
				addToList(id, text);
				count++;
			}
		}
		if (count == 0)
			setCookie("id_iter", "", -1);
	}
}

function add()
{
	var id_iter = (getCookie("id_iter")) ? getCookie("id_iter") : 0;
	var todo_txt = prompt("Enter your todo task:");
	if (todo_txt != null && todo_txt != "")
	{
		addToList(id_iter, todo_txt);
		setCookie('node_' + id_iter, todo_txt, 1);
		id_iter++;
		setCookie("id_iter", id_iter, 1);
	}
}

function addToList(node_id, node_value)
{
	var list = document.getElementById('ft_list');
	var new_elem = document.createElement('div');
	var text = document.createTextNode(node_value);
	new_elem.appendChild(text);
	new_elem.addEventListener('click', remove);
	new_elem.setAttribute('id', 'node_' + node_id);
	list.insertBefore(new_elem, list.firstChild);
}

function remove()
{
	var todel = confirm("Delete it?");
	if (todel)
	{
		setCookie(this.id, "", -1);
		this.parentElement.removeChild(this);
	}
}

function setCookie(cname, cvalue, exdays)
{
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname)
{
	var name  = cname + "=";
	var all_nodes = document.cookie.split(';');
	for (var i = 0; i < all_nodes.length; i++)
	{
		var node = all_nodes[i];
		while (node.charAt(0) == ' ')
		{
			node = node.substring(1);
		}
		if (node.indexOf(name) == 0)
		{
			return node.substring(name.length, node.length);
		}
	}
	return "";
}