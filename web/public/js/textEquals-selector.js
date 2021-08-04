$.expr[':'].textEquals = function(a, i, m) {  
    var textToFind = m[3].replace(/[-[\]{}(')*+?.[,\\^$|#\s]/g, '\\$&'); // escape special character for regex 
    return $(a).text().match("^" + textToFind + "$");
}; 