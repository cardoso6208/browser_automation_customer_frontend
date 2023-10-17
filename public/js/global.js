/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/global.js":
/*!********************************!*\
  !*** ./resources/js/global.js ***!
  \********************************/
/***/ (() => {

eval("window.isStrongPassword = function () {\n  var password = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : \"\";\n  // Check for minimum length of 8 characters\n  if (password.length < 8) {\n    return \"Password must be at least 8 characters long.\";\n  }\n\n  // Check for at least one uppercase letter\n  if (!/[A-Z]/.test(password)) {\n    return \"Password must contain at least one uppercase.\";\n  }\n\n  // Check for at least one lowercase letter\n  if (!/[a-z]/.test(password)) {\n    return \"Password must contain at least one lowercase.\";\n  }\n\n  // Check for at least one symbol\n  if (!/[!@#$%^&*()_+{}\\[\\]:;<>,.?~\\-]/.test(password)) {\n    return \"Password must contain at least one symbol.\";\n  }\n\n  // Check for at least one number\n  if (!/[0-9]/.test(password)) {\n    return \"Password must contain at least one number.\";\n  }\n  return \"\";\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJ3aW5kb3ciLCJpc1N0cm9uZ1Bhc3N3b3JkIiwicGFzc3dvcmQiLCJhcmd1bWVudHMiLCJsZW5ndGgiLCJ1bmRlZmluZWQiLCJ0ZXN0Il0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9nbG9iYWwuanM/NDJmNiJdLCJzb3VyY2VzQ29udGVudCI6WyJ3aW5kb3cuaXNTdHJvbmdQYXNzd29yZCA9IGZ1bmN0aW9uKHBhc3N3b3JkID0gXCJcIikge1xyXG4gICAgLy8gQ2hlY2sgZm9yIG1pbmltdW0gbGVuZ3RoIG9mIDggY2hhcmFjdGVyc1xyXG4gICAgaWYgKHBhc3N3b3JkLmxlbmd0aCA8IDgpIHtcclxuICAgICAgICByZXR1cm4gXCJQYXNzd29yZCBtdXN0IGJlIGF0IGxlYXN0IDggY2hhcmFjdGVycyBsb25nLlwiO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIENoZWNrIGZvciBhdCBsZWFzdCBvbmUgdXBwZXJjYXNlIGxldHRlclxyXG4gICAgaWYgKCEvW0EtWl0vLnRlc3QocGFzc3dvcmQpKSB7XHJcbiAgICAgICAgcmV0dXJuIFwiUGFzc3dvcmQgbXVzdCBjb250YWluIGF0IGxlYXN0IG9uZSB1cHBlcmNhc2UuXCI7XHJcbiAgICB9XHJcbiAgICBcclxuICAgIC8vIENoZWNrIGZvciBhdCBsZWFzdCBvbmUgbG93ZXJjYXNlIGxldHRlclxyXG4gICAgaWYgKCEvW2Etel0vLnRlc3QocGFzc3dvcmQpKSB7XHJcbiAgICAgICAgcmV0dXJuIFwiUGFzc3dvcmQgbXVzdCBjb250YWluIGF0IGxlYXN0IG9uZSBsb3dlcmNhc2UuXCI7XHJcbiAgICB9XHJcbiAgICBcclxuICAgIC8vIENoZWNrIGZvciBhdCBsZWFzdCBvbmUgc3ltYm9sXHJcbiAgICBpZiAoIS9bIUAjJCVeJiooKV8re31cXFtcXF06Ozw+LC4/flxcLV0vLnRlc3QocGFzc3dvcmQpKSB7XHJcbiAgICAgICAgcmV0dXJuIFwiUGFzc3dvcmQgbXVzdCBjb250YWluIGF0IGxlYXN0IG9uZSBzeW1ib2wuXCI7XHJcbiAgICB9XHJcbiAgICBcclxuICAgIC8vIENoZWNrIGZvciBhdCBsZWFzdCBvbmUgbnVtYmVyXHJcbiAgICBpZiAoIS9bMC05XS8udGVzdChwYXNzd29yZCkpIHtcclxuICAgICAgICByZXR1cm4gXCJQYXNzd29yZCBtdXN0IGNvbnRhaW4gYXQgbGVhc3Qgb25lIG51bWJlci5cIjtcclxuICAgIH1cclxuICAgIFxyXG4gICAgcmV0dXJuIFwiXCI7XHJcbn0iXSwibWFwcGluZ3MiOiJBQUFBQSxNQUFNLENBQUNDLGdCQUFnQixHQUFHLFlBQXdCO0VBQUEsSUFBZkMsUUFBUSxHQUFBQyxTQUFBLENBQUFDLE1BQUEsUUFBQUQsU0FBQSxRQUFBRSxTQUFBLEdBQUFGLFNBQUEsTUFBRyxFQUFFO0VBQzVDO0VBQ0EsSUFBSUQsUUFBUSxDQUFDRSxNQUFNLEdBQUcsQ0FBQyxFQUFFO0lBQ3JCLE9BQU8sOENBQThDO0VBQ3pEOztFQUVBO0VBQ0EsSUFBSSxDQUFDLE9BQU8sQ0FBQ0UsSUFBSSxDQUFDSixRQUFRLENBQUMsRUFBRTtJQUN6QixPQUFPLCtDQUErQztFQUMxRDs7RUFFQTtFQUNBLElBQUksQ0FBQyxPQUFPLENBQUNJLElBQUksQ0FBQ0osUUFBUSxDQUFDLEVBQUU7SUFDekIsT0FBTywrQ0FBK0M7RUFDMUQ7O0VBRUE7RUFDQSxJQUFJLENBQUMsZ0NBQWdDLENBQUNJLElBQUksQ0FBQ0osUUFBUSxDQUFDLEVBQUU7SUFDbEQsT0FBTyw0Q0FBNEM7RUFDdkQ7O0VBRUE7RUFDQSxJQUFJLENBQUMsT0FBTyxDQUFDSSxJQUFJLENBQUNKLFFBQVEsQ0FBQyxFQUFFO0lBQ3pCLE9BQU8sNENBQTRDO0VBQ3ZEO0VBRUEsT0FBTyxFQUFFO0FBQ2IsQ0FBQyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9nbG9iYWwuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/global.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/global.js"]();
/******/ 	
/******/ })()
;