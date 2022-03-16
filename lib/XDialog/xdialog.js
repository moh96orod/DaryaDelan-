/**
 * Minified by jsDelivr using Terser v3.14.1.
 * Original file: /gh/xxjapp/xdialog@3.4.0/xdialog.js
 * 
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
"use strict";"function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(e,t){if(null==e)throw new TypeError("Cannot convert undefined or null to object");let n=Object(e);for(let e=1;e<arguments.length;e++){let t=arguments[e];if(null!=t)for(let e in t)Object.prototype.hasOwnProperty.call(t,e)&&(n[e]=t[e])}return n},writable:!0,configurable:!0}),window.xdialog=function(){let e=[],t=0,n=1e4,r={newId:function(){return"xd-id-"+Math.random().toString(36).substring(2)},newZIndex:function(){return n+=1},isString:function(e){return"string"==typeof e||e instanceof String},isArray:function(e){return Array.isArray(e)},getCenterPosition:function(e){return{x:e.offsetLeft+e.offsetWidth/2,y:e.offsetTop+e.offsetHeight/2}},setCenterPosition:function(e,t){e.style.left=t.x-e.offsetWidth/2+"px",e.style.top=t.y-e.offsetHeight/2+"px"}},i=1e3,o=function(){let e=document.createElement("div"),t="";e.classList.add("sk-fading-circle");for(let e=1;e<=12;e++)t+='<div class="sk-circle sk-circle'+e+'"></div>';e.innerHTML=t;let n=u({zIndex:2147483647});return n.classList.add("xd-spin-overlay"),n.classList.add("xd-center-child"),n.appendChild(e),n}(),l=0,c={timeout:300,distance:5};return{init:function(e){n=e.zIndex0||n},create:f,open:m,alert:function(e,t){return m(t=Object.assign(function(e){return{title:null,body:'<p style="text-align:center;">'+(e=e||"alert text")+"</p>",buttons:["ok"],effect:"sticky_up"}}(e),t))},confirm:function(e,t,n){return m(n=Object.assign(function(e,t){return{title:"Confirm",body:'<p style="text-align:center;">'+(e=e||"Are you sure?")+"</p>",buttons:{ok:"Yes",cancel:"No"},effect:"3d_sign",onok:t}}(e,t),n))},info:function(e,t){return m(t=Object.assign(function(e){return{title:null,body:'<div style="text-align:center;">'+(e=e||"some information")+"</div>",buttons:null,extraClass:"xd-info",effect:"sticky_up",modal:!1,timeout:10}}(e),t))},warn:function(e,t){return m(t=Object.assign(function(e){return{title:null,body:'<div style="text-align:center;">'+(e=e||"Some warning")+"</div>",buttons:null,extraClass:"xd-warn",effect:"sticky_up",modal:!1,timeout:10}}(e),t))},error:function(e,t){return m(t=Object.assign(function(e){return{title:"Error",body:'<div style="text-align:center;">'+(e=e||"An error occured!")+"</div>",buttons:["ok"],extraClass:"xd-error",effect:"slide_in_bottom"}}(e),t))},fatal:function(e,t){return m(t=Object.assign(function(e){return{title:"Fatal Error",body:'<div style="text-align:center;">'+(e=e||"A fatal error occured!")+"</div>",buttons:null,extraClass:"xd-fatal",effect:null,ondrag:function(){return!1},beforehide:function(){return!1}}}(e),t))},dialogs:e,startSpin:function(){0===l&&o.classList.add("xd-show-overlay");l++},stopSpin:function(){0==--l&&o.classList.remove("xd-show-overlay")}};function s(e,t,n,r){return{id:e.id,element:e,dialog:t,overlay:n,event:r}}function u(e){e=Object.assign({zIndex:r.newZIndex()},e);let t=document.createElement("div");return t.classList.add("xd-overlay"),t.style["z-index"]=e.zIndex,document.body.insertAdjacentElement("beforeend",t),t}function a(e,t){let n=document.createElement("div"),i=function(e){if(!e)return{clazz:"",perspective:!1};switch(e){case"fade_in_and_scale":default:return{clazz:"xd-effect-1",perspective:!1};case"slide_in_right":return{clazz:"xd-effect-2",perspective:!1};case"slide_in_bottom":return{clazz:"xd-effect-3",perspective:!1};case"newspaper":return{clazz:"xd-effect-4",perspective:!1};case"fall":return{clazz:"xd-effect-5",perspective:!1};case"side_fall":return{clazz:"xd-effect-6",perspective:!1};case"sticky_up":return{clazz:"xd-effect-7",perspective:!1};case"3d_flip_horizontal":return{clazz:"xd-effect-8",perspective:!1};case"3d_flip_vertical":return{clazz:"xd-effect-9",perspective:!1};case"3d_sign":return{clazz:"xd-effect-10",perspective:!1};case"super_scaled":return{clazz:"xd-effect-11",perspective:!1};case"just_me":return{clazz:"xd-effect-12",perspective:!1};case"3d_slit":return{clazz:"xd-effect-13",perspective:!1};case"3d_rotate_bottom":return{clazz:"xd-effect-14",perspective:!1};case"3d_rotate_in_left":return{clazz:"xd-effect-15",perspective:!1};case"blur":return{clazz:"xd-effect-16",perspective:!1};case"let_me_in":return{clazz:"xd-effect-17",perspective:!0};case"make_way":return{clazz:"xd-effect-18",perspective:!0};case"slip_from_top":return{clazz:"xd-effect-19",perspective:!0}}}(e.effect);n.id=r.newId(),n.effect=i,n.setAttribute("class","xd-dialog xd-center "+i.clazz+" "+e.extraClass),n.setAttribute("style","z-index:"+r.newZIndex()+";"+e.style);let o='<div class="xd-content">';if(e.title&&(o+='<div class="xd-title">'+e.title+"</div>"),e.body)if(r.isString(e.body))o+='<div class="xd-body"><div class="xd-body-inner">'+e.body+"</div></div>";else{let t=null;e.body.src?t=document.querySelector(e.body.src):e.body.element&&(t=e.body.element),t?(n.srcOriginalParent=t.parentElement,n.srcElement=t,o+='<div class="xd-body"><div class="xd-body-inner"></div></div>'):console.warn("Element of selector not found: "+e.body.src)}return e.buttons&&(o+=function(e){let t="",n={};r.isArray(e.buttons)?e.buttons.forEach(function(e,t){let r=d(e);r?n[e]=r:n["button"+t]={html:e}}):Object.keys(e.buttons).forEach(function(t){let i=d(t),o=e.buttons[t];i?r.isString(o)?(i.text=o,n[t]=i):n[t]=Object.assign(i,o):n[t]={html:o}});return t+='<div class="xd-buttons">',Object.keys(n).forEach(function(e){if(n[e].html)t+=n[e].html;else{let r=n[e].style||"";t+='<button style="'+r+'" class="'+n[e].clazz+'">'+n[e].text+"</button>"}}),t+="</div>"}(e)),o+="</div>",n.innerHTML=o,n.srcElement&&n.querySelector(".xd-body-inner").appendChild(n.srcElement),e.beforecreate&&!1===e.beforecreate(s(n,null,t,null))?null:(document.body.insertAdjacentElement("afterbegin",n),e.aftercreate&&e.aftercreate(s(n,null,t,null)),n)}function d(e){switch(e){case"ok":return{text:"OK",clazz:"xd-button xd-ok"};case"cancel":return{text:"Cancel",clazz:"xd-button xd-cancel"};case"delete":return{text:"Delete",clazz:"xd-button xd-delete"};default:return null}}function f(n){let o={};n=Object.assign({title:"Dialog Title",body:"<p>Dialog body</p>",buttons:["ok","cancel"],extraClass:"",style:"",effect:"fade_in_and_scale",fixChromeBlur:!0,modal:!0,timeout:0,listenEnterKey:!0,listenESCKey:!0,beforecreate:null,aftercreate:null,beforeshow:null,aftershow:null,beforehide:null,afterhide:null,onok:null,oncancel:null,ondelete:null,ondestroy:null,ondrag:null},n);let l=null;n.modal&&(l=u());let c=a(n,l);if(null===c)return null;let d=c.querySelector(".xd-ok"),f=c.querySelector(".xd-cancel"),m=c.querySelector(".xd-delete");d&&d.addEventListener("click",E),f&&f.addEventListener("click",z),m&&m.addEventListener("click",L),p(n.ondrag,c),l&&p(n.ondrag,c,l,z);let y=!1;return function(){let e=c.querySelectorAll("iframe");if(0===e.length)return void(y=!0);let t=0;[].slice.call(e).forEach(function(n){n.addEventListener("load",function r(i){n.removeEventListener("load",r),(t+=1)===e.length&&(y=!0)})})}(),o={id:c.id,element:c,show:function(){function e(){document.activeElement&&document.activeElement.blur&&document.activeElement.blur(),setTimeout(function(){c.effect.perspective&&1===++t&&document.documentElement.classList.add("xd-perspective"),c.classList.add("xd-show"),l&&l.classList.add("xd-show-overlay"),function(){n.listenEnterKey&&(c.enterKeyListener=function(e){if("Enter"!==e.key)return;let t=document.querySelector(".xd-dialog.xd-show");t===c&&E(e)},document.addEventListener("keyup",c.enterKeyListener));n.listenESCKey&&(c.escKeyListener=function(e){if("Escape"!==e.key&&"Esc"!==e.key)return;let t=document.querySelector(".xd-dialog.xd-show");t===c&&z(e)},document.addEventListener("keyup",c.escKeyListener))}(),[].slice.call(c.querySelectorAll("textarea")).forEach(function(e){e.addEventListener("keypress",x)}),n.timeout>0&&(c.addEventListener("mouseenter",h),c.addEventListener("mouseleave",b),b())},200),n.fixChromeBlur&&(c.effect.clazz?(c.addEventListener("transitionend",function e(t){"transform"===t.propertyName&&(c.removeEventListener("transitionend",e),g())}),setTimeout(function(){g()},i)):g())}!function t(){if(y){if(n.beforeshow&&!1===n.beforeshow(s(c,o,l,null)))return;e(),n.aftershow&&n.aftershow(s(c,o,l,null))}else setTimeout(t,0)}()},hide:v,destroy:w,close:k,adjust:function(){if("adjusting"===o.status)return;o.centerPosition&&r.setCenterPosition(c,o.centerPosition);let e=c.getBoundingClientRect(),t=document.documentElement.clientWidth,n=document.documentElement.clientHeight;if(e.left>=0&&e.top>=0&&e.right<t&&e.bottom<n)return;o.status="adjusting";let i=c.style.transition;c.style.transition="all .3s ease-in-out",e.width>t&&(c.style["max-width"]=t+"px");e.height>n&&(c.style["max-height"]=n+"px");let l=c.getBoundingClientRect();e.left>=0&&e.right<t||(c.style.left=(t-l.width)/2+"px");e.top>=0&&e.bottom<n||(c.style.top=(n-l.height)/2+"px");c.addEventListener("transitionend",function e(){c.removeEventListener("transitionend",e),c.style.transition=i,o.status="adjusted"})},fixChromeBlur:g},e.push(o),o;function v(){if(n.beforehide&&!1===n.beforehide(s(c,o,l,null)))return!1;o.centerPosition=r.getCenterPosition(c),function(){n.listenEnterKey&&(document.removeEventListener("keyup",c.enterKeyListener),c.enterKeyListener=null);n.listenESCKey&&(document.removeEventListener("keyup",c.escKeyListener),c.escKeyListener=null)}(),[].slice.call(c.querySelectorAll("textarea")).forEach(function(e){e.removeEventListener("keypress",x)}),n.timeout>0&&(c.removeEventListener("mouseenter",h),c.removeEventListener("mouseleave",b)),c.style.removeProperty("perspective"),c.effect.perspective&&setTimeout(function(){1===t&&document.documentElement.classList.remove("xd-perspective"),t--},i),c.classList.remove("xd-show"),l&&l.classList.remove("xd-show-overlay"),n.afterhide&&n.afterhide(s(c,o,l,null))}function x(e){13===e.which&&e.stopPropagation()}function b(){h(),o.closeTimerId=setTimeout(function(){o.closeTimerId=null,k()},1e3*n.timeout)}function h(){o.closeTimerId&&(clearTimeout(o.closeTimerId),o.closeTimerId=null)}function g(){if("none"===c.style.transform)return;let e=c.getBoundingClientRect();c.style.top=e.top+"px",c.style.left=e.left+"px",c.style.transform="none",c.style.perspective="none"}function E(e){n.onok&&!1===n.onok(s(c,o,l,e))||k()}function z(e){n.oncancel&&!1===n.oncancel(s(c,o,l,e))||k()}function L(e){n.ondelete&&!1===n.ondelete(s(c,o,l,e))||k()}function w(){n.ondestroy&&!1===n.ondestroy(s(c,o,l,null))||(c.srcElement&&setTimeout(function e(){c.contains(c.srcElement)?c.srcOriginalParent.appendChild(c.srcElement):setTimeout(e,1e3)},300),setTimeout(function(){let t=e.indexOf(o);-1!==t&&function(t){d&&d.removeEventListener("click",E),f&&f.removeEventListener("click",z),m&&m.removeEventListener("click",L),e.splice(t,1),document.body.removeChild(c),l&&document.body.removeChild(l)}(t)},i))}function k(){!1!==v()&&w()}}function m(e){let t=f(e);return t?(t.show(),t):null}function p(e,t,n,r){(n=n||t).addEventListener("mousedown",function(r){if(r.offsetX>r.target.clientWidth||r.offsetY>r.target.clientHeight)return;if(u=r,!1===function(r){if(e){let i=e(r,t,n);if(!1===i||!0===i)return i}return!(r instanceof HTMLInputElement)&&!(["BUTTON","SELECT","TEXTAREA"].indexOf(r.tagName)>=0)}(r.target))return;a=t.style.transition,t.style.transition="",l=r.clientX,s=r.clientY,document.addEventListener("mousemove",d),document.addEventListener("mouseup",f),[].slice.call(n.querySelectorAll("iframe")).forEach(function(e){e.style["pointer-events"]="none"})});let i=0,o=0,l=0,s=0,u=null,a=null;function d(e){e.preventDefault(),i=l-e.clientX,o=s-e.clientY,l=e.clientX,s=e.clientY,t.style.top=t.offsetTop-o+"px",t.style.left=t.offsetLeft-i+"px"}function f(e){t.style.transition=a,Math.abs(e.clientX-u.clientX)+Math.abs(e.clientY-u.clientY)<c.distance&&e.timeStamp-u.timeStamp<c.timeout&&r&&r(e),document.removeEventListener("mousemove",d),document.removeEventListener("mouseup",f),[].slice.call(n.querySelectorAll("iframe")).forEach(function(e){e.style["pointer-events"]="auto"})}}}();
//# sourceMappingURL=/sm/cda5dbdf28309bd3f6809e3cd70737a869dc4b2ca2b034bbbd12dff7042bbe77.map