function hideComments() {
    var comment = document.getElementById("comments");
    var btn = document.getElementById("hideshow");
    if (comment.style.display === "none") {
    	hideshow.innerHTML = 'Hide comments'
        comment.style.display = "block";
    } else {
    	hideshow.innerHTML = 'Show comments'
        comment.style.display = "none";
    }
}

function required() {  
	var empty = document.forms["comments"]["author"]["text"].value;  
	if (empty == "")  
	{  
		document.getElementById("alert").removeClassList("hidden");  
		return false;  
	}  
	else   
	{   
		document.getElementById("alert").addClassList("hidden");
		return true;   
	}  
}