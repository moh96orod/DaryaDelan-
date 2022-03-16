var productContent = document.getElementById("regionProduct");
var content = "";

var xmlHttp = new XMLHttpRequest();
xmlHttp.onreadystatechange = function() {
  if(this.readyState === 4 && this.status === 200) {
    const jsonData = JSON.parse(this.responseText);
    
    for(var i = 0; i < jsonData.length; i++) {
      content += `
		<label class='content5'>
			<img alt='${jsonData[i].name}' src='${jsonData[i].pic}' class=''/>
            <b><b onclick=" go ( ${jsonData[i].link} ) ">${jsonData[i].name}</b></b> |
            <b style='color: green;'>${jsonData[i].price}</b>
		</label>
	`;
    }

	productContent.innerHTML = content;
  }
};
xmlHttp.open("GET", "http://localhost/DaryaDelan/admin/Data.json", true);
xmlHttp.send();

function go(link) {
	windows.location.assign(link);
}