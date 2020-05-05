/*! This file is auto-generated */
jQuery(document).ready(function(o){var e,t,s,a,r=wp.i18n.__,n=wp.i18n._n,h=wp.i18n.sprintf,i=new ClipboardJS(".site-health-copy-buttons .copy-button"),u=o(".health-check-body.health-check-debug-tab").length,c=o("#health-check-accordion-block-wp-paths-sizes");function l(e){var t,s,a=wp.template("health-check-issue"),i=o("#health-check-issues-"+e.status);SiteHealth.site_status.issues[e.status]++,s=SiteHealth.site_status.issues[e.status],"critical"===e.status?t=h(n("%s critical issue","%s critical issues",s),'<span class="issue-count">'+s+"</span>"):"recommended"===e.status?t=h(n("%s recommended improvement","%s recommended improvements",s),'<span class="issue-count">'+s+"</span>"):"good"===e.status&&(t=h(n("%s item with no issues detected","%s items with no issues detected",s),'<span class="issue-count">'+s+"</span>")),t&&o(".site-health-issue-count-title",i).html(t),o(".issues","#health-check-issues-"+e.status).append(a(e))}function d(){var e,t,s=o(".site-health-progress"),a=s.closest(".site-health-progress-wrapper"),i=o(".site-health-progress-label",a),n=o(".site-health-progress svg #bar"),h=parseInt(SiteHealth.site_status.issues.good,0)+parseInt(SiteHealth.site_status.issues.recommended,0)+1.5*parseInt(SiteHealth.site_status.issues.critical,0),c=.5*parseInt(SiteHealth.site_status.issues.recommended,0)+1.5*parseInt(SiteHealth.site_status.issues.critical,0),l=100-Math.ceil(c/h*100);0!==h?(a.removeClass("loading"),e=n.attr("r"),l<0&&(l=0),100<l&&(l=100),t=(100-l)/100*(Math.PI*(2*e)),n.css({strokeDashoffset:t}),parseInt(SiteHealth.site_status.issues.critical,0)<1&&o("#health-check-issues-critical").addClass("hidden"),parseInt(SiteHealth.site_status.issues.recommended,0)<1&&o("#health-check-issues-recommended").addClass("hidden"),80<=l&&0===parseInt(SiteHealth.site_status.issues.critical,0)?(a.addClass("green").removeClass("orange"),i.text(r("Good")),wp.a11y.speak(r("All site health tests have finished running. Your site is looking good, and the results are now available on the page."))):(a.addClass("orange").removeClass("green"),i.text(r("Should be improved")),wp.a11y.speak(r("All site health tests have finished running. There are items that should be addressed, and the results are now available on the page."))),u||(o.post(ajaxurl,{action:"health-check-site-status-result",_wpnonce:SiteHealth.nonce.site_status_result,counts:SiteHealth.site_status.issues}),100===l&&(o(".site-status-all-clear").removeClass("hide"),o(".site-status-has-issues").addClass("hide")))):s.addClass("hidden")}i.on("success",function(e){var t=o(e.trigger).closest("div");o(".success",t).addClass("visible"),wp.a11y.speak(r("Site information has been added to your clipboard."))}),o(".health-check-accordion").on("click",".health-check-accordion-trigger",function(){"true"===o(this).attr("aria-expanded")?(o(this).attr("aria-expanded","false"),o("#"+o(this).attr("aria-controls")).attr("hidden",!0)):(o(this).attr("aria-expanded","true"),o("#"+o(this).attr("aria-controls")).attr("hidden",!1))}),o(".site-health-view-passed").on("click",function(){var e=o("#health-check-issues-good");e.toggleClass("hidden"),o(this).attr("aria-expanded",!e.hasClass("hidden"))}),"undefined"==typeof SiteHealth||u||(0===SiteHealth.site_status.direct.length&&0===SiteHealth.site_status.async.length?d():SiteHealth.site_status.issues={good:0,recommended:0,critical:0},0<SiteHealth.site_status.direct.length&&o.each(SiteHealth.site_status.direct,function(){l(this)}),0<SiteHealth.site_status.async.length?(e={action:"health-check-"+SiteHealth.site_status.async[0].test.replace("_","-"),_wpnonce:SiteHealth.nonce.site_status},SiteHealth.site_status.async[0].completed=!0,o.post(ajaxurl,e,function(e){l(e.data),function t(){var s=!0;1<=SiteHealth.site_status.async.length&&o.each(SiteHealth.site_status.async,function(){var e={action:"health-check-"+this.test.replace("_","-"),_wpnonce:SiteHealth.nonce.site_status};return!!this.completed||(s=!1,this.completed=!0,o.post(ajaxurl,e,function(e){l(wp.hooks.applyFilters("site_status_test_result",e.data)),t()}),!1)}),s&&d()}()})):d()),u&&(c.length?(t={action:"health-check-get-sizes",_wpnonce:SiteHealth.nonce.site_status_result},s=(new Date).getTime(),a=window.setTimeout(function(){wp.a11y.speak(r("Please wait..."))},3e3),o.post({type:"POST",url:ajaxurl,data:t,dataType:"json"}).done(function(e){!function(i){var e=o("button.button.copy-button"),a=e.attr("data-clipboard-text");o.each(i,function(e,t){var s=t.debug||t.size;void 0!==s&&(a=a.replace(e+": loading...",e+": "+s))}),e.attr("data-clipboard-text",a),c.find("td[class]").each(function(e,t){var s=o(t),a=s.attr("class");i.hasOwnProperty(a)&&i[a].size&&s.text(i[a].size)})}(e.data||{})}).always(function(){var e=(new Date).getTime()-s;o(".health-check-wp-paths-sizes.spinner").css("visibility","hidden"),d(),3e3<e?(e=6e3<e?0:6500-e,window.setTimeout(function(){wp.a11y.speak(r("All site health tests have finished running."))},e)):window.clearTimeout(a),o(document).trigger("site-health-info-dirsizes-done")})):d())});