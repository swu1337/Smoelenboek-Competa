(function() {
  "use strict";
  function startSlider(callBackFunction) {
      var xml = new XMLHttpRequest();
      xml.onreadystatechange = function() {
        if (xml.readyState === 4 && xml.status === 200) {
          callBackFunction(xml);
        }
      };
      var url = "http://test.competa.com/js-movies-test/data/movies-json.php";
      xml.open('GET', url, true);
      xml.send();
    }

    function makeList(movies) {
      for (var i = 0; i < movies.length; i++) {
        var element = document.createElement("li");
        var figure = document.createElement("figure");
        var img = document.createElement("img");
        var figureCaption = document.createElement("figcaption");
        var text = document.createTextNode(movies[i].title);

        img.src = movies[i].img;
        figureCaption.appendChild(text);
        figure.appendChild(img);
        figure.appendChild(figureCaption);
        element.appendChild(figure);
        document.getElementsByTagName("ul")[0].appendChild(element);
      }
    }

    function isActionMovie(movie) {
      return movie.genre === "Action";
    }
    
    function isPositionRight(arrayPositions, item) {
      return arrayPositions.indexOf(item) > -1;
    }

    function goLeft(imageWidth, max, liRightPosition) {
      var position = window.getComputedStyle(document.querySelector("ul")).getPropertyValue("right");
      var currentRight = parseInt(position.split("px")[0]);

      if (isPositionRight(liRightPosition, currentRight)) {
        if (currentRight > 0){
          document.querySelector("ul").style.right = (currentRight - imageWidth) + "px";
        }
      }
    }

    function goRight(imageWidth, max, liRightPosition) {
      var position = window.getComputedStyle(document.querySelector("ul")).getPropertyValue("right");
      var currentRight = parseInt(position.split("px")[0]);

      if (isPositionRight(liRightPosition, currentRight)) {
        if (currentRight < (max - imageWidth)) {
          document.querySelector("ul").style.right = (currentRight + imageWidth) + "px";
        }
      }
    }

    function move(e, imageWidth, maxWidth, arrayPos) {
      switch(e.keyCode)
      {
        case 37 /*left*/:
          goLeft(imageWidth, 0, arrayPos);
          e.preventDefault();
          break;

        case 39 /*right*/:
          goRight(imageWidth, maxWidth, arrayPos);
          e.preventDefault();
          break;
        default: return false;
      }
    }

    startSlider(function(xml) {

      var jsonObject = JSON.parse(xml.responseText);
      var actionMovies = jsonObject.data[0].assets.concat(jsonObject.data[1].assets);
      actionMovies = actionMovies.filter(isActionMovie);

      makeList(actionMovies);

      var ul = document.getElementsByTagName("ul")[0];
      var IMAGE_WIDTH = document.getElementsByTagName("img")[0].offsetWidth;
      var maxWidthUL = ul.children.length * IMAGE_WIDTH;
      ul.style.width = maxWidthUL + "px";
      var liRightPosition = [];
      for(var i = 0; i < ul.children.length; i++) {
    	   liRightPosition[i] = ul.children[i].offsetWidth * i;
      }

      if (window.addEventListener) {
      		window.addEventListener("keyup",function(e) {
          	move(e, IMAGE_WIDTH, maxWidthUL, liRightPosition);
    			}, false);
    	}
      else {
      		window.attachEvent("onkeyup",function(e) {
            move(e, IMAGE_WIDTH, maxWidthUL, liRightPosition);
          }, false);
      }
    });//closing tag for startSlider parameter;

})();

// JS challenge - Movie Slider
// Test completed by: Steven Wu
// Date: 01-02-2016

/**
 * Rules
 * =====
 *
 * 1. You can use any third party libs in the left-side menu, but we prefer you to use vanilla javascript
 * 2. Don't pollute the global scope
 * 3. Source must be in JavaScript (e.g. not CoffeeScript)
 *
 *
 * Requirements
 * ============
 *
 * 1. Load all of the movies from the file "http://test.competa.com/js-movies-test/data/movies-json.php"
 * 2. Filter only movies of genre "Action"
 * 3. Display the movies in a horizontal row with picture and title
 * 4. Allow moving this row to the left and right using keyboard
 * 5. Animate the movement from step 4 using CSS transitions
 *
 * Good luck!
 */
