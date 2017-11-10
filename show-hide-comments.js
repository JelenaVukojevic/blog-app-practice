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

function promptMe(){
   var userAdjective = prompt("Do you really want to delete this post?");
   alert (userAdjective);
}