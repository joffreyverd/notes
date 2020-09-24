```js

// Know the used ram and the total ram can be used in the browser
navigator.storage.estimate()
  .then(function(estimate){
       console.log(`Using ${estimate.usage} out of ${estimate.quota} bytes.`);
  });

/**
* Update cities list depending selected practice
* @param {integer} idPractice Id of selected practice
* @param {boolean} refresh Need to refresh or not
*/
function updateCityList(idPractice, refresh) {
    return true;
}

// Add a class to an HTML element whitout erase the existing class
myHtmlDiv.classList.add('myClass');

// Access to the parentNode of a div, then access to the first child of it
myHtmlDiv.parentNode.firstChild;

// Remove totally the element from the DOM
document.getElementById('myElement').remove();
// Just hide it without delete 
document.getElementById('myElement').hide();

// Wait page load before instantiate variables and work
document.addEventListener("DOMContentLoaded", function(event) { 
  //do work
});

// Change checkbox value at each click event
const checkbox = document.getElementById('remember-me');
checkbox.addEventListener('change', (event) => {
    document.getElementById('remember-me').value = event.target.checked; 
})
