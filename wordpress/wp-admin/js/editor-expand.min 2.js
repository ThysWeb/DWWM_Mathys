/*! This file is auto-generated */
!function(I,L){"use strict";var M=L(I),V=L(document),N=L("#wpadminbar"),j=L("#wpfooter");L(function(){var m,e,u=L("#postdivrich"),w=L("#wp-content-wrap"),H=L("#wp-content-editor-tools"),b=L(),v=L(),x=L("#ed_toolbar"),y=L("#content"),i=y[0],o=0,T=L("#post-status-info"),B=L(),C=L(),S=L("#side-sortables"),O=L("#postbox-container-1"),z=L("#post-body"),E=I.wp.editor&&I.wp.editor.fullscreen,r=function(){},l=function(){},k=!1,A=!1,W=!1,K=!1,R=0,Y=56,U=20,D=300,n=w.hasClass("tmce-active")?"tinymce":"html",P=!!parseInt(I.getUserSetting("hidetb"),10),X={windowHeight:0,windowWidth:0,adminBarHeight:0,toolsHeight:0,menuBarHeight:0,visualTopHeight:0,textTopHeight:0,bottomHeight:0,statusBarHeight:0,sideSortablesHeight:0},s=I._.throttle(function(){var t=I.scrollX||document.documentElement.scrollLeft,e=I.scrollY||document.documentElement.scrollTop,o=parseInt(i.style.height,10);i.style.height=D+"px",i.scrollHeight>D&&(i.style.height=i.scrollHeight+"px"),void 0!==t&&I.scrollTo(t,e),i.scrollHeight<o&&p()},300);function F(){var t=i.value.length;m&&!m.isHidden()||!m&&"tinymce"===n||(t<o?s():parseInt(i.style.height,10)<i.scrollHeight&&(i.style.height=Math.ceil(i.scrollHeight)+"px",p()),o=t)}function p(t){if(!E||!E.settings.visible){var e,o,i,n,s,f,a,d,c=M.scrollTop(),u=t&&t.type,r="scroll"!==u,l=m&&!m.isHidden(),p=D,g=z.offset().top,h=w.width();!r&&X.windowHeight||function(){var t=M.width();(X={windowHeight:M.height(),windowWidth:t,adminBarHeight:600<t?N.outerHeight():0,toolsHeight:H.outerHeight()||0,menuBarHeight:B.outerHeight()||0,visualTopHeight:b.outerHeight()||0,textTopHeight:x.outerHeight()||0,bottomHeight:T.outerHeight()||0,statusBarHeight:C.outerHeight()||0,sideSortablesHeight:S.height()||0}).menuBarHeight<3&&(X.menuBarHeight=0)}(),l||"resize"!==u||F(),f=l?(e=b,o=v,X.visualTopHeight):(e=x,o=y,X.textTopHeight),(l||e.length)&&(s=e.parent().offset().top,a=o.offset().top,d=o.outerHeight(),(l?D+f:D+20)+5<d?((!k||r)&&c>=s-X.toolsHeight-X.adminBarHeight&&c<=s-X.toolsHeight-X.adminBarHeight+d-p?(k=!0,H.css({position:"fixed",top:X.adminBarHeight,width:h}),l&&B.length&&B.css({position:"fixed",top:X.adminBarHeight+X.toolsHeight,width:h-2-(l?0:e.outerWidth()-e.width())}),e.css({position:"fixed",top:X.adminBarHeight+X.toolsHeight+X.menuBarHeight,width:h-2-(l?0:e.outerWidth()-e.width())})):(k||r)&&(c<=s-X.toolsHeight-X.adminBarHeight?(k=!1,H.css({position:"absolute",top:0,width:h}),l&&B.length&&B.css({position:"absolute",top:0,width:h-2}),e.css({position:"absolute",top:X.menuBarHeight,width:h-2-(l?0:e.outerWidth()-e.width())})):c>=s-X.toolsHeight-X.adminBarHeight+d-p&&(k=!1,H.css({position:"absolute",top:d-p,width:h}),l&&B.length&&B.css({position:"absolute",top:d-p,width:h-2}),e.css({position:"absolute",top:d-p+X.menuBarHeight,width:h-2-(l?0:e.outerWidth()-e.width())}))),(!A||r&&P)&&c+X.windowHeight<=a+d+X.bottomHeight+X.statusBarHeight+1?t&&0<t.deltaHeight&&t.deltaHeight<100?I.scrollBy(0,t.deltaHeight):l&&P&&(A=!0,C.css({position:"fixed",bottom:X.bottomHeight,visibility:"",width:h-2}),T.css({position:"fixed",bottom:0,width:h})):(!P&&A||(A||r)&&c+X.windowHeight>a+d+X.bottomHeight+X.statusBarHeight-1)&&(A=!1,C.attr("style",P?"":"visibility: hidden;"),T.attr("style",""))):r&&(H.css({position:"absolute",top:0,width:h}),l&&B.length&&B.css({position:"absolute",top:0,width:h-2}),e.css({position:"absolute",top:X.menuBarHeight,width:h-2-(l?0:e.outerWidth()-e.width())}),C.attr("style",P?"":"visibility: hidden;"),T.attr("style","")),O.width()<300&&600<X.windowWidth&&V.height()>S.height()+g+120&&X.windowHeight<d?(X.sideSortablesHeight+Y+U>X.windowHeight||W||K?c+Y<=g?(S.attr("style",""),W=K=!1):R<c?W?(W=!1,i=S.offset().top-X.adminBarHeight,(n=j.offset().top)<i+X.sideSortablesHeight+U&&(i=n-X.sideSortablesHeight-12),S.css({position:"absolute",top:i,bottom:""})):!K&&X.sideSortablesHeight+S.offset().top+U<c+X.windowHeight&&(K=!0,S.css({position:"fixed",top:"auto",bottom:U})):c<R&&(K?(K=!1,i=S.offset().top-U,(n=j.offset().top)<i+X.sideSortablesHeight+U&&(i=n-X.sideSortablesHeight-12),S.css({position:"absolute",top:i,bottom:""})):!W&&S.offset().top>=c+Y&&(W=!0,S.css({position:"fixed",top:Y,bottom:""}))):(g-Y<=c?S.css({position:"fixed",top:Y}):S.attr("style",""),W=K=!1),R=c):(S.attr("style",""),W=K=!1),r&&(w.css({paddingTop:X.toolsHeight}),l?v.css({paddingTop:X.visualTopHeight+X.menuBarHeight}):y.css({marginTop:X.textTopHeight})))}}function f(){F(),p()}function g(t){for(var e=1;e<6;e++)setTimeout(t,500*e)}function t(){I.pageYOffset&&130<I.pageYOffset&&I.scrollTo(I.pageXOffset,0),u.addClass("wp-editor-expand"),M.on("scroll.editor-expand resize.editor-expand",function(t){p(t.type),clearTimeout(e),e=setTimeout(p,100)}),V.on("wp-collapse-menu.editor-expand postboxes-columnchange.editor-expand editor-classchange.editor-expand",p).on("postbox-toggled.editor-expand postbox-moved.editor-expand",function(){!W&&!K&&I.pageYOffset>Y&&(K=!0,I.scrollBy(0,-1),p(),I.scrollBy(0,1)),p()}).on("wp-window-resized.editor-expand",function(){m&&!m.isHidden()?m.execCommand("wpAutoResize"):F()}),y.on("focus.editor-expand input.editor-expand propertychange.editor-expand",F),r(),E&&E.pubsub.subscribe("hidden",f),m&&(m.settings.wp_autoresize_on=!0,m.execCommand("wpAutoResizeOn"),m.isHidden()||m.execCommand("wpAutoResize")),m&&!m.isHidden()||F(),p(),V.trigger("editor-expand-on")}function a(){var t=parseInt(I.getUserSetting("ed_size",300),10);t<50?t=50:5e3<t&&(t=5e3),I.pageYOffset&&130<I.pageYOffset&&I.scrollTo(I.pageXOffset,0),u.removeClass("wp-editor-expand"),M.off(".editor-expand"),V.off(".editor-expand"),y.off(".editor-expand"),l(),E&&E.pubsub.unsubscribe("hidden",f),L.each([b,x,H,B,T,C,w,v,y,S],function(t,e){e&&e.attr("style","")}),k=A=W=K=!1,m&&(m.settings.wp_autoresize_on=!1,m.execCommand("wpAutoResizeOff"),m.isHidden()||(y.hide(),t&&m.theme.resizeTo(null,t))),t&&y.height(t),V.trigger("editor-expand-off")}V.on("tinymce-editor-init.editor-expand",function(t,f){var a=I.tinymce.util.VK,e=_.debounce(function(){L(".mce-floatpanel:hover").length||I.tinymce.ui.FloatPanel.hideAll(),L(".mce-tooltip").hide()},1e3,!0);function o(t){var e=t.keyCode;e<=47&&e!==a.SPACEBAR&&e!==a.ENTER&&e!==a.DELETE&&e!==a.BACKSPACE&&e!==a.UP&&e!==a.LEFT&&e!==a.DOWN&&e!==a.UP||91<=e&&e<=93||112<=e&&e<=123||144===e||145===e||i(e)}function i(t){var e,o,i,n,s=function(){var t,e,o,i=f.selection.getNode();if(f.wp&&f.wp.getView&&(e=f.wp.getView(i)))o=e.getBoundingClientRect();else{t=f.selection.getRng();try{o=t.getClientRects()[0]}catch(t){}o=o||i.getBoundingClientRect()}return!!o.height&&o}();s&&(o=(e=s.top+f.iframeElement.getBoundingClientRect().top)+s.height,e-=50,o+=50,i=X.adminBarHeight+X.toolsHeight+X.menuBarHeight+X.visualTopHeight,(n=X.windowHeight-(P?X.bottomHeight+X.statusBarHeight:0))-i<s.height||(e<i&&(t===a.UP||t===a.LEFT||t===a.BACKSPACE)?I.scrollTo(I.pageXOffset,e+I.pageYOffset-i):n<o&&I.scrollTo(I.pageXOffset,o+I.pageYOffset-n)))}function n(t){t.state||p()}function s(){M.on("scroll.mce-float-panels",e),setTimeout(function(){f.execCommand("wpAutoResize"),p()},300)}function d(){M.off("scroll.mce-float-panels"),setTimeout(function(){var t=w.offset().top;I.pageYOffset>t&&I.scrollTo(I.pageXOffset,t-X.adminBarHeight),F(),p()},100),p()}function c(){P=!P}"content"===f.id&&((m=f).settings.autoresize_min_height=D,b=w.find(".mce-toolbar-grp"),v=w.find(".mce-edit-area"),C=w.find(".mce-statusbar"),B=w.find(".mce-menubar"),r=function(){f.on("keyup",o),f.on("show",s),f.on("hide",d),f.on("wp-toolbar-toggle",c),f.on("setcontent wp-autoresize wp-toolbar-toggle",p),f.on("undo redo",i),f.on("FullscreenStateChanged",n),M.off("scroll.mce-float-panels").on("scroll.mce-float-panels",e)},l=function(){f.off("keyup",o),f.off("show",s),f.off("hide",d),f.off("wp-toolbar-toggle",c),f.off("setcontent wp-autoresize wp-toolbar-toggle",p),f.off("undo redo",i),f.off("FullscreenStateChanged",n),M.off("scroll.mce-float-panels")},u.hasClass("wp-editor-expand")&&(r(),g(p)))}),u.hasClass("wp-editor-expand")&&(t(),w.hasClass("html-active")&&g(function(){p(),F()})),L("#adv-settings .editor-expand").show(),L("#editor-expand-toggle").on("change.editor-expand",function(){L(this).prop("checked")?(t(),I.setUserSetting("editor_expand","on")):(a(),I.setUserSetting("editor_expand","off"))}),I.editorExpand={on:t,off:a}}),L(function(){var i,n,t,s,f,a,d,c,u,r,l,p=L(document.body),o=L("#wpcontent"),g=L("#post-body-content"),e=L("#title"),h=L("#content"),m=L(document.createElement("DIV")),w=L("#edit-slug-box"),H=w.find("a").add(w.find("button")).add(w.find("input")),b=L("#adminmenuwrap"),v=(L(),L(),"on"===I.getUserSetting("editor_expand","on")),x=!!v&&"on"===I.getUserSetting("post_dfw"),y=0,T=0,B=20;function C(){(s=g.offset()).right=s.left+g.outerWidth(),s.bottom=s.top+g.outerHeight()}function S(){v||(v=!0,V.trigger("dfw-activate"),h.on("keydown.focus-shortcut",Y))}function O(){v&&(E(),v=!1,V.trigger("dfw-deactivate"),h.off("keydown.focus-shortcut"))}function z(){!x&&v&&(x=!0,h.on("keydown.focus",k),e.add(h).on("blur.focus",W),k(),I.setUserSetting("post_dfw","on"),V.trigger("dfw-on"))}function E(){x&&(x=!1,e.add(h).off(".focus"),A(),g.off(".focus"),I.setUserSetting("post_dfw","off"),V.trigger("dfw-off"))}function _(){x?E():z()}function k(t){var e,o=t&&t.keyCode;I.navigator.platform&&(e=-1<I.navigator.platform.indexOf("Mac")),27===o||87===o&&t.altKey&&(!e&&t.shiftKey||e&&t.ctrlKey)?A(t):t&&(t.metaKey||t.ctrlKey&&!t.altKey||t.altKey&&t.shiftKey||o&&(o<=47&&8!==o&&13!==o&&32!==o&&46!==o||91<=o&&o<=93||112<=o&&o<=135||144<=o&&o<=150||224<=o))||(i||(i=!0,clearTimeout(r),r=setTimeout(function(){m.show()},600),g.css("z-index",9998),m.on("mouseenter.focus",function(){C(),M.on("scroll.focus",function(){var t=I.pageYOffset;c&&d&&c!==t&&(d<s.top-B||d>s.bottom+B)&&A(),c=t})}).on("mouseleave.focus",function(){f=a=null,y=T=0,M.off("scroll.focus")}).on("mousemove.focus",function(t){var e=t.clientX,o=t.clientY,i=I.pageYOffset,n=I.pageXOffset;if(f&&a&&(e!==f||o!==a))if(o<=a&&o<s.top-i||a<=o&&o>s.bottom-i||e<=f&&e<s.left-n||f<=e&&e>s.right-n){if(y+=Math.abs(f-e),T+=Math.abs(a-o),(o<=s.top-B-i||o>=s.bottom+B-i||e<=s.left-B-n||e>=s.right+B-n)&&(10<y||10<T))return A(),f=a=null,void(y=T=0)}else y=T=0;f=e,a=o}).on("touchstart.focus",function(t){t.preventDefault(),A()}),g.off("mouseenter.focus"),u&&(clearTimeout(u),u=null),p.addClass("focus-on").removeClass("focus-off")),!n&&i&&(n=!0,N.on("mouseenter.focus",function(){N.addClass("focus-off")}).on("mouseleave.focus",function(){N.removeClass("focus-off")})),K())}function A(t){i&&(i=!1,clearTimeout(r),r=setTimeout(function(){m.hide()},200),g.css("z-index",""),m.off("mouseenter.focus mouseleave.focus mousemove.focus touchstart.focus"),void 0===t&&g.on("mouseenter.focus",function(){(L.contains(g.get(0),document.activeElement)||l)&&k()}),u=setTimeout(function(){u=null,g.off("mouseenter.focus")},1e3),p.addClass("focus-off").removeClass("focus-on")),n&&(n=!1,N.off(".focus")),R()}function W(){setTimeout(function(){var t=document.activeElement.compareDocumentPosition(g.get(0));function e(t){return L.contains(t.get(0),document.activeElement)}2!==t&&4!==t||!(e(b)||e(o)||e(j))||A()},0)}function K(){t||!i||w.find(":focus").length||(t=!0,w.stop().fadeTo("fast",.3).on("mouseenter.focus",R).off("mouseleave.focus"),H.on("focus.focus",R).off("blur.focus"))}function R(){t&&(t=!1,w.stop().fadeTo("fast",1).on("mouseleave.focus",K).off("mouseenter.focus"),H.on("blur.focus",K).off("focus.focus"))}function Y(t){t.altKey&&t.shiftKey&&87===t.keyCode&&_()}p.append(m),m.css({display:"none",position:"fixed",top:N.height(),right:0,bottom:0,left:0,"z-index":9997}),g.css({position:"relative"}),M.on("mousemove.focus",function(t){d=t.pageY}),L("#postdivrich").hasClass("wp-editor-expand")&&h.on("keydown.focus-shortcut",Y),V.on("tinymce-editor-setup.focus",function(t,e){e.addButton("dfw",{active:x,classes:"wp-dfw btn widget",disabled:!v,onclick:_,onPostRender:function(){var t=this;e.on("init",function(){t.disabled()&&t.hide()}),V.on("dfw-activate.focus",function(){t.disabled(!1),t.show()}).on("dfw-deactivate.focus",function(){t.disabled(!0),t.hide()}).on("dfw-on.focus",function(){t.active(!0)}).on("dfw-off.focus",function(){t.active(!1)})},tooltip:"Distraction-free writing mode",shortcut:"Alt+Shift+W"}),e.addCommand("wpToggleDFW",_),e.addShortcut("access+w","","wpToggleDFW")}),V.on("tinymce-editor-init.focus",function(t,e){var o,i;function n(){l=!0}function s(){l=!1}"content"===e.id&&(L(e.getWin()),L(e.getContentAreaContainer()).find("iframe"),o=function(){e.on("keydown",k),e.on("blur",W),e.on("focus",n),e.on("blur",s),e.on("wp-autoresize",C)},i=function(){e.off("keydown",k),e.off("blur",W),e.off("focus",n),e.off("blur",s),e.off("wp-autoresize",C)},x&&o(),V.on("dfw-on.focus",o).on("dfw-off.focus",i),e.on("click",function(t){t.target===e.getDoc().documentElement&&e.focus()}))}),V.on("quicktags-init",function(t,e){var o;e.settings.buttons&&-1!==(","+e.settings.buttons+",").indexOf(",dfw,")&&(o=L("#"+e.name+"_dfw"),L(document).on("dfw-activate",function(){o.prop("disabled",!1)}).on("dfw-deactivate",function(){o.prop("disabled",!0)}).on("dfw-on",function(){o.addClass("active")}).on("dfw-off",function(){o.removeClass("active")}))}),V.on("editor-expand-on.focus",S).on("editor-expand-off.focus",O),x&&(h.on("keydown.focus",k),e.add(h).on("blur.focus",W)),I.wp=I.wp||{},I.wp.editor=I.wp.editor||{},I.wp.editor.dfw={activate:S,deactivate:O,isActive:function(){return v},on:z,off:E,toggle:_,isOn:function(){return x}}})}(window,window.jQuery);