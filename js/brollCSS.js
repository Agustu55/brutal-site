// Get HTML head element
var image = document.getElementsByTagName('img1div');  
var image = document.getElementsByTagName('img1');

// Create new link Element
var link = document.createElement('link');

// set the attributes for link element
link.rel = 'stylesheet';

link.type = 'text/css';

link.href = 'style.css';

// Append link element to HTML head
head.appendChild(link);
