window.lzld||function(e,d){function m(){n=!0;f();setTimeout(f,25)}function p(a){var b=0;return function(){var c=+new Date;20>c-b||(b=c,a.apply(this,arguments))}}function h(a,b,c){a.attachEvent?a.attachEvent&&a.attachEvent("on"+b,c):a.addEventListener(b,c,!1)}function k(a,b,c){a.detachEvent?a.detachEvent&&a.detachEvent("on"+b,c):a.removeEventListener(b,c,!1)}function q(a,b){return x||y(d.documentElement,a)&&a.getBoundingClientRect().top<r+200?(a.onload=null,a.removeAttribute("onload"),a.onerror=null, a.removeAttribute("onerror"),a.src=a.getAttribute("data-frz-src"),a.removeAttribute("data-frz-src"),g[b]=null,!0):!1}function s(){return 0<d.documentElement.clientHeight?d.documentElement.clientHeight:d.body&&0<d.body.clientHeight?d.body.clientHeight:0<e.innerHeight?e.innerHeight:200}function t(){var a=g.length,b,c=!0;for(b=0;b<a;b++){var d=g[b];null===d||q(d,b)||(c=!1)}c&&n&&(l=!0,k(e,"resize",u),k(e,"scroll",f),k(e,"touchmove",f),k(e,"load",m))}function v(){l=!1;h(e,"resize",u);h(e,"scroll",f); h(e,"touchmove",f)}function z(){var a=HTMLImageElement.prototype.getAttribute;HTMLImageElement.prototype.getAttribute=function(b){return"src"===b?a.call(this,"data-frz-src")||a.call(this,b):a.call(this,b)}}function w(a,b){var c,d;if(b){if(Array.prototype.indexOf)return Array.prototype.indexOf.call(b,a,c);d=b.length;for(c=c?0>c?Math.max(0,d+c):c:0;c<d;c++)if(c in b&&b[c]===a)return c}return-1}var r=s(),g=[],n=!1,l=!1,u=p(function(){r=s()}),f=p(t),x=/(iPad|iPhone|iPod)/g.test(navigator.userAgent);e.HTMLImageElement&& z();e.lzld=function(a){-1===w(a,g)&&(l&&v(),q(a,g.push(a)-1))};(function(a){function b(c){if("readystatechange"!==c.type||"complete"===d.readyState)k("load"===c.type?e:d,c.type,b),f||(f=!0,a())}function c(){try{d.documentElement.doScroll("left")}catch(a){setTimeout(c,50);return}b("poll")}var f=!1,g=!0;if("complete"===d.readyState)a();else{if(d.createEventObject&&d.documentElement.doScroll){try{g=!e.frameElement}catch(l){}g&&c()}h(d,"DOMContentLoaded",b);h(d,"readystatechange",b);h(e,"load",b)}})(function(){for(var a= d.getElementsByTagName("img"),b,c=0,e=a.length;c<e;c+=1)b=a[c],b.getAttribute("data-frz-src")&&-1===w(b,g)&&g.push(b);t();setTimeout(f,25)});h(e,"load",m);v();var y=d.documentElement.compareDocumentPosition?function(a,b){return!!(a.compareDocumentPosition(b)&16)}:d.documentElement.contains?function(a,b){return a!==b&&(a.contains?a.contains(b):!1)}:function(a,b){for(;b=b.parentNode;)if(b===a)return!0;return!1}}(this,document);