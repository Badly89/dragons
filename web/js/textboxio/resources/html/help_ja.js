/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(a){return function(){return a}},b=function(a,b){var c=a.src.indexOf("?");return a.src.indexOf(b)+b.length===c},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,b){if(a){var d="data-main",e=a.getAttribute(d);if(e){a.removeAttribute(d);var f=c(e);if("function"==typeof f)return f;console.warn("attribute on "+b+" does not reference a global method")}else console.warn("no data-main attribute found on "+b+" script tag")}},e=function(a,c){var e=d(document.currentScript,c);if(e)return e;for(var f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(b(f[g],a)){var h=d(f[g],c);if(h)return h}throw"cannot locate "+c+" script tag"},f="2.1.0",g=e("help_ja.js","help for language ja");g({version:f,about:a('\ufeff<div role=presentation class="ephox-polish-help-article ephox-polish-help-about">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">\u30d0\u30fc\u30b8\u30e7\u30f3\u60c5\u5831</div>\n  <p>Textbox.io\u306f\u3001\u30aa\u30f3\u30e9\u30a4\u30f3\u30a2\u30d7\u30ea\u3067\u8868\u73fe\u529b\u8c4a\u304b\u306a\u30b3\u30f3\u30c6\u30f3\u30c4\u3092\u4f5c\u6210\u3059\u308b\u305f\u3081\u306eWYSIWYG\u30c4\u30fc\u30eb\u3067\u3059\u3002Textbox.io\u3092\u3054\u5229\u7528\u306b\u306a\u308c\u3070\u3001\u30bd\u30fc\u30b7\u30e3\u30eb\u30b3\u30df\u30e5\u30cb\u30c6\u30a3\u3001\u30d6\u30ed\u30b0\u3001\u30e1\u30fc\u30eb\u306a\u3069\u3001\u30a6\u30a7\u30d6\u4e0a\u306e\u3042\u3089\u3086\u308b\u5834\u6240\u3067\u3001\u601d\u3044\u306e\u307e\u307e\u306b\u81ea\u5206\u3089\u3057\u3044\u8868\u73fe\u304c\u53ef\u80fd\u3068\u306a\u308a\u307e\u3059\u3002</p>\n  <p>&nbsp;</p>\n  <p>Textbox.io @@FULL_VERSION@@</p>\n  <p>\u30af\u30e9\u30a4\u30a2\u30f3\u30c8\u30d3\u30eb\u30c9@@CLIENT_VERSION@@</p>\n  <p class="ephox-polish-help-integration">@@INTEGRATION_TYPE@@\u5411\u3051\u7d71\u5408\u3001\u30d0\u30fc\u30b8\u30e7\u30f3@@INTEGRATION_VERSION@@</p>\n  <p>&nbsp;</p>\n  <p>Copyright 2016 Ephox Corporation.All Rights Reserved.</p>\n  <p><a href="javascript:void(0)" class="ephox-license-link">\u30b5\u30fc\u30c9 \u30d1\u30fc\u30c6\u30a3\u30e9\u30a4\u30bb\u30f3\u30b9</a></p>\n</div>'),accessibility:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">\u30ad\u30fc\u30dc\u30fc\u30c9\u30ca\u30d3\u30b2\u30fc\u30b7\u30e7\u30f3</div>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30ad\u30fc\u30dc\u30fc\u30c9\u30ca\u30d3\u30b2\u30fc\u30b7\u30e7\u30f3\u306e\u6709\u52b9\u5316</div>\n  <p>\u30c4\u30fc\u30eb\u30d0\u30fc\u3067\u30ad\u30fc\u30dc\u30fc\u30c9\u30ca\u30d3\u30b2\u30fc\u30b7\u30e7\u30f3\u3092\u6709\u52b9\u5316\u3059\u308b\u306b\u306f\u3001Windows\u3067\u306fF10\u3092\u3001 Mac OSX\u3067\u306fAlt + F10\u3092\u62bc\u3057\u307e\u3059\u3002\u30c4\u30fc\u30eb\u30d0\u30fc\u306e\u6700\u521d\u306e\u30a2\u30a4\u30c6\u30e0\u304c\u9078\u629e\u3055\u308c\u305f\u72b6\u614b\u3068\u306a\u308a\u3001\u9752\u3044\u8f2a\u90ed\u3067\u5f37\u8abf\u3055\u308c\u307e\u3059\u3002 </p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30b0\u30eb\u30fc\u30d7\u9593\u306e\u79fb\u52d5</div>\n  <p>\u30c4\u30fc\u30eb\u30d0\u30fc\u5185\u306e\u30dc\u30bf\u30f3\u306f\u30a2\u30af\u30b7\u30e7\u30f3\u306e\u7a2e\u985e\u306b\u30b0\u30eb\u30fc\u30d7\u5206\u3051\u3055\u308c\u3066\u3044\u307e\u3059\u3002\u30ad\u30fc\u30dc\u30fc\u30c9\u30ca\u30d3\u30b2\u30fc\u30b7\u30e7\u30f3\u304c\u6709\u52b9\u5316\u3055\u308c\u3066\u3044\u308b\u5834\u5408\u3001Tab\u30ad\u30fc\u3092\u62bc\u3059\u3068\u6b21\u306e\u30b0\u30eb\u30fc\u30d7\u306b\u9078\u629e\u304c\u79fb\u52d5\u3057\u3001Shift + Tab\u3067\u524d\u306e\u30b0\u30eb\u30fc\u30d7\u306b\u9078\u629e\u304c\u623b\u308a\u307e\u3059\u3002\u6700\u5f8c\u306e\u30b0\u30eb\u30fc\u30d7\u3067Tab\u30ad\u30fc\u3092\u62bc\u3059\u3068\u30dc\u30bf\u30f3\u306e\u6700\u521d\u306e\u30b0\u30eb\u30fc\u30d7\u306b\u623b\u308a\u307e\u3059\u3002</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30a2\u30a4\u30c6\u30e0\u30fb\u30dc\u30bf\u30f3\u9593\u306e\u79fb\u52d5</div>\n  <p>\u30a2\u30a4\u30c6\u30e0\u9593\u3092\u79fb\u52d5\u3059\u308b\u306b\u306f\u77e2\u5370\u30ad\u30fc\u3092\u4f7f\u7528\u3057\u307e\u3059\u3002\u3053\u308c\u306b\u3088\u308a\u30b0\u30eb\u30fc\u30d7\u5185\u306e\u30a2\u30a4\u30c6\u30e0\u9593\u3092\u5faa\u74b0\u3057\u3066\u79fb\u52d5\u3067\u304d\u307e\u3059\u3002\u6b21\u306e\u30b0\u30eb\u30fc\u30d7\u306b\u79fb\u52d5\u3059\u308b\u306b\u306fTab\u30ad\u30fc\u3092\u62bc\u3057\u3001\u3055\u3089\u306b\u305d\u306e\u30b0\u30eb\u30fc\u30d7\u5185\u306e\u30a2\u30a4\u30c6\u30e0\u9593\u3092\u79fb\u52d5\u3059\u308b\u306b\u306f\u77e2\u5370\u30ad\u30fc\u3092\u4f7f\u7528\u3057\u307e\u3059\u3002</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30b3\u30de\u30f3\u30c9\u306e\u5b9f\u884c</div>\n  <p>\u30b3\u30de\u30f3\u30c9\u3092\u5b9f\u884c\u3059\u308b\u306b\u306f\u3001\u4f7f\u7528\u3057\u305f\u3044\u30dc\u30bf\u30f3\u306b\u79fb\u52d5\u30fb\u9078\u629e\u3057\u3001\u30b9\u30da\u30fc\u30b9\u30d0\u30fc\u304bEnter\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30e1\u30cb\u30e5\u30fc\u306e\u958b\u9589\u3068\u30ca\u30d3\u30b2\u30fc\u30b7\u30e7\u30f3</div>\n  <p>\u30c4\u30fc\u30eb\u30d0\u30fc\u30dc\u30bf\u30f3\u306b\u30e1\u30cb\u30e5\u30fc\u304c\u542b\u307e\u308c\u308b\u5834\u5408\u3001\u30b9\u30da\u30fc\u30b9\u30d0\u30fc\u304bEnter\u30ad\u30fc\u3092\u62bc\u3059\u3068\u30e1\u30cb\u30e5\u30fc\u304c\u958b\u304d\u307e\u3059\u3002\u30e1\u30cb\u30e5\u30fc\u304c\u958b\u304f\u3068\u81ea\u52d5\u7684\u306b\u6700\u521d\u306e\u30a2\u30a4\u30c6\u30e0\u304c\u9078\u629e\u3055\u308c\u307e\u3059\u3002\u30e1\u30cb\u30e5\u30fc\u5185\u3092\u79fb\u52d5\u3059\u308b\u306b\u306f\u77e2\u5370\u30ad\u30fc\u3092\u4f7f\u7528\u3057\u307e\u3059\u3002\u30e1\u30cb\u30e5\u30fc\u5185\u306e\u4e0a\u4e0b\u306e\u79fb\u52d5\u306b\u306f\u4e0a\u5411\u304d\u30fb\u4e0b\u5411\u304d\u306e\u77e2\u5370\u30ad\u30fc\u3092\u305d\u308c\u305e\u308c\u4f7f\u7528\u3057\u307e\u3059\u3002\u3053\u308c\u306f\u30b5\u30d6\u30e1\u30cb\u30e5\u30fc\u3067\u3082\u540c\u69d8\u3067\u3059\u3002</p>\n\n  <p>\u30b5\u30d6\u30e1\u30cb\u30e5\u30fc\u306e\u3042\u308b\u30e1\u30cb\u30e5\u30fc\u30a2\u30a4\u30c6\u30e0\u306f\u4e8c\u91cd\u5c71\u304b\u3063\u3053\u3067\u8868\u793a\u3055\u308c\u307e\u3059\u3002\u4e8c\u91cd\u5c71\u304b\u3063\u3053\u3068\u540c\u3058\u5411\u304d\u306e\u77e2\u5370\u30ad\u30fc\u3092\u62bc\u3059\u3068\u30b5\u30d6\u30e1\u30cb\u30e5\u30fc\u304c\u5c55\u958b\u3057\u3001\u53cd\u5bfe\u5411\u304d\u306e\u77e2\u5370\u30ad\u30fc\u3092\u62bc\u3059\u3068\u6298\u308a\u7573\u307e\u308c\u307e\u3059\u3002</p>\n\n  <p>\u4f7f\u7528\u4e2d\u306e\u30e1\u30cb\u30e5\u30fc\u3092\u9589\u3058\u308b\u306b\u306fEsc\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002\u30e1\u30cb\u30e5\u30fc\u304c\u9589\u3058\u308b\u3068\u3001\u4ee5\u524d\u306b\u9078\u629e\u3055\u308c\u305f\u30a2\u30a4\u30c6\u30e0\u304c\u518d\u5ea6\u9078\u629e\u3055\u308c\u307e\u3059\u3002</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30cf\u30a4\u30d1\u30fc\u30ea\u30f3\u30af\u306e\u7de8\u96c6\u30fb\u524a\u9664</div>\n\n  <p>\u30ea\u30f3\u30af\u3092\u7de8\u96c6\u30fb\u524a\u9664\u3059\u308b\u306b\u306f\u3001\uff3b\u633f\u5165\uff3d\u30e1\u30cb\u30e5\u30fc\u3067\uff3b\u30ea\u30f3\u30af\u3092\u633f\u5165\uff3d\u3092\u9078\u629e\u3057\u307e\u3059\u3002\u30a8\u30c7\u30a3\u30bf\u306b\u30ea\u30f3\u30af\u306e\u7de8\u96c6\u30c0\u30a4\u30a2\u30ed\u30b0\u304c\u8868\u793a\u3055\u308c\u307e\u3059\u3002 </p>\n\n  <p>\u30ea\u30f3\u30af\u3092\u7de8\u96c6\u3059\u308b\u306b\u306f\u3001\u30ea\u30f3\u30af\u66f4\u65b0\u5165\u529b\u30dc\u30c3\u30af\u30b9\u306b\u65b0\u898fURL\u3092\u5165\u529b\u3057\u3001Enter\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002\u30c9\u30ad\u30e5\u30e1\u30f3\u30c8\u304b\u3089\u30ea\u30f3\u30af\u3092\u524a\u9664\u3059\u308b\u306b\u306f\u3001\u524a\u9664\u30dc\u30bf\u30f3\u3092\u30af\u30ea\u30c3\u30af\u3057\u307e\u3059\u3002\u5909\u66f4\u3092\u884c\u308f\u305a\u306b\u30c0\u30a4\u30a2\u30ed\u30b0\u3092\u7d42\u4e86\u3059\u308b\u306b\u306f\u3001Esc\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u30d5\u30a9\u30f3\u30c8\u30b5\u30a4\u30ba\u3068\u30c6\u30fc\u30d6\u30eb\u306e\u30dc\u30fc\u30c0\u30fc\u30b5\u30a4\u30ba\u306e\u5909\u66f4</div>\n\n  <p>\u30d5\u30a9\u30f3\u30c8\u306e\u30b5\u30a4\u30ba\u3092\u5909\u66f4\u3059\u308b\u306b\u306f\u3001\u30d5\u30a9\u30f3\u30c8\u30e1\u30cb\u30e5\u30fc\u3067\u30d5\u30a9\u30f3\u30c8\u30b5\u30a4\u30ba\u3092\u9078\u629e\u3057\u307e\u3059\u3002\u30e1\u30cb\u30e5\u30fc\u5185\u306e\u30a8\u30c7\u30a3\u30bf\u306b\u30b5\u30a4\u30ba\u30c0\u30a4\u30a2\u30ed\u30b0\u304c\u524d\u9762\u306b\u8868\u793a\u3055\u308c\u307e\u3059\u3002</p>\n\n  <p>\u30dc\u30fc\u30c0\u30fc\u306e\u30b5\u30a4\u30ba\u3092\u5909\u66f4\u3059\u308b\u306b\u306f\u3001\u30c6\u30fc\u30d6\u30eb\u30dc\u30fc\u30c0\u30fc\u30b5\u30a4\u30ba\u306e\u30c4\u30fc\u30eb\u30d0\u30fc\u30a2\u30a4\u30c6\u30e0\u306b\u79fb\u52d5\u3057\u30c6\u30fc\u30d6\u30eb\u30dc\u30fc\u30c0\u30fc\u30b5\u30a4\u30ba\u3092\u9078\u629e\u3057\u307e\u3059\u3002\u30e1\u30cb\u30e5\u30fc\u5185\u306e\u30a8\u30c7\u30a3\u30bf\u306b\u30b5\u30a4\u30ba\u30c0\u30a4\u30a2\u30ed\u30b0\u304c\u524d\u9762\u306b\u8868\u793a\u3055\u308c\u307e\u3059\u3002\u6ce8\u610f\uff1a\u30c6\u30fc\u30d6\u30eb\u30dc\u30fc\u30c0\u30fc\u30b5\u30a4\u30ba\u306e\u30c4\u30fc\u30eb\u30d0\u30fc\u30a2\u30a4\u30c6\u30e0\u306f\u3001\u30ab\u30fc\u30bd\u30eb\u304c\u30c6\u30fc\u30d6\u30eb\u5185\u306b\u3042\u308b\u6642\u306e\u307f\u8868\u793a\u3055\u308c\u307e\u3059\u3002</p>\n\n  <p>\u30b5\u30a4\u30ba\u30c0\u30a4\u30a2\u30ed\u30b0\u3067Tab\u30ad\u30fc\u3092\u62bc\u3059\u3068\u6b21\u306e\u30b3\u30f3\u30c8\u30ed\u30fc\u30eb\u306b\u9078\u629e\u304c\u79fb\u52d5\u3057\u3001 Shift + Tab\u3067\u524d\u306e\u30b3\u30f3\u30c8\u30ed\u30fc\u30eb\u306b\u9078\u629e\u304c\u623b\u308a\u307e\u3059\u3002</p>\n\n  <p>\u30b5\u30a4\u30ba\u3092\u5909\u66f4\u3059\u308b\u306b\u306f\u30b5\u30a4\u30ba\u5165\u529b\u30dc\u30c3\u30af\u30b9\u306b\u65b0\u898f\u306e\u5024\u3092\u5165\u529b\u3057\u307e\u3059\u3002(\u4f8b\uff1a14px\u30011em\u306a\u3069) \u5909\u66f4\u3092\u9069\u7528\u3059\u308b\u306b\u306fEnter\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002Enter\u30ad\u30fc\u3092\u62bc\u3059\u3068\u30c0\u30a4\u30a2\u30ed\u30b0\u304c\u9589\u3058\u3001\u30c9\u30ad\u30e5\u30e1\u30f3\u30c8\u304c\u518d\u5ea6\u524d\u9762\u8868\u793a\u3055\u308c\u308b\u306e\u3067\u3054\u6ce8\u610f\u304f\u3060\u3055\u3044\u3002</p>\n\n  <p>\u30c0\u30a4\u30a2\u30ed\u30b0\u3092\u7d42\u4e86\u305b\u305a\u306b\u30b5\u30a4\u30ba\u3092\u5909\u66f4\u3059\u308b\u306b\u306f\u3001\u30b5\u30a4\u30ba\u5897\u52a0\u30dc\u30bf\u30f3\u304b\u30b5\u30a4\u30ba\u6e1b\u5c11\u30dc\u30bf\u30f3\u3092\u6709\u52b9\u5316\u3057\u307e\u3059\u3002\u30b5\u30a4\u30ba\u5897\u52a0\u30dc\u30bf\u30f3\u304b\u30b5\u30a4\u30ba\u6e1b\u5c11\u30dc\u30bf\u30f3\u3092\u4f7f\u7528\u3057\u3066\u30b5\u30a4\u30ba\u3092\u5909\u66f4\u3059\u308b\u3068\u3001\u73fe\u5728\u306e\u5358\u4f4d\u5024\u3092\u5909\u3048\u305a\u306b\u9078\u629e\u3057\u305f\u8981\u7d20\u306e\u30b5\u30a4\u30ba\u3092\u76f4\u3061\u306b\u5909\u66f4\u3067\u304d\u307e\u3059\u3002\u30b5\u30a4\u30ba\u30c0\u30a4\u30a2\u30ed\u30b0\u3092\u7d42\u4e86\u3059\u308b\u306b\u306fEsc\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u753b\u50cf\u306e\u30c8\u30ea\u30df\u30f3\u30b0</div>\n\n  <p>\u30c8\u30ea\u30df\u30f3\u30b0\u6a5f\u80fd\u3092\u4f7f\u7528\u3059\u308b\u306b\u306f\u3001\u753b\u50cf\u3092\u9078\u629e\u3057\u3066\u30c4\u30fc\u30eb\u30d0\u30fc\u306b\u753b\u50cf\u64cd\u4f5c\u6a5f\u80fd\u3092\u8868\u793a\u3057\u307e\u3059\u3002\u3053\u308c\u3089\u306e\u64cd\u4f5c\u6a5f\u80fd\u306f\u30b3\u30f3\u30c6\u30ad\u30b9\u30c8\u30e1\u30cb\u30e5\u30fc\u3067\u3082\u4f7f\u7528\u3067\u304d\u307e\u3059\u3002\u30c8\u30ea\u30df\u30f3\u30b0\u6a5f\u80fd\u304c\u6709\u52b9\u5316\u3055\u308c\u308b\u3068\u3001\u5de6\u4e0a\u306e\u89d2\u304c\u9078\u629e\u3055\u308c\u305f\u72b6\u614b\u3067\u30c8\u30ea\u30df\u30f3\u30b0\u30de\u30b9\u30af\u304c\u753b\u50cf\u306b\u91cd\u306d\u3089\u308c\u307e\u3059\u3002</p>\n\n  <p>Tab\u30ad\u30fc\u3092\u4f7f\u7528\u3057\u3066\u79fb\u52d5\u3057\u307e\u3059\u30024\u304b\u6240\u306e\u89d2\u3068\u30c8\u30ea\u30df\u30f3\u30b0\u30de\u30b9\u30af\u306e\u30dc\u30c3\u30af\u30b9\u5168\u4f53\u304c\u9078\u629e\u3067\u304d\u307e\u3059\u3002\u89d2\u3054\u3068\u306b\u4f4d\u7f6e\u6c7a\u3081\u3059\u308b\u3053\u3068\u3082\u3001\u30c8\u30ea\u30df\u30f3\u30b0\u30de\u30b9\u30af\u30dc\u30c3\u30af\u30b9\u5168\u4f53\u3092\u79fb\u52d5\u3055\u305b\u3066\u3059\u3079\u3066\u306e\u89d2\u3092\u4e00\u5ea6\u306b\u79fb\u52d5\u3055\u305b\u308b\u3053\u3068\u3082\u3067\u304d\u307e\u3059\u3002</p>\n\n  <p>\u753b\u50cf\u4e0a\u3067\u9078\u629e\u500b\u6240\u3092\u5909\u3048\u308b\u306b\u306f\u77e2\u5370\u30ad\u30fc\u3092\u4f7f\u7528\u3057\u307e\u3059\u3002\u77e2\u5370\u30ad\u30fc\u30921\u56de\u62bc\u3059\u305f\u3073\u306b\u9078\u629e\u500b\u6240\u304c10\u30d4\u30af\u30bb\u30eb\u79fb\u52d5\u3057\u307e\u3059\u3002\u79fb\u52d5\u8ddd\u96e2\u3092\u5c0f\u3055\u304f\u3059\u308b\u306b\u306f\u3001Shift\u30ad\u30fc\u3092\u62bc\u3057\u306a\u304c\u3089\u77e2\u5370\u30ad\u30fc\u3092\u62bc\u3059\u30681\u30d4\u30af\u30bb\u30eb\u79fb\u52d5\u3057\u307e\u3059\u3002</p>\n\n  <p>\u30c8\u30ea\u30df\u30f3\u30b0\u3092\u753b\u50cf\u306b\u9069\u7528\u3059\u308b\u306b\u306fEnter\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002</p>\n\n  <p>\u753b\u50cf\u306b\u5909\u66f4\u3092\u52a0\u3048\u305a\u306b\u30c8\u30ea\u30df\u30f3\u30b0\u51e6\u7406\u3092\u53d6\u308a\u6d88\u3059\u306b\u306f\u3001Esc\u30ad\u30fc\u3092\u62bc\u3057\u307e\u3059\u3002</p>\n\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n      <caption>\u30ad\u30fc\u30dc\u30fc\u30c9\u30ca\u30d3\u30b2\u30fc\u30b7\u30e7\u30f3</caption>\n      <thead>\n        <tr>\n          <th scope="col">\u30a2\u30af\u30b7\u30e7\u30f3</th>\n          <th scope="col">Windows</th>\n          <th scope="col">Mac OS</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>\u30c4\u30fc\u30eb\u30d0\u30fc\u6709\u52b9\u5316</td>\n        <td>F10</td>\n        <td>ALT + F10</td>\n      </tr>\n      <tr>\n        <td>\u6b21\u306e/\u524d\u306e\u30b0\u30eb\u30fc\u30d7\u30dc\u30bf\u30f3\u9078\u629e</td>\n        <td>\u2190 \u307e\u305f\u306f \u2192</td>\n        <td>\u2190 \u307e\u305f\u306f \u2192</td>\n      </tr>\n      <tr>\n        <td>\u6b21\u306e\u30b0\u30eb\u30fc\u30d7\u306b\u79fb\u52d5</td>\n        <td>TAB</td>\n        <td>TAB</td>\n      </tr>\n      <tr>\n        <td>\u524d\u306e\u30b0\u30eb\u30fc\u30d7\u306b\u79fb\u52d5</td>\n        <td>Shift + TAB</td>\n        <td>Shift + TAB</td>\n      </tr>\n      <tr>\n        <td>\u30b3\u30de\u30f3\u30c9\u5b9f\u884c</td>\n        <td>SPACE \u307e\u305f\u306f ENTER</td>\n        <td>SPACE \u307e\u305f\u306f ENTER</td>\n      </tr>\n      <tr>\n        <td>\u30e1\u30a4\u30f3\u30e1\u30cb\u30e5\u30fc\u3092\u958b\u304f</td>\n        <td>SPACE \u307e\u305f\u306f ENTER</td>\n        <td>SPACE \u307e\u305f\u306f ENTER</td>\n      </tr>\n      <tr>\n        <td>\u30b5\u30d6\u30e1\u30cb\u30e5\u30fc\u3092\u958b\u304f/\u5c55\u958b</td>\n        <td>SPACE\u307e\u305f\u306fENTER\u307e\u305f\u306f\u2192</td>\n        <td>SPACE\u307e\u305f\u306fENTER\u307e\u305f\u306f\u2192</td>\n      </tr>\n      <tr>\n        <td>\u6b21\u306e/\u524d\u306e\u30e1\u30cb\u30e5\u30fc\u9805\u76ee\u9078\u629e</td>\n        <td>\u2193 \u307e\u305f\u306f \u2191</td>\n        <td>\u2193 \u307e\u305f\u306f \u2191</td>\n      </tr>\n      <tr>\n        <td>\u30e1\u30cb\u30e5\u30fc\u3092\u9589\u3058\u308b</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n      <tr>\n        <td>\u30b5\u30d6\u30e1\u30cb\u30e5\u30fc\u3092\u9589\u3058\u308b/\u6298\u308a\u7573\u3080</td>\n        <td>ESC\u307e\u305f\u306f\u2190</td>\n        <td>ESC\u307e\u305f\u306f\u2190</td>\n      </tr>\n      <tr>\n        <td>\u753b\u50cf\u30c8\u30ea\u30df\u30f3\u30b0\u306e\u9078\u629e\u3092\u79fb\u52d5</td>\n        <td>\u2190\u307e\u305f\u306f\u2192\u307e\u305f\u306f\u2193\u307e\u305f\u306f\u2191</td>\n        <td>\u2190\u307e\u305f\u306f\u2192\u307e\u305f\u306f\u2193\u307e\u305f\u306f\u2191</td>\n      </tr>\n      <tr>\n        <td>\u753b\u50cf\u30c8\u30ea\u30df\u30f3\u30b0\u306e\u9078\u629e\u3092\u7d30\u304b\u304f\u79fb\u52d5</td>\n        <td>SHIFT\u3057\u306a\u304c\u3089\u79fb\u52d5</td>\n        <td>SHIFT\u3057\u306a\u304c\u3089\u79fb\u52d5</td>\n      </tr>\n      <tr>\n        <td>\u30c8\u30ea\u30df\u30f3\u30b0\u3092\u9069\u7528</td>\n        <td>ENTER</td>\n        <td>ENTER</td>\n      </tr>\n      <tr>\n        <td>\u30c8\u30ea\u30df\u30f3\u30b0\u3092\u53d6\u6d88</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n    </tbody>\n  </table>\n</div>\n'),a11ycheck:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">\u30a2\u30af\u30bb\u30b7\u30d3\u30ea\u30c6\u30a3\u306e\u78ba\u8a8d</div>\n  <p>\u30a2\u30af\u30bb\u30b7\u30d3\u30ea\u30c6\u30a3\u78ba\u8a8d\u30c4\u30fc\u30eb\u3092\u6709\u52b9\u5316\u3059\u308b\u3068\u3001HTML\u30c9\u30ad\u30e5\u30e1\u30f3\u30c8\u3067\u4ee5\u4e0b\u306e\u30a2\u30af\u30bb\u30b7\u30d3\u30ea\u30c6\u30a3\u306b\u95a2\u3059\u308b\u554f\u984c\u3092\u7279\u5b9a\u3067\u304d\u308b\u3088\u3046\u306b\u306a\u308a\u307e\u3059\u3002</p>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-a11ycheck-table">\n      <caption>\u554f\u984c\u306e\u5b9a\u7fa9</caption>\n      <thead>\n        <tr>\n          <th scope="col">\u554f\u984c</th>\n          <th scope="col">WCAG</th>\n          <th scope="col">\u8aac\u660e</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>\u753b\u50cf\u306b\u306f\u4ee3\u66ff\u30c6\u30ad\u30b9\u30c8\u306b\u3088\u308b\u8aac\u660e\u3092\u4ed8\u3051\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.1.1</td>\n        <td>\u753b\u50cf\u306b\u306f\u3001\u753b\u50cf\u306e\u5185\u5bb9\u3092\u8996\u899a\u969c\u5bb3\u306e\u3042\u308b\u30e6\u30fc\u30b6\u30fc\u306b\u8aac\u660e\u3059\u308b\u4ee3\u66ff\u306e\u30c6\u30ad\u30b9\u30c8\u5024\u306e\u30bb\u30c3\u30c8\u304c\u5fc5\u8981\u3067\u3059\u3002 </td>\n      </tr>\n      <tr>\n        <td>\u4ee3\u66ff\u30c6\u30ad\u30b9\u30c8\u306f\u3001\u753b\u50cf\u306e\u30d5\u30a1\u30a4\u30eb\u540d\u3068\u540c\u4e00\u306b\u3067\u304d\u307e\u305b\u3093</td>\n        <td>1.1.1</td>\n        <td>\u4ee3\u66ff\u306e\u30c6\u30ad\u30b9\u30c8\u5024\u306b\u753b\u50cf\u306e\u30d5\u30a1\u30a4\u30eb\u540d\u3092\u4f7f\u7528\u3057\u306a\u3044\u3067\u304f\u3060\u3055\u3044\u3002\u753b\u50cf\u306e\u5185\u5bb9\u3092\u8aac\u660e\u3059\u308b\u4ee3\u66ff\u306e\u30c6\u30ad\u30b9\u30c8\u5024\u3092\u4f7f\u7528\u3057\u3066\u304f\u3060\u3055\u3044\u3002</td>\n      </tr>\n      <tr>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306b\u306f\u30ad\u30e3\u30d7\u30b7\u30e7\u30f3\u3092\u4ed8\u3051\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.3.1</td>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306b\u306f\u3001\u305d\u306e\u5185\u5bb9\u3092\u8868\u3059\u7c21\u5358\u306a\u8aac\u660e\u30c6\u30ad\u30b9\u30c8\u304c\u5fc5\u8981\u3067\u3059\u3002</td>\n      </tr>\n      <tr>\n        <td>\u8907\u96d1\u306a\u30c6\u30fc\u30d6\u30eb\u306b\u306f\u8981\u7d04\u3092\u4ed8\u3051\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.3.1</td>\n        <td>\u8907\u6570\u306e\u884c\u3084\u5217\u306b\u307e\u305f\u304c\u308b\u30bb\u30eb\u3092\u542b\u3080\u3088\u3046\u306a\u8907\u96d1\u306a\u69cb\u9020\u306e\u30c6\u30fc\u30d6\u30eb\u306f\u3001\u305d\u306e\u69cb\u9020\u3092\u8aac\u660e\u3059\u308b\u8981\u7d04\u3092\u542b\u3081\u308b\u5fc5\u8981\u304c\u3042\u308a\u307e\u3059\u3002 </td>\n      </tr>\n      <tr>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306e\u30ad\u30e3\u30d7\u30b7\u30e7\u30f3\u3068\u8981\u7d04\u306f\u540c\u4e00\u306e\u5024\u306b\u3067\u304d\u307e\u305b\u3093</td>\n        <td>1.3.1</td>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306e\u30ad\u30e3\u30d7\u30b7\u30e7\u30f3\u306f\u30c6\u30fc\u30d6\u30eb\u306e\u5185\u5bb9\u3092\u8aac\u660e\u3057\u3001\u8981\u7d04\u304f\u306f\u8907\u96d1\u306a\u30c6\u30fc\u30d6\u30eb\u306e\u69cb\u9020\u3092\u8aac\u660e\u3059\u308b\u3082\u306e\u3067\u3059\u3002 </td>\n      </tr>\n      <tr>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306b\u306f1\u500b\u4ee5\u4e0a\u306e\u30d8\u30c3\u30c0\u30fc\u30bb\u30eb\u3092\u4f7f\u7528\u3057\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.3.1</td>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306b\u306f\u884c\u3084\u5217\u306e\u5185\u5bb9\u3092\u8868\u3059\u9069\u5207\u306a\u884c\u30d8\u30c3\u30c0\u30fc\u3084\u5217\u30d8\u30c3\u30c0\u30fc\u3092\u542b\u3081\u308b\u5fc5\u8981\u304c\u3042\u308a\u307e\u3059\u3002<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">\u3053\u306e\u30c8\u30d4\u30c3\u30af\u306e\u8a73\u7d30\u306fwebaim.org\u3092\u53c2\u7167\u3057\u3066\u304f\u3060\u3055\u3044\u3002</a> </td>\n      </tr>\n      <tr>\n        <td>\u30c6\u30fc\u30d6\u30eb\u30d8\u30c3\u30c0\u30fc\u3092\u884c\u304b\u5217\u306b\u4f7f\u7528\u3057\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.3.1</td>\n        <td>\u30c6\u30fc\u30d6\u30eb\u306e\u30d8\u30c3\u30c0\u30fc\u306f\u305d\u308c\u304c\u5185\u5bb9\u3092\u8868\u3059\u884c\u3084\u5217\u3068\u95a2\u9023\u4ed8\u3051\u3089\u308c\u308b\u5fc5\u8981\u304c\u3042\u308a\u307e\u3059\u3002<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">\u3053\u306e\u30c8\u30d4\u30c3\u30af\u306e\u8a73\u7d30\u306fwebaim.org\u3092\u53c2\u7167\u3057\u3066\u304f\u3060\u3055\u3044\u3002</a> </td>\n      </tr>\n      <tr>\n        <td>\u3053\u306e\u6bb5\u843d\u306f\u898b\u51fa\u3057\u306e\u3088\u3046\u3067\u3059\u3002\u898b\u51fa\u3057\u306e\u5834\u5408\u306f\u898b\u51fa\u3057\u30ec\u30d9\u30eb\u3092\u9078\u629e\u3057\u3066\u304f\u3060\u3055\u3044\u3002</td>\n        <td>1.3.1</td>\n        <td>\u30c9\u30ad\u30e5\u30e1\u30f3\u30c8\u3092\u8907\u6570\u306e\u30bb\u30af\u30b7\u30e7\u30f3\u306b\u533a\u5207\u308b\u306b\u306f\u898b\u51fa\u3057\u3092\u4f7f\u7528\u3057\u307e\u3059\u3002\u66f8\u5f0f\u8a2d\u5b9a\u3055\u308c\u305f\u6bb5\u843d\u3092\u898b\u51fa\u3057\u306e\u4ee3\u308f\u308a\u306b\u4f7f\u7528\u3057\u306a\u3044\u3067\u304f\u3060\u3055\u3044\u3002<br/><a href="http://webaim.org/techniques/semanticstructure/#correctly" target="_blank">\u3053\u306e\u30c8\u30d4\u30c3\u30af\u306e\u8a73\u7d30\u306fwebaim.org\u3092\u53c2\u7167\u3057\u3066\u304f\u3060\u3055\u3044\u3002</a> </td>\n      </tr>\n      <tr>\n        <td>\u898b\u51fa\u3057\u306f\u756a\u53f7\u9806\u306b\u9069\u7528\u3057\u3066\u304f\u3060\u3055\u3044\u3002\u4f8b\u3048\u3070\u3001\uff3b\u898b\u51fa\u30571\uff3d\u306e\u6b21\u306f\uff3b\u898b\u51fa\u30572\uff3d\u3068\u306a\u308a\u3001\uff3b\u898b\u51fa\u30573\uff3d\u306b\u306f\u3067\u304d\u307e\u305b\u3093\u3002</td>\n        <td>1.3.1</td>\n        <td>\u5f8c\u7d9a\u3059\u308b\u30c9\u30ad\u30e5\u30e1\u30f3\u30c8\u898b\u51fa\u3057\u306f\u968e\u5c64\u9806\u306b\u964d\u9806\u307e\u305f\u306f\u540c\u69d8\u306e\u9806\u306b\u8868\u793a\u3059\u308b\u5fc5\u8981\u304c\u3042\u308a\u307e\u3059\u3002<br/><a href="http://webaim.org/techniques/semanticstructure/#contentstructure" target="_blank">\u3053\u306e\u30c8\u30d4\u30c3\u30af\u306e\u8a73\u7d30\u306fwebaim.org\u3092\u53c2\u7167\u3057\u3066\u304f\u3060\u3055\u3044\u3002</a> </td>\n      </tr>\n      <tr>\n        <td>\u30ea\u30b9\u30c8\u306b\u306f\u30ea\u30b9\u30c8\u30de\u30fc\u30af\u30a2\u30c3\u30d7\u3092\u4f7f\u7528\u3057\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.3.1</td>\n        <td>\u9805\u76ee\u306e\u30ea\u30b9\u30c8\u3092\u8868\u793a\u3059\u308b\u969b\u306f\u3001HTML\u30ea\u30b9\u30c8\u69cb\u9020\u3092\u5fc5\u305a\u4f7f\u7528\u3057\u3066\u304f\u3060\u3055\u3044\u3002(<code>&lt;ul&gt;</code> \u307e\u305f\u306f<code>&lt;ol&gt;</code>\u304a\u3088\u3073 <code>&lt;li&gt;</code>)</td>\n      </tr>\n      <tr>\n        <td>\u30c6\u30ad\u30b9\u30c8\u306e\u30b3\u30f3\u30c8\u30e9\u30b9\u30c8\u6bd4\u306f4.5:1\u306b\u3057\u3066\u304f\u3060\u3055\u3044</td>\n        <td>1.4.3</td>\n        <td>\u30c6\u30ad\u30b9\u30c8\u3068\u305d\u306e\u80cc\u666f\u306e\u30b3\u30f3\u30c8\u30e9\u30b9\u30c8\u6bd4\u306f\u8996\u529b\u304c\u3084\u3084\u52a3\u308b\u4eba\u3082\u8aad\u3081\u308b\u3088\u3046\u306a\u3082\u306e\u3067\u3042\u308b\u5fc5\u8981\u304c\u3042\u308a\u307e\u3059\u3002</td>\n      </tr>\n      <tr>\n        <td>\u96a3\u63a5\u3057\u305f\u30ea\u30f3\u30af\u306f\u7d71\u5408\u3057\u3066\u304f\u3060\u3055\u3044\u3002</td>\n        <td>2.4.4</td>\n        <td>\u540c\u4e00\u30ea\u30bd\u30fc\u30b9\u3078\u306e\u96a3\u63a5\u3057\u305f\u30cf\u30a4\u30d1\u30fc\u30ea\u30f3\u30af\u306f\u3001\u7d71\u5408\u3057\u3066\u5358\u4e00\u306e\u30cf\u30a4\u30d1\u30fc\u30ea\u30f3\u30af\u306b\u3057\u3066\u304f\u3060\u3055\u3044\u3002</td>\n      </tr>\n    </tbody>\n  </table>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">\u8a73\u7d30\u60c5\u5831</div>\n  <p>\n    <a href="http://webaim.org/intro/" target="_blank">Introduction to web accessibility (webaim.org)</a> <br/>\n    <a href="http://www.w3.org/WAI/intro/wcag" target="_blank">Introduction to WCAG 2.0 (w3.org)</a> <br/>\n    <a href="http://www.section508.gov/" target="_blank">\u7c73\u56fd\u30ea\u30cf\u30d3\u30ea\u30c6\u30fc\u30b7\u30e7\u30f3\u6cd5\u7b2c508\u6761(section508.gov)</a>\n  </p>\n</div>'),markdown:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Markdown\u30d5\u30a9\u30fc\u30de\u30c3\u30c8</div>\n  <p>Markdown\u306f\u3001HTML\u69cb\u9020\u3092\u4f5c\u6210\u3057\u3001\u30ad\u30fc\u30dc\u30fc\u30c9\u30b7\u30e7\u30fc\u30c8\u30ab\u30c3\u30c8\u3092\u4f7f\u7528\u3057\u305f\u308a\u30e1\u30cb\u30e5\u30fc\u306b\u30a2\u30af\u30bb\u30b9\u3057\u305f\u308a\u305b\u305a\u306b\u30d5\u30a9\u30fc\u30de\u30c3\u30c8\u5316\u3059\u308b\u969b\u306b\u4f7f\u308f\u308c\u308b\u30b7\u30f3\u30bf\u30c3\u30af\u30b9\u3067\u3059\u3002Markdown\u30d5\u30a9\u30fc\u30de\u30c3\u30c8\u3092\u4f7f\u7528\u3059\u308b\u306b\u306f\u3001\u5fc5\u8981\u306a\u30b7\u30f3\u30bf\u30c3\u30af\u30b9\u3092\u5165\u529b\u3057\u3001\u7d9a\u3051\u3066Enter\u30ad\u30fc\u3084Space\u30ad\u30fc\u3092\u5165\u529b\u3057\u307e\u3059\u3002</p>\n  <table cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-markdown" aria-readonly="true">\n      <caption>\u30ad\u30fc\u30dc\u30fc\u30c9\u30d5\u30a9\u30fc\u30de\u30c3\u30c8\u30b7\u30f3\u30bf\u30c3\u30af\u30b9</caption>\n      <thead>\n        <tr>\n          <th scope="col">\u30b7\u30f3\u30bf\u30c3\u30af\u30b9</th>\n          <th scope="col">HTML\u5909\u63db\u7d50\u679c</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td><pre>#\u898b\u51fa\u3057\u30ec\u30d9\u30eb1</pre></td>\n        <td><pre>&lt;h1&gt;\u898b\u51fa\u3057\u30ec\u30d9\u30eb1&lt;/h1&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>##\u898b\u51fa\u3057\u30ec\u30d9\u30eb2</pre></td>\n        <td><pre>&lt;h2&gt;\u898b\u51fa\u3057\u30ec\u30d9\u30eb2&lt;/h2&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>###\u898b\u51fa\u3057\u30ec\u30d9\u30eb3</pre></td>\n        <td><pre>&lt;h3&gt;\u898b\u51fa\u3057\u30ec\u30d9\u30eb3&lt;/h3&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>####\u898b\u51fa\u3057\u30ec\u30d9\u30eb4</pre></td>\n        <td><pre>&lt;h4&gt;\u898b\u51fa\u3057\u30ec\u30d9\u30eb4&lt;/h4&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>##### \u898b\u51fa\u3057\u30ec\u30d9\u30eb5</pre></td>\n        <td><pre>&lt;h5&gt;\u898b\u51fa\u3057\u30ec\u30d9\u30eb5&lt;/h5&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>######\u898b\u51fa\u3057\u30ec\u30d9\u30eb6</pre></td>\n        <td><pre>&lt;h6&gt;\u898b\u51fa\u3057\u30ec\u30d9\u30eb6&lt;/h6&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>* \u9806\u5e8f\u7121\u3057\u30ea\u30b9\u30c8</pre></td>\n        <td><pre>&lt;ul&gt;&lt;li&gt;\u9806\u5e8f\u7121\u3057\u30ea\u30b9\u30c8&lt;/li&gt;&lt;/ul&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>1. \u9806\u5e8f\u4ed8\u304d\u30ea\u30b9\u30c8</pre></td>\n        <td><pre>&lt;ol&gt;&lt;li&gt;\u9806\u5e8f\u4ed8\u304d\u30ea\u30b9\u30c8&lt;/li&gt;&lt;/ol&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>*\u659c\u4f53*</pre></td>\n        <td><pre>&lt;em&gt;\u659c\u4f53&lt;/em&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>**\u592a\u5b57**</pre></td>\n        <td><pre>&lt;strong&gt;\u592a\u5b57&lt;/strong&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>---</pre></td>\n        <td><pre>&lt;hr/&gt;</pre></td>\n      </tr>\n    </tbody>\n  </table>\n</div>'),shortcuts:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">\u30ad\u30fc\u30dc\u30fc\u30c9\u30b7\u30e7\u30fc\u30c8\u30ab\u30c3\u30c8</div>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n    <caption>\u30a8\u30c7\u30a3\u30bf\u30fc\u30b3\u30de\u30f3\u30c9</caption>\n    <thead>\n      <tr>\n        <th scope="col">\u30a2\u30af\u30b7\u30e7\u30f3</th>\n        <th scope="col">Windows</th>\n        <th scope="col">Mac OS</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>\u5143\u306b\u623b\u3059</td>\n        <td>Ctrl + Z</td>\n        <td>\u2318Z</td>\n      </tr>\n      <tr>\n        <td>\u3084\u308a\u76f4\u3057</td>\n        <td>Ctrl + Y</td>\n        <td>\u2318\u21e7Z</td>\n      </tr>\n      <tr>\n        <td>\u592a\u5b57</td>\n        <td>Ctrl + B</td>\n        <td>\u2318B</td>\n      </tr>\n      <tr>\n        <td>\u659c\u4f53</td>\n        <td>Ctrl + I</td>\n        <td>\u2318I</td>\n      </tr>\n      <tr>\n        <td>\u4e0b\u7dda</td>\n        <td>Ctrl + U</td>\n        <td>\u2318U</td>\n      </tr>\n      <tr>\n        <td>\u30a4\u30f3\u30c7\u30f3\u30c8</td>\n        <td>Ctrl + ]</td>\n        <td>\u2318]</td>\n      </tr>\n      <tr>\n        <td>\u30a4\u30f3\u30c7\u30f3\u30c8\u3092\u6e1b\u3089\u3059</td>\n        <td>Ctrl + [</td>\n        <td>\u2318[</td>\n      </tr>\n      <tr>\n        <td>\u30ea\u30f3\u30af\u306e\u8ffd\u52a0</td>\n        <td>Ctrl + K</td>\n        <td>\u2318K</td>\n      </tr>\n      <tr>\n        <td>\u691c\u7d22</td>\n        <td>Ctrl + F</td>\n        <td>\u2318F</td>\n      </tr>\n      <tr>\n        <td>\u30d5\u30eb\u30b9\u30af\u30ea\u30fc\u30f3\u30e2\u30fc\u30c9 (\u5207\u308a\u66ff\u3048)</td>\n        <td>Ctrl + Shift + F</td>\n        <td>\u2318\u21e7F</td>\n      </tr>\n      <tr>\n        <td>\u30d8\u30eb\u30d7\u30c0\u30a4\u30a2\u30ed\u30b0 (\u958b\u304f)</td>\n        <td>Ctrl + Shift + H</td>\n        <td>\u2303\u2325H</td>\n      </tr>\n      <tr>\n        <td>\u30b7\u30e7\u30fc\u30c8\u30ab\u30c3\u30c8\u30e1\u30cb\u30e5\u30fc (\u958b\u304f)</td>\n        <td>Shift + F10</td>\n        <td>\u21e7F10\u200e\u200f</td>\n      </tr>\n      <tr>\n        <td>\u30b3\u30fc\u30c9\u30aa\u30fc\u30c8\u30b3\u30f3\u30d7\u30ea\u30fc\u30c8</td>\n        <td>Ctrl + Space</td>\n        <td>\u2303Space</td>\n      </tr>\n      <tr>\n        <td>\u30a2\u30af\u30bb\u30b9\u53ef\u80fd\u30b3\u30fc\u30c9\u30d3\u30e5\u30fc</td>\n        <td>Ctrl + Shift + U</td>\n        <td>\u2318\u2325U</td>\n      </tr>\n    </tbody>\n  </table>\n  <div class="ephox-polish-help-note" role="note">*\u6ce8\u610f\uff1a\u4e00\u90e8\u306e\u6a5f\u80fd\u306f\u7ba1\u7406\u8005\u306b\u3088\u308a\u7121\u52b9\u5316\u3055\u308c\u3066\u3044\u308b\u5834\u5408\u304c\u3042\u308a\u307e\u3059\u3002</div>\n</div>\n')})}();